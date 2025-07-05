<x-app-layout>


    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Services') }}
        </h2>
    </x-slot>



<form action="{{ route('services.update', $service) }}" method="POST" class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md space-y-4">
    @csrf
    @method('PUT')

    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Update Service</h2>

    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
        <input
            type="text"
            name="title"
            id="title"
            value="{{ $service->title }}"
            required
            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        >
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea
            name="description"
            id="description"
            rows="4"
            required
            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        >{{ $service->description }}</textarea>
    </div>

    <button
        type="submit"
        class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition duration-300"
    >
        Update
    </button>
</form>

</x-app-layout>
