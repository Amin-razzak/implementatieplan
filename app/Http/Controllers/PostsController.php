<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PostsController extends Controller
{
    public function index()
    {
        $artikelen = Product::all();
        return view('bonsai.index', compact('artikelen'));
    }
    public function register()
    {
        return view('bonsai.register');
    }
    public function sitemap()
    {
        return view('bonsai.sitemap');
    }
}
