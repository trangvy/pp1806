<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $products = Product::all();
        $categories = Category::all();

        if (!$products) {
            $request->session()->flash('status', 'Have not any product');
        }

        return view('index', compact('categories'));
    }

    public function home()
    {
        $user = User::find(auth()->id());
        $product = Product::all();
        $categories = Category::all();

        return view('home', ['user' => $user, 'product' => $product, 'categories' => $categories]);
    }
}
