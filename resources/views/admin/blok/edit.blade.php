@extends('admin.layout') @section('title') Edit Blok @endsection
@section('content')

<div class="w-full max-w-xl mx-auto mt-20">
    <form
        action="{{ url('admin/master/blok-update') }}"
        method="post"
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    >
        @csrf
        <input type="hidden" name="id" value="{{$blok->id}}" />

        <h1 class="text-2xl mb-5 mt-8">Edit blok</h1>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Nama
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                type="text"
                name="nama"
                value="{{$blok->nama}}"
            />
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Keterangan
            </label>
            <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none"
                type="text"
                rows="5"
                name="keterangan"
                >{{$blok->keterangan}}</textarea
            >
        </div>
        <div class="flex items-center justify-between">
            <button
                class="w-full bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
                type="submit"
            >
                Update
            </button>
        </div>
    </form>
</div>
@endsection
