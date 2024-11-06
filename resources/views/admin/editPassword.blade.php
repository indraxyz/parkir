@extends('admin.layout') @section('title') Edit Password @endsection
@section('content')

<div class="w-full max-w-xl mx-auto mt-20">
    <form
        action="{{ url('admin/akun-updatepassword') }}"
        method="post"
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    >
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}" />
        <input type="hidden" name="username" value="{{$data->username}}" />

        <h1 class="text-2xl mb-5 mt-8">Edit Password</h1>
        <!-- <h3 class="mb-5 mt-8">ADMIN PANEL</h3> -->

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Password Lama
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                type="text"
                name="password_lama"
            />
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Password Baru
            </label>
            <input
                class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                type="password"
                name="password_baru"
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
