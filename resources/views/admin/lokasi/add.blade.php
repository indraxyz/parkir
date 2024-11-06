@extends('admin.layout') @section('title') Tambah Lokasi @endsection
@section('content')

<div class="w-full max-w-xl mx-auto mt-20">
    <form
        action="{{ url('admin/master/lokasi-simpan') }}"
        method="post"
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    >
        @csrf

        <h1 class="text-2xl mb-5 mt-8">Tambah Lokasi</h1>
        <!-- <h3 class="mb-5 mt-8">ADMIN PANEL</h3> -->

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Lantai
            </label>
            <select
                name="id_lantai"
                class="shadow  border rounded  focus:outline-none w-full py-2 px-3 text-gray-700 leading-tight"
            >
                @foreach ($lantai as $lt)
                    <option value="{{$lt->id}}">{{$lt->nama}}</option>
                @endforeach
                
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Blok
            </label>
            <select
                name="id_blok"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
            >
                @foreach ($blok as $bl)
                    <option value="{{$bl->id}}">{{$bl->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Nomor
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                type="text"
                name="nomor"
            />
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Status
            </label>
            <select
                name="status"
                class="shadow  border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
            >
                <option value="0">Tersedia</option>
                <option value="1">Terisi</option>
            </select>
        </div>

        <div class="flex items-center justify-between">
            <button
                class="w-full bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
                type="submit"
            >
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
