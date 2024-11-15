<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Item Details</h3>
                        <x-item-details
                            :item_name="$item->item_name"
                            :image="$item->image"
                            :price="$item->price"
                            :description="$item->description"
                        />

                    {{-- item reviews --}}
                    <h4 class="font-semibold text-md mt-8">Reviews</h4>
                    @if($item->reviews->isEmpty())
                        <p class="text-gray-600">No reviews yet</p>
                    @else
                        <ul class="mt-4 space-y-4">
                            @foreach($item->reviews as $review)
                                <li class="bg-gray-100 p-4 rounded-lg">
                                    <p class="font-semibold">{{ $review->user->name }} ({{$review->created_at->format('M d, Y')}})</p>
                                    <p>Rating: {{ $review->rating }} / 5</p>
                                    <p>{{ $review->comment }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    {{-- Add a new review --}}
                    <h4 class="font-semibold text-md mt-8">Add a Review</h4>
                    <form action="{{ route('reviews.store', $item ) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-4">
                            <label for="rating" class="block font-medium text-sm text-gray-700">Rating</label>
                            <select name="rating" id="rating" class="mt-1 block w-full" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="comment" class="block font-medium text-sm text-gray-7000">Comment</label>
                            <textarea name="comment" id="comment" rows="3" class="mt-1 block w-fully" placeholder="Write your review here..."></textarea>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 px-4 rounded">
                            Submit Review
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
