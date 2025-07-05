<x-app-layout>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
        <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Career') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-2xl space-y-8">

            <form action="{{ route('careerss.update', $career->id) }}" method="POST"
                  class="bg-white shadow-lg rounded-lg p-8 space-y-6 border border-gray-200">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ $career->title }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                </div>

                <div>
                    <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-1">Subtitle <span class="text-red-500">*</span></label>
                    <input type="text" name="subtitle" id="subtitle" value="{{ $career->subtitle }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                </div>

                <div>
                    <label for="years_experience" class="block text-sm font-medium text-gray-700 mb-1">Years of Experience <span class="text-red-500">*</span></label>
                    <input type="text" name="years_experience" id="years_experience" value="{{ $career->years_experience }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content <span class="text-red-500">*</span></label>
                    <textarea name="content" id="content" rows="5" required
                              class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-200 resize-none">{{ $career->content }}</textarea>
                </div>

                <div class="pt-4 text-right">
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md shadow transition duration-200">
                        🔄 Update Career
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
