<x-app-layout>

<div class="container">
    <h1>{{ $project->title }}</h1>
    <h5>Year: {{ $project->year }}</h5>
    <p>{{ $project->content }}</p>
    <p><small>Created by: {{ $project->user->name }} on {{ $project->created_at->format('Y-m-d H:i') }}</small></p>

    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back to Projects</a>
</div>
</x-app-layout>
