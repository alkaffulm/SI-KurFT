<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="py-8 px-8">
        <div class="bg-white p-8 rounded-2xl shadow-lg mb-8">
            <h1 class="text-3xl font-bold text-teks-biru-custom mb-4">Visi Keilmuan Program Studi</h1>
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">Visi Keilmuan</h2>
                <!-- <p class="text-gray-700">Menjadi program studi yang unggul dalam bidang teknologi informasi dan komunikasi, berkontribusi pada pengembangan ilmu pengetahuan, teknologi, dan seni yang berlandaskan nilai-nilai keislaman serta mendukung pembangunan nasional.</p> -->
                @if($visi)
                    @foreach($visi as $vk)
                        <p class="text-gray-700">{{ $vk->desc_vk_id }}</p>
                    @endforeach
                @else
                    <p class="text-gray-500 italic">Visi keilmuan untuk program studi dan kurikulum ini belum diatur.</p>
                @endif
            </div>

            <div class="flex justify-between items-center mb-4">
                <div class="space-x-2">
                    {{-- <a href="{{ route('visi-keilmuan.edit') }}" class="inline-flex items-center gap-x-2 px-4 py-2 bg-biru-custom text-white rounded-lg hover:opacity-90 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Edit Visi Keilmuan
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
