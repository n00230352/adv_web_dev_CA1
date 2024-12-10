<x-app-layout>
    <x-slot name='header'>
        <div class="bg-gradient-to-r from-gray-900 to-gray-700 p-6 rounded-lg shadow-lg">
            <h2 class="text-3xl font-extrabold text-gray-100 leading-tight">
                {{ __('All Categories') }}
            </h2>
        </div>
    </x-slot>

    <!-- Success alert for any success messages -->
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <!-- Main content area -->
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <h3 class="font-semibold text-lg mb-4">List of Categories:</h3>

                    <!-- Display search results if search query exists -->
                    @if (isset($query))
                        <p class="text-gray-600 mb-4">Search results for "{{ $query }}":</p>
                    @endif

                    <!-- Display grid of category cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php //echo $categories; ?>

                        @if ($categories->isEmpty())
                            <div>no results</div>
                        @else
                            @foreach ($categories as $category)
                                <div
                                    class="bg-gray-50 border border-gray-300 p-4 rounded-lg shadow-sm flex flex-col h-full">
                                    <!-- categories Card Content -->
                                    <a href="{{ route('categories.show', $category) }}">
                                        <x-category-card :category_name="$category->category_name" :description="$category->description" class="text-gray-700" />
                                    </a>

                                    <!-- Edit and Delete buttons at the bottom of the card -->
                                    @if (auth()->user()->role === 'admin')
                                        <div class="mt-auto space-x-2 flex justify-between">
                                            <a href="{{ route('categories.edit', $category) }}"
                                                class="text-gray-700 border border-gray-400 hover:bg-gray-300 font-bold py-2 px-4 rounded">
                                                Edit
                                            </a>

                                            <!-- Delete form with confirmation -->
                                            <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this categories?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                {{-- @empty
                            <!-- Message if no categories are found -->
                            <p class="text-gray-600">No categories found matching "{{ $query }}"</p> --}}
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
