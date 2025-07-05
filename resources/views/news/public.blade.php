<x-app-layout>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <div class="container py-4">
        <h1 class="mb-4">Latest News</h1>

        @foreach ($news as $item)
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>{{ $item->title }}</strong>
                    <small>{{ $item->created_at->format('d M Y H:i') }}</small>
                </div>
                <div class="card-body">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="mb-3 img-fluid" style="max-height: 300px;">
                    @endif
                    <h5>{{ $item->subtitle }}</h5>
                    <p>{{ Str::limit($item->content, 150) }}</p>
                    <p class="text-muted">By {{ $item->user->name }}</p>
                    <a href="{{ route('news.show', $item) }}" class="btn btn-outline-primary">Read More</a>
                </div>
            </div>
        @endforeach

        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {{ $news->links() }}
        </div>
    </div>
</x-app-layout>
