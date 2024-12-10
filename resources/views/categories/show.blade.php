<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Category Box -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h1 class="font-semibold text-lg mb-2">{{ $category->category_name }}</h1>
                    <p class="text-gray-600">{{ $category->description }}</p>
                </div>
            </div>

            <!-- Items Box -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-lg mb-4">Items in this Category</h2>

                    @if($category->items->isEmpty())
                        <p class="text-gray-600">No Items yet.</p>
                    @else
                        <ul class="mt-4 space-y-4">
                            @foreach($category->items as $item)
                                <x-item-card
                                    :item_name="$item->item_name"
                                    :image="$item->image"
                                    :price="$item->price"
                                    :description="$item->description"
                                />
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
