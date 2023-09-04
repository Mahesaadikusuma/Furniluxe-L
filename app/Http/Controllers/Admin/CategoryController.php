<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $category = Category::all();
        // $category = DB::table('categories')->get();
        
        return view('pages.Admin.Category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.Admin.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $items = $request->all();
        $items['slug'] = Str::slug($request->name);
        $items['photo'] = $request->file('photo')->store('assets/category', 'public');
        

        // dd($items);
        Category::create($items);


        return redirect()->route('categories.index')->with('success', 'Category Created');
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
        $item = Category::FindOrFail($id);
        return view('pages.Admin.Category.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $items = $request->all();
        $category = Category::FindOrFail($id);
        
        
        if ($request->hasFile('photo')) {
            Storage::disk('local')->delete('public/' . $category->photo); 
        }
        $items['slug'] = Str::slug($request->name);

        $items['photo'] = $request->file('photo')->store('assets/category', 'public');

        
        // dd($items);
        $category->update($items);
        return redirect()->route('categories.index')->with('success', 'Category update Created');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Category::FindOrFail($id);
        $item = $item->delete();

        return redirect()->route('categories.index')->with('success', 'Category Deleted');
    }
}
