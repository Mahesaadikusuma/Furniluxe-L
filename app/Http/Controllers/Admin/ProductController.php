<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with(['category'])->get();

        

        return view('pages.Admin.Products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        
        $category = Category::all();
        return view('pages.Admin.Products.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $items = $request->all();

        
        $items['slug'] = Str::slug($request->name);
        $items['image'] = $request->file('image')->store('assets/products', 'public');
        

        // dd($items);
        Product::create($items);


        return redirect()->route('products.index')->with('success', 'products Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Product::with(['category'])->FindOrFail($id);

        // dd($item);
        // $category = Category::all();
        $category = Category::where('id', '!=', $item->categories_id)->get(['id', 'name']);

        return view('pages.Admin.Products.edit', compact('item', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $items = $request->all();
        $product = Product::FindOrFail($id);
        
        
        if ($request->hasFile('image')) {
            Storage::disk('local')->delete('public/' . $product->image); 
        }

        $items['slug'] = Str::slug($request->name);
        $items['image'] = $request->file('image')->store('assets/products', 'public');

        
        // dd($items);
        $product->update($items);
        return redirect()->route('products.index')->with('products', 'product update Created');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $item = Product::with(['gallery'])->FindOrFail($id);
        
        Storage::disk('local')->delete('public/' . $item->image);
        $item->gallery()->delete();
        $item->delete();

        return redirect()->route('products.index')->with('success', 'products Deleted');
    }
}
