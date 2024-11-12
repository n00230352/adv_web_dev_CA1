<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all(); // gets all items
        return view('items.index', compact('items')); // returns the view with items
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('items.index')->with('error', 'Access denied.');
        }
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate input
        $request->validate([
            'item_name' => 'required',
            'price' => 'required|integer',
            'description' => 'required|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/items'), $imageName);
        }

        //create item in database
        Item::create([
            'item_name' => $request->item_name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imageName,
            'created_at' => now(),
            'updated_at' =>now()
        ]);

        return to_route('items.index')->with('success', 'Item created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //load the item with its associated reviews and the user who made each review
        $item->load('reviews.user'); //assuming each review has a 'user_id' for the review
        return view('items.show', compact('book'));
        // compact is shorthand for this
        //return view('items.show'), ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('items.edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'item_name' => 'required',
            'price' => 'required|integer',
            'description' => 'required|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $data = $request->only(['item_name', 'price', 'description', 'image']);

        // Check if a new image file is provided
        if ($request->hasFile('image')) {
            // If there's an old image, delete it from the server
            if ($item->image && file_exists(public_path($item->image))) {
                unlink(public_path($item->image));
            }

            // Store the new image and add its filename to the data array
            $image_url = time() . '.' . $request->file('image')->extension();
            $request->file('image_url')->move(public_path('images/items'), $image_url);
            $data['image'] = $image_url;
        }

        $item->update($data);
        return redirect()->route('items.index')->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return to_route('items.index')->with('success', 'Item deleted successfully!');

    }
    public function search(Request $request)
{
    $search = $request->input('search'); // Get search query from the form

    // If there's a search query, filter items based on item_name or description
    if ($search) {
        $items = Item::where('item_name', 'LIKE', "%{$search}%")
                     ->orWhere('description', 'LIKE', "%{$search}%")
                     ->get();
    } else {
        // If no query, return all items
        $items = Item::all();
    }

    // Return the same view with the filtered items and query
    return view('items.index', compact('items', 'search'));
}

}

