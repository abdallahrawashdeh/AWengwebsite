<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endif
<body>

    <x-header />


<div class="relative h-[300px] w-full">
    <img src="https://images.unsplash.com/photo-1522252234503-e356532cafd5?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
         alt="Background Image" class="object-cover object-center w-full h-full" />
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center">
        <h1 class="text-4xl text-white font-bold">Our projects</h1>
        <p class="text-xl text-white mt-4">All projects!</p>
    </div>
</div>

<style>
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .projects-item {
        animation: slideIn 0.6s ease-out forwards;
        opacity: 0;
    }

    .projects-item:nth-child(1) { animation-delay: 0.1s; }
    .projects-item:nth-child(2) { animation-delay: 0.3s; }
    .projects-item:nth-child(3) { animation-delay: 0.5s; }
    .projects-item:nth-child(4) { animation-delay: 0.7s; }

    .fade-slide-right {
        opacity: 0;
        transform: translateX(100px);
        transition: all 0.8s ease-out;
    }

    .fade-slide-right.is-visible {
        opacity: 1;
        transform: translateX(0);
    }

    .project-content {
        white-space: pre-wrap;
        word-wrap: break-word;
    }

    .project-card {
        margin-bottom: 2rem;
    }

    /* Month filter styles */
    .month-filter {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 2rem;
        padding: 1rem 0;
    }

    .month-btn {
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        background-color: #f3f4f6;
        color: #4b5563;
        border: 1px solid #e5e7eb;
        cursor: pointer;
        transition: all 0.2s;
    }

    .month-btn:hover {
        background-color: #e5e7eb;
    }

    .month-btn.active {
        background-color: #e8bc61; /* indigo-600 */
        color: white;
        border-color: #6366f1;
    }

    .no-results {
        text-align: center;
        padding: 2rem;
        color: #6b7280;
        font-style: italic;
    }
</style>

<section class="max-w-6xl w-full mt-10 mx-auto py-12 fade-slide-right" id="Latest_projects">
    <!-- Section Header -->
    <div class="text-center mb-8 fade-slide-right">
        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 mt-0">All projects</h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Stay updated with our most recent announcements and stories</p>
        <div class="w-full h-1 bg-[#e8bc61] mx-auto mt-6 rounded-full"></div>
    </div>

    <!-- Month Filter -->
    <div class="month-filter">
        <button class="month-btn active" data-month="all">All Months</button>
        @php
            // Get unique months from projects
            $months = [];
            foreach ($projects as $item) {
                $monthYear = $item->created_at->format('Y-m');
                $monthName = $item->created_at->format('F Y');
                if (!isset($months[$monthYear])) {
                    $months[$monthYear] = $monthName;
                }
            }
            krsort($months); // Sort newest first
        @endphp

        @foreach($months as $monthKey => $monthName)
            <button class="month-btn" data-month="{{ $monthKey }}">{{ $monthName }}</button>
        @endforeach
    </div>

    <!-- Projects Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="projects-container">
        @foreach($projects as $item)
        <div class="projects-item project-card" data-month="{{ $item->created_at->format('Y-m') }}">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                <div class="relative h-48 overflow-hidden">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="Project image" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    @endif

                    <div class="absolute top-4 right-4 bg-[#e8bc61] text-white text-xs font-semibold px-3 py-1 rounded-full">
                        {{ $item->title }}
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center text-sm text-gray-500 mb-2">
                        <span>{{ $item->created_at->format('F j, Y') }}</span>
                        <span class="mx-2">•</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $item->subtitle }}</h3>
                    <div class="project-content text-gray-600 mb-4">
                        {!! $item->content !!}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div id="no-results" class="no-results hidden">
        No projects found for the selected month.
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Intersection Observer for animations
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-slide-right').forEach(el => {
        observer.observe(el);
    });

    // Month filter functionality
    const monthButtons = document.querySelectorAll('.month-btn');
    const projectItems = document.querySelectorAll('.project-card');
    const noResults = document.getElementById('no-results');
    const projectsContainer = document.getElementById('projects-container');

    monthButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active button
            monthButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            const selectedMonth = this.dataset.month;
            let hasResults = false;

            // Filter project items
            projectItems.forEach(item => {
                const itemMonth = item.dataset.month;

                if (selectedMonth === 'all' || itemMonth === selectedMonth) {
                    item.style.display = 'block';
                    hasResults = true;
                } else {
                    item.style.display = 'none';
                }
            });

            // Show/hide no results message
            if (hasResults) {
                noResults.classList.add('hidden');
                projectsContainer.classList.remove('hidden');
            } else {
                noResults.classList.remove('hidden');
                projectsContainer.classList.add('hidden');
            }
        });
    });
});
</script>

</body>
</html>
