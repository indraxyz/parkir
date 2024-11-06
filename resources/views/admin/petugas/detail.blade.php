@extends('admin.layout') @section('title') Detail Pengguna @endsection
@section('content')
<div class="w-full max-w-xl mx-auto mt-20">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h1 class="text-2xl mb-5 mt-8">Detail Pengguna</h1>
        <!-- <h3 class="mb-5 mt-8">ADMIN PANEL</h3> -->

        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-bold mb-2">
                Username
            </label>
            <label class="block text-gray-700 text-md mb-2">
                {{$data->username}}
            </label>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-bold mb-2">
                Akses
            </label>
            <label class="block text-gray-700 text-md mb-2">
                @switch($data->akses) 
                    @case('0') Master @break 
                    @case('1') Admin @break
                    @case('2') Pimpinan @break
                    @default Data Salah
                @endswitch 
            </label>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-bold mb-2">
                Nama
            </label>
            <label class="block text-gray-700 text-md mb-2">
                {{$data->nama}}
            </label>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-bold mb-2">
                Mail
            </label>
            <label class="block text-gray-700 text-md mb-2">
                {{$data->mail}}
            </label>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-lg font-bold mb-2">
                Tlp
            </label>
            <label class="block text-gray-700 text-md mb-2">
                {{$data->tlp}}
            </label>
        </div>
    </div>
</div>
@endsection
