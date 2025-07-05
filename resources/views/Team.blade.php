<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Team Departments</title>

  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endif

  <!-- Alpine.js -->
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

  <style>
    html, body {
      overflow-x: hidden;
      width: 100%;
    }

    [x-cloak] {
      display: none !important;
    }
  </style>
</head>
<body>

  <!-- ✅ Header component -->
  <x-header />

  <!-- Hero Section -->
  <div class="relative h-[300px] w-full">
    <img src="https://images.unsplash.com/photo-1522252234503-e356532cafd5?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
         alt="Background Image" class="object-cover object-center w-full h-full" />
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center">
      <h1 class="text-4xl text-white font-bold">Team Departments</h1>
    </div>
  </div>

  <!-- Main Content -->
  <div x-data="{ page: 'structural' }" class="min-h-screen bg-white py-12 px-4 sm:px-6">

    <!-- Title -->
    <div class="max-w-7xl mx-auto text-center mb-10">
      <h2 class="text-3xl font-bold text-gray-800">Engineering Departments</h2>
      <p class="text-gray-500 mt-2">Click on a department to view more details.</p>
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-10 max-w-7xl mx-auto">
      <template x-for="(item, index) in [
        { id: 'structural', icon: '🏗️', title: 'Structural Department', desc: '', color: 'text-indigo-500' },
        { id: 'architectural', icon: '🏛️', title: 'Architectural Department', desc: '', color: 'text-green-500' },
        { id: 'electrical', icon: '⚡', title: 'Electrical Department', desc: '', color: 'text-yellow-500' },
        { id: 'mechanical', icon: '🔧', title: 'Mechanical Department', desc: '', color: 'text-blue-500' },
        { id: 'bim', icon: '🧱', title: 'BIM Department', desc: '', color: 'text-red-500' }
      ]" :key="index">
        <button
          @click="page = item.id"
          class="bg-white w-full p-6 rounded-2xl shadow hover:shadow-xl transform hover:scale-105 transition duration-300 focus:outline-none"
        >
          <div :class="item.color + ' text-4xl mb-3'" x-text="item.icon"></div>
          <h3 class="text-xl font-semibold text-gray-800 mb-2" x-text="item.title"></h3>
          <p class="text-gray-500 text-sm" x-text="item.desc"></p>
        </button>
      </template>
    </div>

    <!-- Department Details -->
    <div class="space-y-12 max-w-7xl mx-auto">

      <!-- Structural -->
      <div
        x-show="page === 'structural'"
        x-transition
        x-cloak
        class="bg-white p-6 md:p-10 rounded-xl "
      >
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Structural Department</h2>
        <p class="text-gray-600 mb-4">
          1- The Structural Department in our engineering company plays a
vital role in project execution. We meticulously study and review
contract documents to ensure there are no conflicts, omissions,
or technical issues before commencing any project work.
        </p>
        <p class="text-gray-600">
          2- This department consists of a Head of Department and a team of
12 civil engineers, all of whom bring expertise and
professionalism to the table. Our focus is on ensuring the quality
of work and meeting the required standards. We strive for
excellence and innovation in our approach, working
collaboratively with other departments to ensure the success of
every project.
        </p>

        <!-- Images -->
        <div class="mt-8 space-y-8">
          @php
            $images = [
              ['Structural_Services1.png', 'Structural_Services2.png'],
              ['Structural_Services3.png', 'Structural_Services4.png'],
              ['Structural_Services5.png', 'Structural_Services6.png'],
              ['Structural_Services7.png', 'Structural_Services8.png'],
            ];
          @endphp

          @foreach ($images as $pair)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              @foreach ($pair as $image)
                <div class="aspect-[4/3] bg-white flex items-center justify-center rounded-lg shadow-md">
                  <img src="{{ asset('images2/' . $image) }}"
                       alt="Service Image"
                       class="w-full h-full object-contain" />
                </div>
              @endforeach
            </div>
          @endforeach
        </div>
      </div>

      <!-- Architectural -->
      <div
        x-show="page === 'architectural'"
        x-transition
        x-cloak
        class="bg-white p-8 rounded-xl"
      >
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Architectural Department</h2>
        <p class="text-gray-600 mb-4">
          1- The Architectural Department in our engineering company is dedicated to transforming visions into
reality. Our team of skilled architects and designers collaborates closely with clients to understand their
needs and aspirations, producing innovative and functional designs that enhance the built environment.
        </p>
        <p class="text-gray-600">
          2- We prioritize creativity, sustainability, and aesthetics in every project. From conceptual sketches to
detailed architectural plans, we ensure that our designs not only meet functional requirements but also
reflect the unique identity of each client
        </p>

        <p class="text-gray-600">
          3- With a comprehensive understanding of building regulations and industry standards, our department is
committed to delivering high-quality architectural solutions that stand the test of time. We believe in
fostering strong relationships with our clients and stakeholders, guiding them through every phase of the
design process to achieve outstanding results.
        </p>

        <p class="text-gray-600">
          4- This department consists of a Head of Department and a team of 15 Architect engineers, all of whom
bring expertise and professionalism to the table. Our focus is on ensuring the quality of work and meeting
the required standards. We strive for excellence and innovation in our approach, working collaboratively
with other departments to ensure the success of every project.
        </p>
        <div class="mt-8 space-y-8">
          @php
            $images = [
              ['Architectural_Services1.png', 'Architectural_Services2.png'],
            ];
          @endphp

          @foreach ($images as $pair)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              @foreach ($pair as $image)
                <div class="aspect-[4/3] bg-white flex items-center justify-center rounded-lg shadow-md">
                  <img src="{{ asset('images2/' . $image) }}"
                       alt="Service Image"
                       class="w-full h-full object-contain" />
                </div>
              @endforeach
            </div>
          @endforeach
        </div>
      </div>

      <!-- Electrical -->
      <div
        x-show="page === 'electrical'"
        x-transition
        x-cloak
        class="bg-white p-8 rounded-xl"
      >
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Electrical Department</h2>
        <p class="text-gray-600">
          1- Our engineering company's Electrical Department excels in delivering high- quality services in the
field of electrical design and implementation. With a dedicated team of skilled professionals, we
specialize in reviewing designs to ensure they meet industry standards and client specifications
        </p> <br>
        <p class="text-gray-600">
          2- Our team focuses on creating detailed Shop drawings plans that facilitate smooth project progression,
guaranteeing that all aspects of the electrical systems are meticulously planned and executed. We
perform thorough calculations and analyses to ensure that designs are not only functional but also
efficient, ultimately maximizing the performance of the electrical systems
        </p> <br>
                <p class="text-gray-600">
          3- With a commitment to innovation and excellence, our Electrical Department plays a crucial role in the
successful design and execution of projects, ensuring reliability and sustainability in every solution we
provide.
        </p> <br>
                <p class="text-gray-600">
          4- This department consists of a Head of Department and a team of 12 Electrical engineers, all of whom bring expertise and professionalism to the table. Our
focus is on ensuring the quality of work and meeting the required standards. We strive for excellence and innovation in our approach, working collaboratively
with other departments to ensure the success of every project.

        </p>
        <div class="mt-8 space-y-8">
          @php
            $images = [
              ['Electrical_Services1.png', 'Electrical_Services2.png'],
            ];
          @endphp

          @foreach ($images as $pair)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              @foreach ($pair as $image)
                <div class="aspect-[4/3] bg-white flex items-center justify-center rounded-lg shadow-md">
                  <img src="{{ asset('images2/' . $image) }}"
                       alt="Service Image"
                       class="w-full h-full object-contain" />
                </div>
              @endforeach
            </div>
          @endforeach
        </div>
      </div>

      <!-- Mechanical -->
      <div
        x-show="page === 'mechanical'"
        x-transition
        x-cloak
        class="bg-white p-8 rounded-xl"
      >
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Mechanical Department</h2>
        <p class="text-gray-600 mb-4">
          1- At our engineering company, the Mechanical Department is dedicated to providing exceptional services in mechanical design and
implementation. Our team of experienced engineers is proficient in reviewing designs to ensure compliance with industry standards
and client requirements
        </p>
        <p class="text-gray-600">
          2- We specialize in developing comprehensive execution plans to streamline
project workflows, ensuring that every detail of the mechanical systems is
thoroughly addressed and implemented.
        </p>
        <p class="text-gray-600 mb-4">
          3- Our experts conduct precise calculations and simulations to validate
designs, guaranteeing that we achieve optimal efficiency and functionality in
all mechanical systems. With a strong focus on innovation and quality,
        </p>
        <p class="text-gray-600">
          4- Our Mechanical Department is integral to the successful design and execution
of projects, delivering solutions that enhance performance and sustainability.
        </p> <br>
        <p class="text-gray-600">
          5- This department consists of a Head of Department and a team of 12 Mechanical engineers, all of whom bring expertise and
professionalism to the table. Our focus is on ensuring the quality of work and meeting the required standards. We strive for excellence
and innovation in our approach, working collaboratively with other departments to ensure the success of every project.
        </p>
        <div class="mt-8 space-y-8">
          @php
            $images = [
              ['Mechanical_Department2.png', 'Mechanical_Department3.png'],

            ];
          @endphp

          @foreach ($images as $pair)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              @foreach ($pair as $image)
                <div class="aspect-[4/3] bg-white flex items-center justify-center rounded-lg shadow-md">
                  <img src="{{ asset('images2/' . $image) }}"
                       alt="Service Image"
                       class="w-full h-full object-contain" />
                </div>
              @endforeach
            </div>
          @endforeach
        </div>
      </div>

      <!-- BIM -->
      <div
        x-show="page === 'bim'"
        x-transition
        x-cloak
        class="bg-white p-8 rounded-xl"
      >
        <h2 class="text-2xl font-bold text-gray-800 mb-4">BIM Department</h2>
        <p class="text-gray-600">
          1- Our engineering company’s Building Information Management (BIM) Department is
at the forefront of delivering comprehensive BIM services tailored to our clients’
needs. We excel at analyzing owner requirements to develop effective BIM Execution
Plans that align with project objectives.
        </p> <br>
        <p class="text-gray-600">
          2- Our skilled team leads the implementation of these plans, ensuring that all processes
are carried out efficiently and effectively. We focus on producing high-quality models
that are free from Clashes and deficiencies, enhancing collaboration and reducing risks
throughout the project lifecycle.
        </p> <br>
        <p class="text-gray-600">
          3- With a commitment to excellence and innovation, our BIM Department plays a vital role
in optimizing project outcomes, ensuring seamless integration across all disciplines, and
ultimately delivering successful and sustainable solutions.
        </p> <br>
        <p class="text-gray-600">
          4- This department consists of a Head of Department and a team of 5 BIM Coordinator, all of whom bring expertise and professionalism to the
table. Our focus is on ensuring the quality of work and meeting the required standards. We strive for excellence and innovation in our
approach, working collaboratively with other departments to ensure the success of every project.
        </p>



        <div class="mt-8 space-y-8">
          @php
            $images = [
              ['BIM_Department1.png', 'BIM_Department2.png'],

            ];
          @endphp

          @foreach ($images as $pair)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              @foreach ($pair as $image)
                <div class="aspect-[4/3] bg-white flex items-center justify-center rounded-lg shadow-md">
                  <img src="{{ asset('images2/' . $image) }}"
                       alt="Service Image"
                       class="w-full h-full object-contain" />
                </div>
              @endforeach
            </div>
          @endforeach
        </div>
      </div>

    </div>
  </div>




</div>

</body>
</html>
