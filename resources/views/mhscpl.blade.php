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
<body>

    @include('layouts.navbar', ['userRole' => $userRole])

    @include('layouts.sidebar', ['userRole' => $userRole])

    <div class="  ml-72 mx-8 mt-24">
        
        <h1 class="text-xl font-bold text-gray-800 mb-6">
            CAPAIAN PEMBELAJARAN LULUSAN (CPL) MAHASISWA
        </h1>
       
        <div class="flex gap-8">
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

        <br>

        <h2 class="text-lg font-semibold text-gray-800 mb-4">Tabel Laporan CPL Mahasiswa</h2>

                <div class>
                    <table  cellpadding="5" > 
                        <tr >
                            <th class="border-2">Kode CPL</th>
                            <th class="border-2">Deskripsi CPL</th>
                            <th class="border-2">%CPL</th>
                            <th class="border-2">%CPL Mahasiswa</th>
                            <th class="border-2">%Ketercapaian</th>

                        </tr>
                            @for ($i = 1 ; $i <= 8 ;$i++)
                                <tr >
                                    <td class="border-2">CPL-{{$i}}</td>
                                    <td class="border-2">Mampu menunjukkan sikap dan karakter yang mencerminkan: ketakwaan kepada Tuhan Yang Maha Esa, etika dan integritas, berbudi pekerti luhur, peka
    dan peduli terhadap masalah sosial dan lingkungan, menghargai perbedaan
    budaya dan kemajemukan, menjunjung tinggi penegakan hukum,
    mendahulukan kepentingan bangsa dan masyarakat luas, melalui kreativitas
    dan inovasi, ekselensi, kepemimpinan yang kuat, sinergi, dan potensi lain yang
    dimiliki untuk mencapai hasil yang maksimal.</td>
                                    <td class="border-2">8.59</td>
                                    <td class="border-2">6.59</td>
                                    <td class="border-2">76.72</td>
                                </tr>         
                            @endfor

                    </table>
                </div>

        <div class="mt-8  flex justify-around px-4">
            <div class="h-80">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Grafik Radar</h3>
                <canvas id="Radar"></canvas>
            </div>
            <div class="h-80">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Grafik Bar</h3>
                <canvas id="Bar"></canvas>
            </div>
        </div>

        <br>

        {{-- <div class="mt-8  flex justify-around px-4">
            <div class="h-80">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Grafik Radar</h3>
                <div id="chart"></div>
            </div>
            <div class="h-80">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Grafik Bar</h3>
                <div id="radar"></div>
            </div>
        </div> --}}

    </div>

    <script>
        const ctx = document.getElementById('Bar');

        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: ['CPL-1', 'CPL-2', 'CPL-3', 'CPL-4', 'CPL-5', 'CPL-6', 'CPL-7', 'CPL-8'],
            datasets: [{
                label: 'CPL Mahasiswa',
                data: [12.3, 5.6, 13.2, 15.9, 19.7, 8.9, 17.7, 11.2],
                borderWidth: 1
            }]
            },
            options: {
                indexAxis: 'y',
                maintainAspectRatio: false,
                scales: {
                    x: {
                    beginAtZero: true
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
                data: [12.3, 5.6, 13.2, 15.9, 19.7, 8.9, 17.7, 11.2],
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
            }

        });
    </script>

    {{-- <script>
        var options1 = {
                chart: {
                    type: 'bar'
                },
                plotOptions: {
                    bar: {
                    horizontal: true
                    }
                },
                series: [{
                    data: [{
                    x: 'category A',
                    y: 10
                    }, {
                    x: 'category B',
                    y: 18
                    }, {
                    x: 'category C',
                    y: 13
                    }]
                }]
            }

        var options2 = {
                chart: {
                    type: 'radar'
                },
                series: [{
                    name: 'sales',
                    data: [30,40,35,50,49,60,70,91,125]
                }],
                xaxis: {
                    categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
                }
            }

        var chart = new ApexCharts(document.querySelector("#chart"), options1);
        var radar = new ApexCharts(document.querySelector("#radar"), options2);

        chart.render();
        radar.render();
    </script> --}}
</body>
</html>