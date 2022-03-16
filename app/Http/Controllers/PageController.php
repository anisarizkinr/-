<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        return view('blog.home', ['title'=> 'Home']);
    }
    public function about(){
        return view('blog.about', ['title'=> 'About']);
    }
    public function contact(){
        return view('blog.contact', ['title'=> 'Contact']);
    }
    public function news(){
        return view('blog.news', ['title'=> 'News']);
    }
    public function shop(){
        return view('blog.shop', ['title'=> 'Shops']);
    }
}
