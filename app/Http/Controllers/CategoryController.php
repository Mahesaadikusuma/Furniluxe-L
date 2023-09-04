<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $category = Category::all();
        $AllProduct = Product::with('Category')->get();

        // INI CODE YANG MAHESA BUAT 
        // $product10 = $AllProduct->slice(0, 5);
        // $product20 = $AllProduct->slice(5, 10);

        // INI DARI CHAT
        $product10 = $AllProduct->take(5);
        $product20 = $AllProduct->skip(6)->take(5);
        return view('pages.Category',compact('category', 'product10', 'product20', 'AllProduct'));
    }

    public function detail(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categories = Category::all();
        $product = Product::with(['Category'])->where('categories_id', $category->id)->paginate(3);
        
        return view('pages.CategoryDetail',compact('category', 'categories', 'product'));
    }
}
