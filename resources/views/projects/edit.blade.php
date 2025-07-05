<x-app-layout>

<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Project</h1>

    <form action="{{ route('projects.update', $project) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Year -->
        <div>
            <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
            <input
                type="number"
                name="year"
                id="year"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                value="{{ old('year', $project->year) }}"
                required
            >
        </div>

        <!-- Title -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input
                type="text"
                name="title"
                id="title"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                value="{{ old('title', $project->title) }}"
                required
            >
        </div>

        <!-- Content -->
        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea
                name="content"
                id="content"
                rows="5"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                required
            >{{ old('content', $project->content) }}</textarea>
        </div>

        <!-- Buttons -->
        <div class="flex items-center justify-between">
            <button
                type="submit"
                class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
            >
                Update
            </button>
            <a
                href="{{ route('projects.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium rounded-md"
            >
                Cancel
            </a>
        </div>
    </form>
</div>

</x-app-layout>
