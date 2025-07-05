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
        <h1 class="text-4xl text-white font-bold">Our services</h1>
        <p class="text-xl text-white mt-4">All services!</p>
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

        .services-item {
            animation: slideIn 0.6s ease-out forwards;
            opacity: 0;
        }

        .services-item:nth-child(1) { animation-delay: 0.1s; }
        .services-item:nth-child(2) { animation-delay: 0.3s; }
        .services-item:nth-child(3) { animation-delay: 0.5s; }
        .services-item:nth-child(4) { animation-delay: 0.7s; }
    </style>
<section class="max-w-6xl w-full mt-10 mx-auto py-12 fade-slide-right" id="Latest_services">
        <!-- Section Header -->
<div class="text-center mb-16 fade-slide-right">
    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 mt-0">All services</h2>
    <div class="w-full h-1 bg-[#e9bc66] mx-auto mt-6 rounded-full"></div>
</div>
<style>
.fade-slide-right {
    opacity: 0;
    transform: translateX(100px);
    transition: all 0.8s ease-out;
}

.fade-slide-right.is-visible {
    opacity: 1;
    transform: translateX(0);
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target); // Stop observing once it's visible
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-slide-right').forEach(el => {
        observer.observe(el);
    });
});
</script>






@php use Illuminate\Support\Str; @endphp

<!-- Modal -->
<!-- Modal -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg max-w-2xl w-full relative">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
        <div id="modalContent" class="break-words whitespace-pre-wrap overflow-y-auto max-h-[70vh]"></div>
    </div>
</div>


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

<!-- services Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($services as $item)
        @php
            $cleanContent = strip_tags($item->content);
            $isLongContent = strlen($cleanContent) > 150;
            $previewContent = $isLongContent ? Str::limit($cleanContent, 150, '...') : $cleanContent;
        @endphp

        <div class="services-item bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">

                <div class="absolute top-4 left-4 bg-[#e9bc66] text-white text-lg font-semibold px-3 py-1 rounded-full">
                    {{ $item->title }}
                </div>
            <div class="p-6">
                <div class="flex items-center mt-8 text-sm text-gray-500 mb-2">
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $item->description }}</h3>
                <p class="text-gray-600 mb-4">{{ $previewContent }}</p>

                @if($isLongContent)
                    <button onclick="openModal(`{!! addslashes($item->content) !!}`)"
                            class="text-[#e9bc66] font-medium hover:text-[#f7c465] inline-flex items-center">
                        Read More
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                @endif
            </div>
        </div>
    @endforeach
</div>


    </section>

</body>
</html>
