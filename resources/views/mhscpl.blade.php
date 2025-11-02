<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capaian Pembelajaran Lulusan (CPL) Mahasiswa</title>
    @vite('resources/css/app.css')
    @livewireStyles
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body class="bg-gray-100 font-sans">

    @include('layouts.navbar', ['userRole' => $userRole ?? null])
    @include('layouts.sidebar', ['userRole' => $userRole ?? null])

    <div class="py-8 px-16 sm:ml-64">
        <main class="mt-16">
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li><span class="text-sm text-gray-500">Laporan</span></li>
                    <li><span class="text-sm font-medium text-gray-900">Laporan CPL Mahasiswa</span></li>
                </ol>
            </nav>

            <div class="bg-white p-8 rounded-lg shadow-md mb-8">
                <h1 class="text-3xl font-bold text-teks-biru-custom mb-6">CAPAIAN PEMBELAJARAN LULUSAN (CPL) MAHASISWA</h1>

                {{-- panggil komponen livewire utama --}}
                @livewire('laporan-cpl-mahasiswa')
            </div>

            {{-- grafik (akan diupdate oleh event dari Livewire) --}}
            <div class="mt-8 flex gap-4">
                <div class="flex-1 bg-white rounded-lg shadow p-4">
                    <h3 class="font-semibold mb-3">Grafik Bar: % Ketercapaian CPL</h3>
                    <div id="chartBar"></div>
                </div>

                <div class="flex-1 bg-white rounded-lg shadow p-4">
                    <h3 class="font-semibold mb-3">Grafik Radar: % Ketercapaian CPL</h3>
                    <div id="chartRadar"></div>
                </div>
            </div>
        </main>
    </div>

    @livewireScripts

    <script>
        let barChart = null;
        let radarChart = null;
        
        function renderCharts(labels = [], data = []) {
            const barOptions = {
                chart: { type: 'bar', height: 350 },
                series: [{ name: '% Ketercapaian', data: data }],
                xaxis: { categories: labels },
                plotOptions: { bar: { horizontal: true } },
                yaxis: { min: 0, max: 100 }
            };
            
            const radarOptions = {
                chart: { type: 'radar', height: 350 },
                series: [{ name: '% Ketercapaian', data: data }],
                xaxis: { categories: labels },
                yaxis: { min: 0, max: 100 }
            };
            
            if (barChart) {
                barChart.updateOptions(barOptions);
                barChart.updateSeries([{ data: data }]);
            } else {
                barChart = new ApexCharts(document.querySelector("#chartBar"), barOptions);
                barChart.render();
            }
            
            if (radarChart) {
                radarChart.updateOptions(radarOptions);
                radarChart.updateSeries([{ data: data }]);
            } else {
                radarChart = new ApexCharts(document.querySelector("#chartRadar"), radarOptions);
                radarChart.render();
            }
        }
        
        // Livewire v3 menggunakan 'livewire:' prefix untuk custom events
        document.addEventListener('livewire:init', () => {
            Livewire.on('laporanCplUpdated', (event) => {
                // event adalah object pertama yang dikirim
                const labels = event.labels || [];
                const data = event.data || [];
                renderCharts(labels, data);
            });
        });
        
        // Initial empty charts
        renderCharts(
            ['CPL-1','CPL-2','CPL-3','CPL-4','CPL-5','CPL-6','CPL-7','CPL-8'], 
            [0,0,0,0,0,0,0,0]
        );
    </script>
</body>
</html>
