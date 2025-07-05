<x-app-layout>

<div class="container">
    <h1>Edit Client</h1>
    <form action="{{ route('clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ $client->title }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Current Image:</label><br>
            <img src="{{ asset('storage/' . $client->image) }}" width="150">
        </div>
        <div class="form-group mb-3">
            <label for="image">New Image (optional)</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</x-app-layout>
