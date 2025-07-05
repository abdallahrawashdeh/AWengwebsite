<x-app-layout>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show News') }}
        </h2>
    </x-slot>

@php
    $isLongContent = strlen(strip_tags($news->content)) > 150;
    $previewContent = $isLongContent
        ? Str::limit(strip_tags($news->content), 150, '...')
        : $news->content;
@endphp

    <div class="news-item mt-20 w-[28%] mx-auto bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
        <div class="relative h-48 overflow-hidden">
            <img src="{{ asset('storage/' . $news->image) }}" alt="News Image" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
            <div class="absolute top-4 right-4 bg-indigo-600 text-white text-xs font-semibold px-3 py-1 rounded-full">
                {{ $news->title }}
            </div>
        </div>
        <div class="p-6">
            <div class="flex items-center text-sm text-gray-500 mb-2">
                <span>{{ $news->created_at->format('d M Y H:i') }}</span>
                <span class="mx-2">•</span>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $news->subtitle }}</h3>

            <p class="text-gray-600 mb-4">{!! nl2br(e($previewContent)) !!}</p>

            @if ($isLongContent)
                <a href="#"
                   onclick="openModal({{ json_encode(nl2br(e($news->content))) }})"
                   class="text-indigo-600 font-medium hover:text-indigo-800 inline-flex items-center">
                    Read More
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            @endif
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white max-w-xl w-full p-6 rounded-lg shadow-lg relative">
            <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 text-2xl font-bold">
                &times;
            </button>
            <div id="modalContent" class="text-gray-800 overflow-y-auto max-h-[70vh]">
                <!-- Full content will be loaded here -->
            </div>
        </div>
    </div>

    <!-- Inline Script -->
    <script>
        function openModal(content) {
            const modal = document.getElementById('modal');
            const modalContent = document.getElementById('modalContent');
            modalContent.innerHTML = content;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            const modal = document.getElementById('modal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    </script>
</x-app-layout>
