<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Careers</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <x-header />


<!-- Banner -->
<div class="relative h-[300px] w-full">
  <img src="https://images.unsplash.com/photo-1522252234503-e356532cafd5?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
       class="w-full h-full object-cover" alt="Banner">
  <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center">
    <h1 class="text-white text-4xl font-bold">Careers</h1>
    <p class="text-white text-xl mt-4">Open positions!</p>
  </div>
</div>

<!-- Careers List -->
<div class="flex flex-col gap-8 w-full lg:w-[85%] mx-auto px-4 py-10">
  @forelse($careers as $career)
  <div class="bg-white shadow-lg hover:shadow-xl transition-all duration-300">
    <div class="relative h-60 overflow-hidden">
      <img src="{{ asset('images/images1.jpg') }}" alt="Career image"
           class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
      <div class="absolute top-4 left-4 bg-black bg-opacity-50 text-white text-2xl font-semibold px-3 py-1">
        {{ $career->title }}
      </div>
    </div>

    <div class="p-6">
      <div class="text-sm text-gray-500 mb-2">{{ $career->created_at->format('F d, Y') }}</div>
      <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $career->subtitle }}</h3>
      <p class="text-gray-600 mb-2"><strong>Experience:</strong> {{ $career->years_experience }} years</p>
      <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($career->content), 120) }}</p>

      <button onclick="openModal(`{!! nl2br(e($career->content)) !!}`)"
              class="text-[#e7bd62] hover:text-[#fecd65] inline-flex items-center font-medium">
        Read More
        <svg class="h-4 w-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
        </svg>
      </button>

      <!-- Apply Button -->
      <button
        type="button"
        onclick="toggleContactForm('contactForm-{{ $career->id }}')"
        class="ml-4 mt-4 text-[#e7bd62] hover:text-white border border-[#e7bd62] hover:bg-[#fac85d] focus:ring-4 focus:outline-none focus:ring-[#fac758] font-medium rounded-lg text-sm px-5 py-2.5"
      >
        Apply
      </button>

      <!-- Responsive Form -->
      <div id="contactForm-{{ $career->id }}" class="hidden w-full mt-6 bg-white p-6 rounded-lg shadow-md">
        <form
          action="https://formsubmit.co/abdallahrawashdeh123@gmail.com"
          method="POST"
          enctype="multipart/form-data"
        >
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Name -->
            <div>
              <label for="name-{{ $career->id }}" class="block text-sm font-medium text-gray-700 mb-1">Your name:</label>
              <input
                type="text"
                id="name-{{ $career->id }}"
                name="name"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#e9bc64]"
                placeholder="Your full name"
              />
            </div>

            <!-- Phone -->
            <div>
              <label for="phone-{{ $career->id }}" class="block text-sm font-medium text-gray-700 mb-1">Phone number:</label>
              <input
                type="tel"
                id="phone-{{ $career->id }}"
                name="phone"
                required
                pattern="[0-9+\-\s]{7,15}"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#e9bc64]"
                placeholder="+123 456 7890"
              />
            </div>

            <!-- Email -->
            <div>
              <label for="email-{{ $career->id }}" class="block text-sm font-medium text-gray-700 mb-1">Your email:</label>
              <input
                type="email"
                id="email-{{ $career->id }}"
                name="email"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#e9bc64]"
                placeholder="you@example.com"
              />
            </div>

            <!-- File Upload -->
<div>
  <label class="block text-sm font-medium text-gray-700 mb-1" for="file-{{ $career->id }}">Upload your CV:</label>

  <!-- Hidden File Input -->
  <input
    type="file"
    id="file-{{ $career->id }}"
    name="file"
    required
    class="hidden"
    onchange="document.getElementById('file-name-{{ $career->id }}').textContent = this.files[0]?.name || 'No file selected';"
  />

  <!-- Custom Button Label -->
  <label
    for="file-{{ $career->id }}"
    class="inline-block bg-[#e9bc64] hover:bg-[#f6c25c] text-white font-medium py-2 px-4 rounded-md cursor-pointer transition-colors"
  >
    Choose File
  </label>

  <!-- File name display -->
  <span id="file-name-{{ $career->id }}" class="ml-3 text-sm text-gray-600">No file selected</span>
</div>

          </div>

          <div class="mt-6">
            <button
              type="submit"
              class="w-full bg-[#e9bc64] text-white px-6 py-2 rounded-md hover:bg-[#f6c25c] transition-colors"
            >
              Send
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @empty
  <div class="text-center text-gray-500 text-xl py-20">
    No open positions.
  </div>
  @endforelse
</div>

<!-- Modal -->
<div id="modalOverlay" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white rounded-lg shadow-xl max-w-lg w-full mx-4 p-6 relative">
    <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-xl">&times;</button>
    <div id="modalContent" class="text-gray-800 space-y-4"></div>
  </div>
</div>

<script>
  function openModal(content) {
    document.getElementById('modalContent').innerHTML = content;
    document.getElementById('modalOverlay').classList.remove('hidden');
  }

  function closeModal() {
    document.getElementById('modalOverlay').classList.add('hidden');
  }

  document.getElementById('modalOverlay').addEventListener('click', function (e) {
    if (e.target === this) closeModal();
  });

  function toggleContactForm(id) {
    const form = document.getElementById(id);
    if (form) {
      form.classList.toggle('hidden');
      if (!form.classList.contains('hidden')) {
        form.scrollIntoView({ behavior: 'smooth' });
      }
    }
  }
</script>

</body>
</html>
