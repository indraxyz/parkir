@extends('admin.layout') @section('title') Edit Parkir - Masuk @endsection
@section('content')

@php
    $user = json_decode(Session::get('user'));
@endphp

<div class="w-full max-w-xl mx-auto mt-20">
    <form
        action="{{ url('admin/parkir/masuk-update') }}"
        method="post"
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    >
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}" />

        <h1 class="text-2xl mt-8">Edit - Parkir Masuk</h1>
        <h3 class="mb-5  text-indigo-700">admin : {{$user->nama}}</h3>


        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                PLAT NOMOR
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                type="text"
                name="plat_nomor"
                value="{{$data->plat_nomor}}"
            />
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
