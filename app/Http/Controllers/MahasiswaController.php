<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;




class MahasiswaController extends Controller
{
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
       // $mahasiswa = $mahasiswa = DB::table('mahasiswa')->get(); // Mengambil semua isi tabel
      // $mahasiswa = Mahasiswa::paginate(3); 
       $mahasiswa = Mahasiswa::with('kelas')->get(); 
       $paginate = Mahasiswa::orderBy('id_mahasiswa', 'asc')->paginate(3);
      return view('mahasiswa.index', ['mahasiswa' => $mahasiswa, 'paginate' => $paginate]);
       
    }

    public function create()
    {
        //return view('mahasiswa.create');
        $kelas = Kelas::all(); // mendapatkan data dari tabel kelas
        return view('mahasiswa.create',['kelas' => $kelas]);

    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required', 
            'email' => 'required',
            'alamat'=> 'required',
            // 'tgl_lahir' => 'required',
            ]);

            $mahasiswa = new Mahasiswa;
            $mahasiswa->nim = $request->get('nim');
            $mahasiswa->nama = $request->get('nama');
            $mahasiswa->jurusan = $request->get('jurusan');
            $mahasiswa->email = $request->get('email');
            $mahasiswa->alamat = $request->get('alamat');
            // $mahasiswa->tgl_lahir = $request->get('tgl_lahir');
            //$mahasiswa->save();

            $kelas = new Kelas;
            $kelas->id = $request->get('kelas');

        //fungsi eloquent untuk menambah data dengan relasi belongsTo
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    public function show($nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();

        return view('mahasiswa.detail', ['mahasiswa' => $mahasiswa]);
        
       
    }

    public function edit($nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        $kelas = Kelas::all(); //mendapat data dari tabel kelas
        return view('mahasiswa.edit', compact('mahasiswa', 'kelas'));
    }

    public function update(Request $request, $nim)
    {
         $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            // 'tgl_lahir' => 'tgl_lahir',
            
        ]);
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->jurusan = $request->get('jurusan');
        $mahasiswa->email = $request->get('email');
        $mahasiswa->alamat = $request->get('alamat');
        // $mahasiswa->tgl_lahir = $request->get('tgl_lahir');
       // $mahasiswa->save();

       $kelas = new Kelas;
       $kelas->id = $request->get('kelas');

       //fungsi eloquent untuk menambah data dengan relasi belongsTo
       $mahasiswa->kelas()->associate($kelas);
       $mahasiswa->save();
       
       //jika data berhasil diupdate, akan kembali ke halaman utama
       return redirect()->route('mahasiswa.index')
       ->with('success', 'Mahasiswa Berhasil Diupdate');
    }


    public function destroy(Mahasiswa $mahasiswa)
    {
        mahasiswa::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus');
    }


    public function search(Request $request){
        $keyword = $request -> search;
        $mahasiswa = Mahasiswa::where('nama','like',"%". $keyword . "%") -> paginate(3);
        return view(view: 'mahasiswa.index', data: compact( var_name:'mahasiswa'));
    }
};