<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Struk</title>

    {{-- style --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>
<body>
    
    <div class="w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mx-auto">
        <h1 class="text-xl mb-5 mt-2 text-indigo-700">iParkir</h1>
        <h1 class="text-xl mb-0 mt-0">Struk Parkir</h1>

        <div class="flex">
            <div class="w-1/2 ">
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2">
                        Nota
                    </label>
                    <label class="block text-gray-700 text-md mb-2">
                        {{$data->nota}}
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2">
                        Plat Nomor
                    </label>
                    <label class="block text-gray-700 text-md mb-2">
                        {{$data->plat_nomor}}
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2">
                        Lokasi
                    </label>
                    <label class="block text-gray-700 text-md mb-2">
                        {{$data->lokasi->lantai->nama.'/'.$data->lokasi->blok->nama.'/'.$data->lokasi->nomor}}
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2">
                        Masuk
                    </label>
                    <label class="block text-gray-700 text-md mb-2">
                        {{$data->waktu_masuk}}
                    </label>
                </div>
            </div>
            <div class="w-1/2 ">
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2">
                        Petugas - Parkir Masuk 
                    </label>
                    <label class="block text-gray-700 text-md mb-2">
                        {{$data->petugas->nama}}
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2">
                        Petugas - Parkir Keluar 
                    </label>
                    <label class="block text-gray-700 text-md mb-2">
                        {{$data->petugasKeluar->nama}}
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2">
                        Durasi
                    </label>
                    <label class="block text-gray-700 text-md mb-2">
                        {{$data->durasi}}
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2">
                        keluar
                    </label>
                    <label class="block text-gray-700 text-md mb-2">
                        {{$data->waktu_keluar}}
                    </label>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2">
                        Biaya
                    </label>
                    <label class="block text-gray-700 text-md mb-2">
                        {{$data->biaya}}
                    </label>
                </div>
        
                
            </div>
          </div>
    </div>

    {{-- JS --}}
    <script>
        window.print();
    </script>
</body>
</html>