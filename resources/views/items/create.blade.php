<x-app-layout>
    <!-- Page header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Items') }}
        </h2>
    </x-slot>

    <!-- Main content area -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sahdow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Section item_name for form -->
                    <h3 class="font-semibold text-lg mb-4">Add a New Item:</h3>

                    <!-- Item form component with action and method props -->
                    <x-item-form
                        :action="route('items.store')"
                        :method="'POST'"
                    />

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
