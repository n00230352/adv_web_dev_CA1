<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::with('items')->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        if ($user->role !== 'admin') {
            return redirect()->route('items.index')->with('error', 'Access denied');
        }

        $items = Item::all();
        return view('categories.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //validate input
         $request->validate([
            'category_name' => 'required',
            'description' => 'required|max:500',
        ]);

        //create category in database
        Category::create([
            'category_name' => $request->category_name,
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' =>now()
        ]);

        return to_route('category.index')->with('success', 'category created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

        // Pass the authors to the 'authors.index' view
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required',
            'description' => 'required|max:500',
        ]);

        $data = $request->only(['category_name', 'description']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
