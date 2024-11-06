<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan</title>

    {{-- style --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>
<body>
    
    <div class="w-full bg-white shadow-md rounded px-3 pt-6 pb-8 mx-auto">
        <h1 class="text-xl mb-0 mt-2 text-indigo-700">iParkir</h1>
        <h1 class="text-xl mb-5 mt-0">Laporan Pemasukan</h1>

        <div class="flex">
            <div class="w-full flex flex-wrap ">
                <div class="w-1/3">
                    <label class="block text-gray-700 text-lg font-bold mb-2">
                        Tgl Awal
                    </label>
                    <label class="block text-gray-700 text-md mb-2">
                        {{$awal}}
                    </label>
                </div>
                <div class="w-1/3">
                    <label class="block text-gray-700 text-lg font-bold mb-2">
                        Tgl Akhir
                    </label>
                    <label class="block text-gray-700 text-md mb-2">
                        {{$akhir}}
                    </label>
                </div>
                <div class="w-1/3">
                    <label class="block text-gray-700 text-lg font-bold mb-2">
                        Total
                    </label>
                    <label class="block text-gray-700 text-md mb-2">
                        {{$total}}
                    </label>
                </div>
                {{-- TABEL --}}


            </div>
        </div>

        <table class="table-auto w-full mb-5">
            <thead>
                <tr>
                    <th class="px-4 py-2 w-10">No.</th>
                    <th class="px-4 py-2">Nota</th>
                    <th class="px-4 py-2">Plat Nomor</th>
                    <th class="px-4 py-2">Lokasi</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Biaya</th>
                </tr>
            </thead>
            <tbody>
        
                @foreach ($datas as $data)
                    <tr>
                        <td class="border px-4 py-2">{{$loop->iteration}}</td>
                        <td class="border px-4 py-2">{{$data->nota}}</td>
                        <td class="border px-4 py-2">{{$data->plat_nomor}}</td>
                        <td class="border px-4 py-2">{{$data->lokasi->lantai->nama.'/'.$data->lokasi->blok->nama.'/'.$data->lokasi->nomor}}</td>
                        <td class="border px-4 py-2">
                            @switch($data->status)
                                @case('0') 
                                    Masuk
                                    @break 
                                @case('1')
                                    Keluar
                                    @break 
                                @case('2')
                                    Terbayar
                                    @break 
                                @default Data Salah 
                            @endswitch
                        </td>
                        <td class="border px-4 py-2">{{$data->biaya}}</td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

    {{-- JS --}}
    <script>
        window.print();
    </script>
</body>
</html>