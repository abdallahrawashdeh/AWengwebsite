<x-app-layout>

<div class="container">
    <h1>{{ $client->title }}</h1>
    <img src="{{ asset('storage/' . $client->image) }}" class="img-fluid" alt="{{ $client->title }}">
    <p>Uploaded by: {{ $client->user->name }}</p>
    <p>Created at: {{ $client->created_at->format('Y-m-d H:i') }}</p>
    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Back</a>
</div>
</x-app-layout>
