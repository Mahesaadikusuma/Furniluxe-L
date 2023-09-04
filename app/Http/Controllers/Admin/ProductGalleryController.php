<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductGalleryRequest;
use App\Http\Requests\ProductGalleryUpdateRequest;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $gallery = ProductGallery::with(['product'])->get();

        

        return view('pages.Admin.ProductsGallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = Product::get(['id', 'name']);
        // dd($product);

        
        return view('pages.Admin.ProductsGallery.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductGalleryRequest $request)
    {
        $items = $request->all();
        $items['photo'] = $request->file('photo')->store('assets/gallery', 'public');
        
        // dd($items);
        ProductGallery::create($items);


        return redirect()->route('gallery.index')->with('success', 'Gallery created');
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
        $gallery = ProductGallery::with(['product'])->findOrFail($id);
        $product = Product::all();

        $product = Product::where('id', '!=', $gallery->product_id )->get(['id', 'name']);
        
        return view('pages.Admin.ProductsGallery.edit', compact('gallery','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductGalleryUpdateRequest $request, string $id)
    {
        $item = ProductGallery::findOrFail($id);
        $data = $request->all();

        
        if ($request->hasFile('photo')) {
            Storage::disk('local')->delete('public/' . $item->photo); 
        }

        $data['photo'] = $request->file('photo')->store('assets/gallery', 'public');
        
        // dd($data);
        $item->update($data);


        return redirect()->route('gallery.index')->with('success', 'Gallery created');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = ProductGallery::FindOrFail($id);
        Storage::disk('local')->delete('public/' . $item->photo); 
        $item->delete();

        return redirect()->route('gallery.index')->with('success', 'Gallery Deleted');

    }
}
