@props(['action', 'method', 'item'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">

    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

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


        <label for="item_name"class="block text-sm font-medium text-gray-700">Item Name </label>
        <input
            type="text"
            name="item_name"
            id="item_name"
            value="{{ old('item_name', $item->item_name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-
            500 focus:border-indigo-500"
        />

        @error('item_name')
        <p class='text-sm text-red-600'>{{ $message}}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="price"class="block text-sm font-medium text-gray-700">Price</label>
        <input
            type="number"
            name="price"
            id="price"
            min="0" step="1"
            value="{{ old('price', $item->price ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-
            500 focus:border-indigo-500"
        />

        @error('price')
        <p class='text-sm text-red-600'>{{ $message}}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description"class="block text-sm font-medium text-gray-700">Description</label>
        <textarea
            name="description"
            id="description"
            value="{{ old('description', $item->description ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-
            500 focus:border-indigo-500"
        >
    <?php echo $item->description ?>
    </textarea>

        @error('description')
        <p class='text-sm text-red-600'>{{ $message}}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
        <input type="file" name="image" id="image" {{ isset($item) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


        @isset($item->image)
            <div class="mb-4">
                <img src="{{asset( 'images/items/'  . $item->image)}}" alt="{{$item->   item_name}}" class="w-24 h-32 object cover">
            </div>
        @endisset

        <div>
            <x-primary-button>
                {{ isset($item) ? 'Update Item' : 'Add Item '}}
            </x-primary-button>
        </div>
    </div>
</form>

