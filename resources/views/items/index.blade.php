<x-app-layout>
    <x-slot name='header'>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Items') }}
        </h2>
    </x-slot>

    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Items:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($items as $item )
                        <a href="{{ route('items.show', $item) }}">
                            <x-item-card
                                :item_name="$item->item_name"
                                :image="$item->image"
                                :price="$item->price"
                                :description="$item->description"
                            />
                        </a>

                        {{-- edit  and delete button --}}
                        <div class="mt-4 flex space-x-2">

                            <a href="{{ route('items.edit', $item) }}" class="text-grey-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                edit
                            </a>

                            <form action="{{route ('item.destroy', $item)}}" method="POST" ansubmit="return confirm(Are you sure you want to delete this item?);">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-reg-700 text-gray-600 font-bold py-2 px-4 rounded">
                                    delete
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
