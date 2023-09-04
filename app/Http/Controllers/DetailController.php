<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request,$slug)
    {
        $product = Product::with(['Category','gallery'])->where('slug', $slug)->firstOrFail();
        
        

        $products = Product::with(['Category','gallery'])->where('slug', '!=', $slug)->paginate(8);
        return view('pages.Detail', compact('product', 'products'));
    }
}
