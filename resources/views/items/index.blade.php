<x-app-layout>
    <x-slot name='header'>
        <div class="bg-gradient-to-r from-gray-900 to-gray-700 p-6 rounded-lg shadow-lg">
            <h2 class="text-3xl font-extrabold text-gray-100 leading-tight">
                {{ __('All Items') }}
            </h2>
            <p class="text-gray-300 mt-2">
                Explore our collection of items below.
            </p>

            <!-- Search Bar -->
            <form action="{{ route('items.search') }}" method="GET" class="mt-4">
                <div class="flex items-center">
                    <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="Search items..."
                           class="w-full sm:w-1/2 p-2 rounded-lg bg-gray-800 text-gray-100 placeholder-gray-400 focus:outline-none focus:bg-gray-700" />
                    <button type="submit" class="ml-2 bg-gray-600 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-lg">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </x-slot>

    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <h3 class="font-semibold text-lg mb-4">List of Items:</h3>

                    @if(isset($query))
                        <p class="text-gray-600 mb-4">Search results for "{{ $query }}":</p>
                    @endif

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($items as $item)
                            <div class="bg-gray-50 border border-gray-300 p-4 rounded-lg shadow-sm flex flex-col h-full">
                                <!-- Item Card Content -->
                                <a href="{{ route('items.show', $item) }}">
                                    <x-item-card
                                        :item_name="$item->item_name"
                                        :image="$item->image"
                                        :price="$item->price"
                                        :description="$item->description"
                                        class="text-gray-700"
                                    />
                                </a>

                                <!-- Edit and Delete buttons at the bottom of the card -->
                                <div class="mt-auto space-x-2 flex justify-between">
                                    <a href="{{ route('items.edit', $item) }}" class="text-gray-700 border border-gray-400 hover:bg-gray-300 font-bold py-2 px-4 rounded">
                                        Edit
                                    </a>

                                    <form action="{{ route('items.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-600">No items found matching "{{ $query }}"</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
