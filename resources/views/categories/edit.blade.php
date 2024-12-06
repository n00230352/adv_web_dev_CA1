<x-app-layout>
    <!-- Page header with title -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

      <!-- Main content area -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Edit Category:</h3>

                    <!-- Category form component for editing an category -->
                    <!-- Update route for category -->
                    <!-- PUT method for editing -->
                    <!-- Pass the categoroy data for editing -->
                    <x-category-form
                    :action="route('categories.update', $category)"
                    :method="'PUT'"
                    :category="$category"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
