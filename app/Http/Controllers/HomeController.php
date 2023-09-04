<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $category = Category::take(5)->get();
        $AllProduct = Product::with('Category')->get();

        // INI CODE YANG MAHESA BUAT 
        // $product10 = $AllProduct->slice(0, 5);
        // $product20 = $AllProduct->slice(5, 10);

        // INI DARI CHAT
        $product10 = $AllProduct->take(5);
        $product20 = $AllProduct->skip(6)->take(5);
        // $products = [
        //     'product10' => $AllProduct->take(5),
        //     'product20' => $AllProduct->skip(5)->take(5),
        // ];

        return view('pages.Home',  compact('product10' ,'product20', 'category'));
    }
}
