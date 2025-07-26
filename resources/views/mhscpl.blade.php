<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capaian Pembelajaran Lulusan (CPL) Mahasiswa</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

</head>
<body class="bg-gray-100 font-sans">

    @include('layouts.navbar', ['userRole' => $userRole])

    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="py-8 px-16 sm:ml-64">
                <main class="mt-16">
            {{-- Bagian CPL --}}
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Laporan</span>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-900 md:ms-2">Laporan CPL Mahasiswa</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="bg-white p-8 rounded-lg shadow-md mb-8">
                <h1 class="text-3xl font-bold text-teks-biru-custom mb-4">CAPAIAN PEMBELAJARAN LULUSAN (CPL) MAHASISWA</h1>

                <div class="flex gap-8 mb-8">
                    <div>
                        <label for="profil_lulusan">Angkatan:</label><br>
                        <input type="text" id="profil_lulusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required>
                    </div>

                    <div>
                        <label for="profil_lulusan">Nama:</label><br>
                        <input type="text" id="profil_lulusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required>
                    </div>

                    <div>
                        <label for="profil_lulusan">NIM:</label><br>
                        <input type="text" id="profil_lulusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2" required>
                    </div>
                </div>

                <h2 class="text-lg font-semibold text-gray-800 mb-4">Tabel Laporan CPL Mahasiswa</h2>

                <div>
                    <div class="overflow-x-auto rounded-lg border border-gray-400">
                        <table class="w-full text-sm text-center text-gray-500">
                            <thead class="text-white uppercase bg-teks-biru-custom">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Kode CPL</th>
                                    <th scope="col" class="px-6 py-4">Deskripsi CPL</th>
                                    <th scope="col" class="px-6 py-4">%CPL</th>
                                    <th scope="col" class="px-6 py-4">%CPL Mahasiswa</th>
                                    <th scope="col" class="px-6 py-4">%Ketercapaian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1 ; $i <= 8 ; $i++)
                                    <tr class="bg-white border-t border-gray-400">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap  border-gray-400">
                                            {{"CPL-".$i}}
                                        </th>
                                        <td class="px-6 py-4 text-justify border">
                                            Mampu menunjukkan sikap dan karakter yang mencerminkan: ketakwaan kepada Tuhan Yang Maha Esa, etika dan integritas, berbudi pekerti luhur, peka
                                                                dan peduli terhadap masalah sosial dan lingkungan, menghargai perbedaan
                                                                budaya dan kemajemukan, menjunjung tinggi penegakan hukum,
                                                                mendahulukan kepentingan bangsa dan masyarakat luas, melalui kreativitas
                                                                dan inovasi, ekselensi, kepemimpinan yang kuat, sinergi, dan potensi lain yang
                                                                dimiliki untuk mencapai hasil yang maksimal.
                                        </td>
                                        <td class="px-6 py-4 text-center border">
                                            8.59
                                        </td>
                                        <td class="px-6 py-4 text-center border">
                                            6.59
                                        </td>
                                        <td class="px-6 py-4 text-center ">
                                            76.72
                                        </td>
                                    </tr> 
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-8 flex border border-gray-400 rounded-lg  p-4">
                    <div class=" flex-1">
                        <div id="radar"></div>
                    </div>
                    <div class=" flex-1">
                        <div id="chart"></div>
                    </div>
                </div>
            </div>

        </main>
       

        {{-- <div class="mt-8  flex  px-4">
            <div class="h-96 flex-1">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Grafik Radar</h3>
                <canvas id="Radar"></canvas>
            </div>
            <div class="h-96 flex-1">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Grafik Bar</h3>
                <canvas id="Bar"></canvas>
            </div>
        </div> --}}




    </div>

    {{-- <script>
        const ctx = document.getElementById('Bar');

        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: ['CPL-1', 'CPL-2', 'CPL-3', 'CPL-4', 'CPL-5', 'CPL-6', 'CPL-7', 'CPL-8'],
            datasets: [{
                label: 'CPL Mahasiswa',
                data: [87.41, 62.19, 95.50, 73.08, 68.92, 99.76, 81.25, 76.47],
                borderWidth: 1
            }]
            },
            options: {
                indexAxis: 'y',
                maintainAspectRatio: false,
                scales: {
                    x: {
                    beginAtZero: true,
                    
                    }
                }
            }
        });

        const ctx2 = document.getElementById('Radar');

        new Chart(ctx2, {
            type: 'radar',
            data: {
            labels: ['CPL-1', 'CPL-2', 'CPL-3', 'CPL-4', 'CPL-5', 'CPL-6', 'CPL-7', 'CPL-8'],
            datasets: [{
                label: 'CPL Mahasiswa',
                data: [87.41, 62.19, 95.50, 73.08, 68.92, 99.76, 81.25, 76.47],
                fill: true,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            }]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    r: {
                        min: 0,
                        max: 100,
                        stepSize: 25,
                    }
                },
            }

        });
    </script> --}}

    <script>
        var options1 = {
                chart: {
                    type: 'bar'
                },
                plotOptions: {
                    bar: {
                        horizontal: true
                    }
                },
                title: {
                    text: "Capaian Pembelajaran Lulusan",
                    align: 'left',
                    margin: 10,
                    offsetX: 0,
                    offsetY: 20,
                    floating: false,
                    style: {
                        fontSize:  '18px',
                        fontWeight:  'bold',
                        fontFamily:  undefined,
                        color:  '#263238'
                    },
                },
                grid: {
                    show: true,
                    borderColor: '#e4ebf7',
                    strokeDashArray: 0,
                    position: 'back',
                    xaxis: {
                        lines: {
                            show: true
                        }
                    },   
                    yaxis: {
                        lines: {
                            show: true
                        }
                    },     
                },
                legend: {
                    show: true,
                    showForSingleSeries: true,
                },
                series: [{
                    name: '%Ketercapaian',
                    data: [87.41, 62.19, 95.50, 73.08, 68.92, 99.76, 81.25, 76.47]
                }],
                xaxis: {
                    categories: ['CPL-1', 'CPL-2', 'CPL-3', 'CPL-4', 'CPL-5', 'CPL-6', 'CPL-7', 'CPL-8'],
                        min: 0,
                    max: 100,
                    stepSize: 25    
                },

            }

        var options2 = {
                chart: {
                    type: 'radar',
                    height: '100%',
                },
                  plotOptions: {
                    radar: {
                    size: undefined,
                    offsetX: 0,
                    offsetY: 0,
                    polygons: {
                        strokeColors: '#87888a',
                        strokeWidth: 1,
                        connectorColors: '#d4d4d4',
                        fill: {
                        colors: undefined
                        }
                    }
                    }
                },
                legend: {
                    show: true,
                    showForSingleSeries: true,
                },
                series: [{
                    name: '%Ketercapaian',
                    data: [87.41, 62.19, 95.50, 73.08, 68.92, 99.76, 81.25, 76.47]
                }],
                xaxis: {
                    categories: ['CPL-1', 'CPL-2', 'CPL-3', 'CPL-4', 'CPL-5', 'CPL-6', 'CPL-7', 'CPL-8']
                },
                yaxis: {
                    min: 0,
                    max: 100,
                    stepSize: 25    
                }
            }

        var chart = new ApexCharts(document.querySelector("#chart"), options1);
        var radar = new ApexCharts(document.querySelector("#radar"), options2);

        chart.render();
        radar.render();
    </script>
</body>
</html>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="py-8 px-16 sm:ml-64">

    </div>
</body>