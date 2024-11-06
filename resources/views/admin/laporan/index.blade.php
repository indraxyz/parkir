@extends('admin.layout') @section('title') Kelola Parkir Keluar @endsection
@section('content')
<h2 class="text-2xl mb-3">Kelola Laporan Parkir</h2>

<div class="flex items-center justify-between mb-5 mt-5">
    <form
        action="{{ url('admin/laporan-filter') }}"
        method="post"
        class="w-full flex flex-wrap"
    >
        @csrf
        <div class="w-1/4 mr-2">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                Plat Nomor
              </label>
            <input
                class=" shadow appearance-none border rounded w-full  py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                type="text"
                placeholder="Plat Nomor"
                name="key"
                value="{{$key}}"
            />
        </div>
        
        <div class="w-1/4 mx-2">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                Tgl. Awal
              </label>
            <input
                class=" shadow appearance-none border rounded w-full  py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                type="date"
                placeholder="awal"
                name="awal"
                value="{{$awal}}"
            />
        </div>
        
        <div class="w-1/4 mx-2">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                Tgl Akhir
              </label>
            <input
                class=" shadow appearance-none border rounded w-full  py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                type="date"
                placeholder="awal"
                name="akhir"
                value="{{$akhir}}"
            />
        </div>
        <div>
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                Save
            </label>
            <button type="submit" class="bg-gray-200 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-md inline-flex items-center">
                <svg viewBox="0 0 20 20" fill="currentColor" 
                    class="filter w-6 h-6 text-indigo-500 cursor-pointer hover:text-indigo-600"><path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        
    </form>

    <div class="flex items-center pt-6">
        {{-- <a href="{{ url('admin/master/laporan-filter') }}" class="">
            
        </a> --}}
        <a href="{{ url('admin/laporan-cetak/'.$awal.'/'.$akhir.'/'.$key) }}" target="_blank" class="">
            <svg
                viewBox="0 0 20 20"
                fill="currentColor"
                class="printer w-6 h-6 mx-2 text-indigo-500 cursor-pointer hover:text-indigo-600"
            >
                <path
                    fill-rule="evenodd"
                    d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z"
                    clip-rule="evenodd"
                ></path>
            </svg>
        </a>
    </div>
</div>
<table class="table-auto w-full mb-5">
    <thead>
        <tr>
            <th class="px-4 py-2 w-10">No.</th>
            <th class="px-4 py-2">Waktu</th>
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
                <td class="border px-4 py-2">{{$data->waktu_keluar}}</td>
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

<h2>Total Pemasukan : {{$total}}</h2>

{{-- <a href="{{ url('#') }}">
    <svg
        viewBox="0 0 20 20"
        fill="currentColor"
        class="cloud-download w-6 h-6 mx-2 text-indigo-500 cursor-pointer hover:text-indigo-600"
    >
        <path
            fill-rule="evenodd"
            d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z"
            clip-rule="evenodd"
        ></path>
    </svg> 
</a> --}}

@endsection
