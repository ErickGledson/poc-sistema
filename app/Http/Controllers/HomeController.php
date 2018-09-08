<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all()->where('stock', '>', '0');

        foreach ($products as $key => $product) {
            switch ($product->category_id) {
                case 1:
                    $product['category'] = 'Games';
                    break;
                case 2:
                    $product['category'] = 'TV';
                    break;
                case 3:
                    $product['category'] = 'Som';
                    break;
            }
        }

        return view('home', ['products' => $products]);
    }
}
