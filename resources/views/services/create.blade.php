<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Service') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-2xl">
            <form action="{{ route('services.store') }}" method="POST"
                  class="bg-white border border-gray-200 shadow-md rounded-lg p-8 space-y-6">
                @csrf

                <h2 class="text-2xl font-bold text-gray-800 mb-6">Create New Service</h2>

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" id="title" placeholder="Enter title" required
                           class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm
                                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Description <span class="text-red-500">*</span>
                    </label>
                    <textarea name="description" id="description" placeholder="Enter description" rows="5" required
                              class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm resize-none
                                     focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"></textarea>
                </div>

                <!-- Actions -->
                <div class="pt-4 flex justify-between">
                    <a href="{{ route('services.index') }}"
                       class="inline-flex items-center bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-2 rounded-md shadow transition duration-150">
                        Cancel
                    </a>

                    <button type="submit"
                            class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-md shadow focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-150">
                        ➕ Create Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
