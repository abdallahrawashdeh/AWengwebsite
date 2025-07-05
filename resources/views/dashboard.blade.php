<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container w-[85%] mr-[7.5%] ml-[7.5%] mt-5">
        <div class="flex flex-wrap gap-3">

            <div class="flex-1 min-w-[140px] max-w-[100%] bg-white text-black rounded shadow-lg shadow-[#e7bd62]">
                <div class="flex items-center px-3 py-1.5 font-semibold border-b border-[#e7bd62] text-sm">
                    <svg class="w-4 h-4 mr-1.5 text-[#e7bd62]" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 11c0 1.104-.896 2-2 2s-2-.896-2-2 .896-2 2-2 2 .896 2 2z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4.318 6.318A9 9 0 1119.682 17.682 9 9 0 014.318 6.318z"/>
                    </svg>
                    Total Careers
                </div>
                <div class="px-3 py-3 text-3xl font-bold">
                    {{ $careerTotal }}
                </div>
            </div>

            <div class="flex-1 min-w-[140px] max-w-[100%] bg-white text-black rounded shadow-lg shadow-[#e7bd62]">
                <div class="flex items-center px-3 py-1.5 font-semibold border-b border-[#e7bd62] text-sm">
                    <svg class="w-4 h-4 mr-1.5 text-[#e7bd62]" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19 11H5m14 0a2 2 0 110 4H5a2 2 0 110-4m14 0a2 2 0 110-4H5a2 2 0 110 4"/>
                    </svg>
                    Total News
                </div>
                <div class="px-3 py-3 text-3xl font-bold">
                    {{ $newsTotal }}
                </div>
            </div>

            <div class="flex-1 min-w-[140px] max-w-[100%] bg-white text-black rounded shadow-lg shadow-[#e7bd62]">
                <div class="flex items-center px-3 py-1.5 font-semibold border-b border-[#e7bd62] text-sm">
                    <svg class="w-4 h-4 mr-1.5 text-[#e7bd62]" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9.75 6.75h4.5M9 3h6a2.25 2.25 0 012.25 2.25v1.5a2.25 2.25 0 01-2.25 2.25H9a2.25 2.25 0 01-2.25-2.25v-1.5A2.25 2.25 0 019 3z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 21h18"/>
                    </svg>
                    Total Projects
                </div>
                <div class="px-3 py-3 text-3xl font-bold">
                    {{ $projectsTotal }}
                </div>
            </div>

            <div class="flex-1 min-w-[140px] max-w-[100%] bg-white text-black rounded shadow-lg shadow-[#e7bd62]">
                <div class="flex items-center px-3 py-1.5 font-semibold border-b border-[#e7bd62] text-sm">
                    <svg class="w-4 h-4 mr-1.5 text-[#e7bd62]" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12h6m-6 4h6M4 6h16M4 10h16M4 14h16M4 18h16"/>
                    </svg>
                    Total Service
                </div>
                <div class="px-3 py-3 text-3xl font-bold">
                    {{ $serviceTotal }}
                </div>
            </div>

        </div>
    </div>

    <div class="container mt-3 w-[85%] mr-[7.5%] ml-[7.5%]">
        <div class="flex flex-wrap gap-3">

            <div class="flex-1 min-w-[140px] max-w-[100%] bg-white text-black rounded shadow-lg shadow-[#e7bd62]">
                <div class="flex items-center px-3 py-1.5 font-semibold border-b border-[#e7bd62] text-sm">
                    <svg class="w-4 h-4 mr-1.5 text-[#e7bd62]" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19 11H5m14 0a2 2 0 110 4H5a2 2 0 110-4m14 0a2 2 0 110-4H5a2 2 0 110 4"/>
                    </svg>
                    Total Clients
                </div>
                <div class="px-3 py-3 text-3xl font-bold">
                    {{ $clientsTotal }}
                </div>
            </div>

        </div>
    </div>

    <form id="dateFilterForm" class="flex items-center gap-4 ml-[7.5%] mt-12">
        <label class="text-gray-800 dark:text-white">From:</label>
        <input type="date" name="from" id="fromDate" value="{{ $from ?? '' }}" class="rounded px-2 py-1 text-black">

        <label class="text-gray-800 dark:text-white">To:</label>
        <input type="date" name="to" id="toDate" value="{{ $to ?? '' }}" class="rounded px-2 py-1 text-black">

        <button type="submit" class="bg-[#e7bd62] text-white px-4 py-1 rounded hover:bg-[#e7bd62]">
            View
        </button>
    </form>

    <div class="flex flex-row">
        <div class="container mt-10 h-[400px] w-[30%] ml-[7.5%] bg-white dark:bg-gray-900  p-6  rounded shadow-lg shadow-[#e7bd62]">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Overview Donut Chart</h3>
            <div class="h-full w-full relative">
                <canvas id="overviewDonutChart" class="absolute top-0 left-0 w-full h-full"></canvas>
            </div>
        </div>

        <div class="container mt-10 ml-3 h-[400px] w-[54%]  bg-white dark:bg-gray-900  p-12 rounded shadow-lg shadow-[#e7bd62] ">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Overview Line Chart</h3>
            <div class="h-full w-full relative">
                <canvas id="overviewLineChart" class="absolute top-0 left-0 w-full h-full"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

    <script>
        // Setup initial charts data from filtered counts
        const labels = ['Careers', 'News', 'Projects', 'Service', 'Clients'];
        let dataValues = [
            {{ $careerCount }},
            {{ $newsCount }},
            {{ $projectsCount }},
            {{ $serviceCount }},
            {{ $clientsCount }}
        ];

        const donutCtx = document.getElementById('overviewDonutChart').getContext('2d');
        const lineCtx = document.getElementById('overviewLineChart').getContext('2d');

        // Donut Chart
        const overviewDonutChart = new Chart(donutCtx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: dataValues,
                    backgroundColor: ['#4F46E5', '#10B981', '#F59E0B', '#EF4444', '#3B82F6'],
                    borderColor: '#1F2937',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            color: document.documentElement.classList.contains('dark') ? 'white' : 'black'
                        }
                    },
                    datalabels: {
                        color: '#fff',
                        font: { weight: 'bold' },
                        formatter: (value, context) => {
                            const label = context.chart.data.labels[context.dataIndex];
                            return `${label}\n${value}`;
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });

        // Line Chart
        const overviewLineChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Count',
                    data: dataValues,
                    fill: false,
                    borderColor: '#3B82F6',
                    backgroundColor: '#3B82F6',
                    tension: 0.4,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#3B82F6',
                    pointRadius: 5,
                    pointHoverRadius: 7,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: document.documentElement.classList.contains('dark') ? 'white' : 'black'
                        },
                        grid: {
                            color: '#4B5563'
                        }
                    },
                    x: {
                        ticks: {
                            color: document.documentElement.classList.contains('dark') ? 'white' : 'black'
                        },
                        grid: {
                            color: '#4B5563'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: document.documentElement.classList.contains('dark') ? 'white' : 'black'
                        }
                    }
                }
            }
        });

        // Update charts on form submit with AJAX fetch
        document.getElementById('dateFilterForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const from = document.getElementById('fromDate').value;
            const to = document.getElementById('toDate').value;

            fetch(`?from=${from}&to=${to}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                const newValues = [
                    data.careerCount,
                    data.newsCount,
                    data.projectsCount,
                    data.serviceCount,
                    data.clientsCount
                ];

                overviewDonutChart.data.datasets[0].data = newValues;
                overviewDonutChart.update();

                overviewLineChart.data.datasets[0].data = newValues;
                overviewLineChart.update();
            });
        });
    </script>
</x-app-layout>
