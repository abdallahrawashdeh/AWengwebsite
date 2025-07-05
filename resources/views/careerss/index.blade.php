<x-app-layout>

    {{-- Load Vite assets if manifest or hot reload is available --}}
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    {{-- Page header slot --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Careers Management') }}
        </h2>
    </x-slot>

    {{-- Main content --}}
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">All Careers</h1>
            <a href="{{ route('careerss.create') }}"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded shadow">
                + Create Career
            </a>
        </div>

        {{-- Careers Table --}}
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Title</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Author</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Date</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Subtitle</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Content</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Years Of Experience</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($careers as $career)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $career->title }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $career->user->name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $career->created_at->format('d M Y H:i') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ Str::limit($career->subtitle, 50) }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ Str::limit($career->content, 50) }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ Str::limit($career->years_experience, 50) }}
                            </td>
                            <td class="px-6 py-4 text-sm flex gap-2">
                                <a href="{{ route('careerss.edit', $career) }}"
                                   class="inline-block bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm px-3 py-1.5 rounded">
                                    Edit
                                </a>
                                <form action="{{ route('careerss.destroy', $career) }}" method="POST"
                                      onsubmit="return confirm('Are you sure?')" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-1.5 rounded">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($careers->isEmpty())
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                No careers found.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
