<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function barang(){
        return view('blog.barang', ['title'=> 'Barang']);
    }
}
