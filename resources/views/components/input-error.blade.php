@props(['messages'])

@if ($messages)
    <!-- If there are messages, show them in a list -->
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        <!-- Loop through each message and show it as a list item -->
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
