<x-app-layout>

    <h1>{{ $service->title }}</h1>
    <p>{{ $service->description }}</p>
    <p>Created by: {{ $service->user->name }} on {{ $service->created_at->format('Y-m-d') }}</p>
    <a href="{{ route('services.index') }}">Back</a>
</x-app-layout>
