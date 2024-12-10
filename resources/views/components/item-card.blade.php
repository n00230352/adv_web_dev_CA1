@props(['item_name', 'price', 'description', 'image'])

<!-- Card container -->
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg mb-4">{{ $item_name }}</h4>

    <!-- Display the item image with resizing -->
    <img src="{{ asset('images/items/' . $image) }}" alt="{{ $item_name }}"
         class="w-full h-64 object-contain rounded-lg mb-4" />

    <!-- Show the item price -->
    <p class="text-gray-600">({{ $price }})</p>

    <!-- Show the item description -->
    <p class="text-gray-800 mt-4">{{ $description }}</p>
</div>
