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
    
    <div class="w-1/2 bg-white shadow-md rounded px-8 pt-6 pb-8 mx-auto">
        <h1 class="text-xl mb-5 mt-2 text-indigo-700">iParkir</h1>
        <h1 class="text-xl mb-0 mt-0">Parkir Masuk</h1>

        <div class="mb-2">
            <label class="block text-gray-700 text-md font-bold">
                Nota
            </label>
            <label class="block text-gray-700 text-sm">
                {{$data->nota}}
            </label>
        </div>
        <div class="mb-2">
            <label class="block text-gray-700 text-md font-bold ">
                Plat Nomor
            </label>
            <label class="block text-gray-700 text-sm ">
                {{$data->plat_nomor}}
            </label>
        </div>
        <div class="mb-2">
            <label class="block text-gray-700 text-md font-bold ">
                Lokasi
            </label>
            <label class="block text-gray-700 text-sm ">
                {{$data->lokasi->lantai->nama.'/'.$data->lokasi->blok->nama.'/'.$data->lokasi->nomor}}
            </label>
        </div>
        <div class="mb-2">
            <label class="block text-gray-700 text-md font-bold ">
                Masuk
            </label>
            <label class="block text-gray-700 text-sm ">
                {{$data->waktu_masuk}}
            </label>
        </div>
        <div class="mb-2">
            <label class="block text-gray-700 text-md font-bold ">
                Petugas
            </label>
            <label class="block text-gray-700 text-sm ">
                {{$data->petugas->nama}}
            </label>
        </div>
    </div>

    {{-- JS --}}
    <script>
        window.print();
    </script>
</body>
</html>