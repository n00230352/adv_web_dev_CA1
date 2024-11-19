<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Item;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Item $item)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        //create the review associated with the item and user
        $item->reviews()->create([
            'user_id' => auth()->id(),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
            'item_id' => $item->id
        ]);

        return redirect()->route('items.show', $item)->with('success', 'Review added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        // check is user is admin or owner
        if (auth()->user()->id !== $review->user_id && auth()->user()->role !== 'admin') {
            return redirect()->route('items.index')->with('error', 'Access denied.');
        }
        return view('review.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        // Validation
        //check to make sure the user is authorised to update the content
        $review->update($request->only(['rating', 'comment']));

        //when updated in DB, redirect somewhere that makes sense in the application
        return redirect()->route('items.show', $review->item_id)
                         ->with('success', 'Review update successfully');

        // Update the review
        $review->update([
            'review_text' => $request->review_text,
            'rating' => $request->rating,
        ]);

        // Redirect back with success message
        return redirect()->route('items.show', $review->item_id)
                        ->with('success', 'Review updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
