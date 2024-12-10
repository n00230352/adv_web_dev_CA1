@props(['action', 'method', 'category', 'items','categoryItems'])

<!-- Start the form -->
<form action="{{ $action }}" method="POST" enctype="multipart/form-data">

    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif
    <!-- Show any error messages -->
    <div class="mb-4">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Input for item name -->
        <label for="item_name" class="block text-sm font-medium text-gray-700">Category Name </label>
        <input
            type="text"
            name="category_name"
            id="category_name"
            value="{{ old('category_name', $category->category_name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-
            500 focus:border-indigo-500"
        />

        @error('category_name')
        <p class='text-sm text-red-600'>{{ $message}}</p>
        @enderror
    </div>

    <!-- Input for item description -->
    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea
            name="description"
            id="description"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        >{{ old('description', $category->description ?? '') }}</textarea>

        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


        @error('description')
        <p class='text-sm text-red-600'>{{ $message}}</p>
        @enderror
    </div>

    <h3 class="font-semibold text-lg mb-4 pt-5">Assign this category to existing items</h3>
        <div>
            @foreach ($items as $item)
            <div>
                <input type="checkbox" id="item_{{ $item->id }}" name="items[]" value="{{ $item->id }}"
                @if(isset($categoryItems) && in_array($item->id, $categoryItems)) checked @endif>
                <label for="item_{{ $item->id }}" class="ml-2">{{$item->item_name}}</label>
            </div>
            @endforeach
        </div>

         <!-- Button to add or update the item -->
        <div>
            <x-primary-button>
                {{ isset($category) ? 'Update category' : 'Add Category '}}
            </x-primary-button>
        </div>
    </div>
</form>

