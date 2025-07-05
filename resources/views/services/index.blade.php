<x-app-layout>


    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Services Management') }}
        </h2>
    </x-slot>





<div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">All Services</h1>
            <a href="{{ route('services.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded shadow">
                + Create Services
            </a>
        </div>





         <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Title</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Created By</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Date</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Content</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                             <td class="px-6 py-4 text-sm text-blue-600 font-medium">
                                <a href="{{ route('services.show', $service) }}" class="hover:underline">{{ $service->title }}</a>
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $service->user->name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $service->created_at->format('d M Y H:i') }}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ Str::limit($service->description, 20) }}
                            </td>

                            <td class="px-6 py-4 text-sm flex gap-2">
                                <a href="{{ route('services.edit', $service) }}"
                                   class="inline-block bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-sm px-3 py-1.5 rounded">
                                    Edit
                                </a>
                                <form action="{{ route('services.destroy', $service) }}" method="POST"
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


                </tbody>
            </table>
        </div>

    </div>
    </x-app-layout>

