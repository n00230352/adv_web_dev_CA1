@props(['category_name',  'description'])

<!-- Card container -->
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{$category_name}}</h4>

     <!-- Show the item description -->
    <p class="text-gray-800 mt-4">{{ $description }} </p>
</div>
