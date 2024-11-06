@extends('admin.layout') @section('title') Struk - Parkir Keluar @endsection
@section('content')
<div class="w-full max-w-xl mx-auto mt-20">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h1 class="text-1xl mb-0 mt-8 text-indigo-700">iParkir</h1>
        <h1 class="text-2xl mb-5 mt-0">Parkir Keluar</h1>
        <!-- <h3 class="mb-5 mt-8">ADMIN PANEL</h3> -->

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

        <div class="flex items-center">
            <a href="{{ url('admin/parkir/kelola-keluar') }}">
                <svg viewBox="0 0 20 20" fill="currentColor" class="menu-alt2 w-10 h-10 shadow-md p-2 rounded-full mx-2 text-indigo-500 cursor-pointer hover:text-indigo-600"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    <title>Parkir Keluar</title>
                </svg>
                
            </a>

            
            @if ($data->status == 1) 
                <a href="{{ url('admin/parkir/keluar-bayar/'.$data->id) }}">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="badge-check w-10 h-10 shadow-md p-2 rounded-full mx-2 text-indigo-500 cursor-pointer hover:text-indigo-600"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        <title>Bayar</title>
                    </svg>  
                </a>
            @elseif ($data->status == 2)
            <a href="{{ url('admin/parkir/keluar-cetak/'.$data->id) }}" target="_blank">
                <svg viewBox="0 0 20 20" fill="currentColor" class="printer w-10 h-10 shadow-md p-2 rounded-full mx-2 text-indigo-500 cursor-pointer hover:text-indigo-600"><path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd"></path></svg>
                
            </a>
            @endif
            
        </div>
    </div>
</div>
@endsection
