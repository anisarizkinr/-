<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        return view('blog.home', ['title'=> 'Home']);
    }
    public function barang(){
        return view('blog.about', ['title'=> 'Barang']);
    }
    public function pelanggan(){
        return view('blog.contact', ['title'=> 'Pelanggan']);
    }
    public function pegawai(){
        return view('blog.news', ['title'=> 'Pegawai']);
    }
    public function suplier(){
        return view('blog.shop', ['title'=> 'Suplier']);
    }
}
