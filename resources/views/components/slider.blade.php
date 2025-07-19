<div id="default-carousel" class="relative w-full max-w-full mx-auto">
  <!-- Carousel wrapper -->
  <div class="relative h-56 overflow-hidden md:h-96">
    <!-- Slide 1 -->
    <div class="duration-700 ease-in-out absolute inset-0 transition-all transform" data-carousel-item style="transform: translateX(0%)">
      <div class="absolute inset-0 bg-black opacity-90"></div>
      <img src="{{ asset('images/citybackground.jpg') }}" class="absolute block w-full h-full object-cover" alt="Slide 1">
      <div class="absolute inset-0 flex items-center justify-center">
        <h2 class="text-white text-3xl font-bold animate-fadeIn">Welcome To</h2>
      </div>
    </div>
    <!-- Slide 2 -->
    <div class="duration-700 ease-in-out absolute inset-0 transition-all transform" data-carousel-item style="transform: translateX(100%)">
      <div class="absolute inset-0 bg-black opacity-90"></div>
      <img src="{{ asset('images/images2.jpg') }}" class="absolute block w-full h-full object-cover" alt="Slide 2">
      <div class="absolute inset-0 flex items-center justify-center">
        <h2 class="text-white text-3xl font-bold animate-fadeIn">Advanced Works Design</h2>
      </div>
    </div>
    <!-- Slide 3 -->
    <div class="duration-700 ease-in-out absolute inset-0 transition-all transform" data-carousel-item style="transform: translateX(100%)">
      <div class="absolute inset-0 bg-black opacity-90"></div>
      <img src="{{ asset('images/images3.jpg') }}" class="absolute block w-full h-full object-cover" alt="Slide 3">
      <div class="absolute inset-0 flex items-center justify-center">
        <h2 class="text-white text-3xl font-bold animate-fadeIn">WebSite</h2>
      </div>
    </div>
  </div>

  <!-- Slider indicators -->
  <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3">
    <button type="button" class="w-3 h-3 rounded-full bg-white" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
    <button type="button" class="w-3 h-3 rounded-full bg-white/50" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
    <button type="button" class="w-3 h-3 rounded-full bg-white/50" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
  </div>

  <!-- Slider controls -->
  <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
      <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
      </svg>
      <span class="sr-only">Previous</span>
    </span>
  </button>
  <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
      <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
      </svg>
      <span class="sr-only">Next</span>
    </span>
  </button>
</div>

<style>
  @keyframes fadeIn {
    0% { opacity: 0; transform: translateY(10px); }
    100% { opacity: 1; transform: translateY(0); }
  }
  .animate-fadeIn { animation: fadeIn 0.7s ease-out; }

  /* Carousel specific styles */
  [data-carousel-item] {
    transition: transform 700ms ease-in-out;
  }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const carousel = document.getElementById('default-carousel');
  const items = Array.from(carousel.querySelectorAll('[data-carousel-item]'));
  const indicators = Array.from(carousel.querySelectorAll('[data-carousel-slide-to]'));
  const prevBtn = carousel.querySelector('[data-carousel-prev]');
  const nextBtn = carousel.querySelector('[data-carousel-next]');

  let currentIndex = 0;
  let intervalId;
  const intervalDuration = 3000; // 3 seconds interval

  // Initialize carousel
  function showSlide(index) {
    // Update slide positions
    items.forEach((item, i) => {
      if (i < index) {
        item.style.transform = 'translateX(-100%)';
      } else if (i === index) {
        item.style.transform = 'translateX(0%)';
      } else {
        item.style.transform = 'translateX(100%)';
      }
    });

    // Update indicators
    indicators.forEach((indicator, i) => {
      indicator.setAttribute('aria-current', i === index);
      indicator.classList.toggle('bg-white', i === index);
      indicator.classList.toggle('bg-white/50', i !== index);
    });

    currentIndex = index;
  }

  // Next slide
  function nextSlide() {
    const nextIndex = (currentIndex + 1) % items.length;
    showSlide(nextIndex);
  }

  // Previous slide
  function prevSlide() {
    const prevIndex = (currentIndex - 1 + items.length) % items.length;
    showSlide(prevIndex);
  }

  // Start auto-rotation
  function startInterval() {
    clearInterval(intervalId);
    intervalId = setInterval(nextSlide, intervalDuration);
  }

  // Event listeners
  nextBtn.addEventListener('click', () => {
    clearInterval(intervalId);
    nextSlide();
    startInterval();
  });

  prevBtn.addEventListener('click', () => {
    clearInterval(intervalId);
    prevSlide();
    startInterval();
  });

  indicators.forEach((indicator, index) => {
    indicator.addEventListener('click', () => {
      clearInterval(intervalId);
      showSlide(index);
      startInterval();
    });
  });

  // Initialize
  showSlide(0);
  startInterval();

  // Pause on hover
  carousel.addEventListener('mouseenter', () => clearInterval(intervalId));
  carousel.addEventListener('mouseleave', startInterval);
});
</script>
