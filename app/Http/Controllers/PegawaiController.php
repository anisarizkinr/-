<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function pegawai(){
        return view('blog.pegawai', ['title'=> 'Pegawai']);
    }
}
