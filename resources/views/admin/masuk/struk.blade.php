@extends('admin.layout') @section('title') Struk - Parkir Masuk @endsection
@section('content')
<div class="w-full max-w-xl mx-auto mt-20">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h1 class="text-1xl mb-0 mt-8 text-indigo-700">iParkir</h1>
        <h1 class="text-2xl mb-5 mt-0">Parkir Masuk</h1>
        <!-- <h3 class="mb-5 mt-8">ADMIN PANEL</h3> -->

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
        <div class="mb-6">
            <label class="block text-gray-700 text-lg font-bold mb-2">
                Masuk
            </label>
            <label class="block text-gray-700 text-md mb-2">
                {{$data->waktu_masuk}}
            </label>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-bold mb-2">
                Petugas
            </label>
            <label class="block text-gray-700 text-md mb-2">
                {{$data->petugas->nama}}
            </label>
        </div>

        <div class="flex items-center">
            <a href="{{ url('admin/parkir/kelola-masuk') }}">
                <svg viewBox="0 0 20 20" fill="currentColor" class="menu-alt2 w-10 h-10 shadow-md p-2 rounded-full mx-2 text-indigo-500 cursor-pointer hover:text-indigo-600"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                
            </a>

            <a href="{{ url('admin/parkir/masuk-cetak/'.$data->id) }}">
                <svg viewBox="0 0 20 20" fill="currentColor" class="printer w-10 h-10 shadow-md p-2 rounded-full mx-2 text-indigo-500 cursor-pointer hover:text-indigo-600"><path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd"></path></svg>
                
            </a>
        </div>
    </div>
</div>
@endsection
