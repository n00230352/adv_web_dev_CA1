@props(['item_name', 'price', 'description', 'image'])

{{-- Item Details Componet --}}
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-wl mx-auto">
{{-- limit the overall container width to make the compponent more compact --}}
    {{-- item name --}}
    <h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;">{{$item_name}}</h1>

    {{-- item cover image --}}
    <div class="overflow-hidden rounded-lg mb-4 flex justify-centrer"> {{-- image smaller size --}}
         <img src="{{ asset('images/items/' . $image) }}" alt="{{ $item_name}}" class="w-fully max-w-xs h-auto object-cover">{{--image max-w-xs (20erm) and ensure responsiveness  --}}
    </div>

    {{-- price --}}
    <h2 class="text-gray-500 text-sm italic mb-4"  style="font-size:1erm;">Price: {{ $price }}</h2>
    {{-- price in italics and smaller text --}}

    {{-- item description --}}
    <h3 class="text-gray-800 font-semibold mb-2" style="font-size: 2rem">Description</h3>
    {{-- subheading for description --}}
    <p class="text-gray-700 leading-relaxed">{{ $description }}</p>
    {{-- text is spaced out  --}}
</div>
