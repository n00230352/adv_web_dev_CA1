<x-app-layout>
    <!-- Page header with title -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Item') }}
        </h2>
    </x-slot>

      <!-- Main content area -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Edit Item:</h3>

                    <!-- Item form component for editing an item -->
                    <!-- Update route for item -->
                    <!-- PUT method for editing -->
                    <!-- Pass the item data for editing -->
                    <x-item-form
                    :action="route('items.update', $item)"
                    :method="'PUT'"
                    :item="$item"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
