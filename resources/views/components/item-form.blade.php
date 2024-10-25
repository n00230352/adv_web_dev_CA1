@props(['action', 'method'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
@csrf
@if($method === 'PUT' | | $method === 'PATCH')
    @method($method)
@endif


<div class="mb-4">
    <label for="title" class="block text-sm text-gray-700">Title</label>
    <input
        type="text"
        name="item_name"
        id="item_name"
        value="{{ old('item_name', $item->item_name ?? '') }}"
        required
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm />
    @error ('title')
        <p class="text-sm text-red-600">{{$message}}</p>
    @enderror
</div>

<div class="mb-4">
    <labelfor="image"class="block text-sm font-medium text-gray-700">Item Image </label>
    <input
        type="file"
        name="image"
        id="image"
        {{isset($item) ?'' : 'required' }}
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-
        500 focus:border-indigo-500" />

    @error('image')
        <p class="text-sm text-red-600">{f $message }</p>
    @enderror
</div>

@isset($item->image)
        <div class="mb-4">
        <img src="{{asset($book->image)}}" alt="Item picture" class="w-24 h-32 object-cover">
    </div>
@endisset

<div>
    <x-primary-button>
        {{ isset($item)? 'Update Item' : 'Add Item'}}
    </x-primary-button>
</div>
</form>

