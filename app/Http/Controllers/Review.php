<?php

namespace App\Http\Controllers;
use App\Klant;
use App\Product;
use App\Order;
use Illuminate\Http\Request;


class Review extends Controller
{
    public function index($id)
    {
        $artikel = Product::find($id);
        return view('bonsai.artikelen.review', ['artikel' => $artikel]);
    }
    public function makeReview($id)
    {

    }
}
