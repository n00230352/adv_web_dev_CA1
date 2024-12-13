<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4 text-gray-800">Item Details</h3>
                    <x-item-details
                        :item_name="$item->item_name"
                        :image="$item->image"
                        :price="$item->price"
                        :description="$item->description"
                    />

                    {{-- Item reviews --}}
                    <h4 class="font-semibold text-md mt-8 text-gray-800">Reviews</h4>
                    @if($item->reviews->isEmpty())
                        <p class="text-gray-600">No reviews yet</p>
                    @else
                        <ul class="mt-4 space-y-4">
                            @foreach($item->reviews as $review)
                                <li class="bg-gray-100 p-4 rounded-lg shadow-sm">
                                    <p class="font-semibold text-gray-700">{{ $review->user->name }} ({{$review->created_at->format('M d, Y')}})</p>
                                    <p class="text-gray-600">Rating: {{ $review->rating }} / 5</p>
                                    <p class="text-gray-700">{{ $review->comment }}</p>

                                    {{-- Edit and delete the review --}}
                                    @if ($review->user->is(auth()->user()) || auth()->user()->role === 'admin')
                                        <a href="{{ route('reviews.edit', $review) }}"
                                           class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded transition-colors duration-300">
                                            {{ __('Edit Review') }}
                                        </a>
                                        <form method="POST" action="{{ route('reviews.destroy', $review) }}" class="inline-block">
                                            @csrf
                                            @method('delete')
                                            <x-danger-button :href="route('reviews.destroy', $review)"
                                                             onclick="event.preventDefault(); this.closest('form').submit();"
                                                             class="ml-2 bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded transition-colors duration-300">
                                                {{ __('Delete Review') }}
                                            </x-danger-button>
                                        </form>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    {{-- Add a new review --}}
                    <h4 class="font-semibold text-md mt-8 text-gray-800">Add a Review</h4>
                    <form action="{{ route('reviews.store', $item ) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-4">
                            <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                            <select name="rating" id="rating" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                            <textarea name="comment" id="comment" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Write your review here..."></textarea>
                        </div>

                        <button type="submit" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded transition-colors duration-300">
                            Submit Review
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
