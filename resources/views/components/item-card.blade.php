@props(['item_name', 'price', 'description', 'image'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{$item_name}}</h4>
    <img src="{{asset( 'images/items/'  .$image)}}" alt="{{$item_name}}">
    <p class="text-gray-600"> ({{ $price }})</p>
    <p class="text-gray-800 mt-4">{{ $description }} </p>
</div>

