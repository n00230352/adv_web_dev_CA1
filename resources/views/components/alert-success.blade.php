<!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
    @if(session('success'))
    <div class="mb-4 px-4 py-2 bg-green-100 border border-green-500 text -green-700 rounded-md">
        {{ $slot}}
    </div>
    @endif
