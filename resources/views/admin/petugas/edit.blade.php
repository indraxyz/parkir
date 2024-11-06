@extends('admin.layout') @section('title') Edit Pengguna @endsection
@section('content')

<div class="w-full max-w-xl mx-auto mt-20">
    <form
        action="{{ url('admin/master/petugas-update') }}"
        method="post"
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    >
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}" />

        <h1 class="text-2xl mb-5 mt-8">Edit Pengguna</h1>
        <!-- <h3 class="mb-5 mt-8">ADMIN PANEL</h3> -->

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Username
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                type="text"
                name="username"
                value="{{$data->username}}"
            />
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Password
            </label>
            <input
                class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                type="password"
                name="password"
                value="{{$data->password}}"
            />
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Akses
            </label>
            <select
                name="akses"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                value="{{$data->akses}}"
            > 
                <option value="" {{ $data->akses == '' ? 'selected' : ''}}>-</option>
                <option value="0" {{ $data->akses == '0' ? 'selected' : ''}}>Master</option>
                <option value="1" {{ $data->akses == '1' ? 'selected' : ''}}>Admin</option>
                <option value="2" {{ $data->akses == '2' ? 'selected' : ''}}>Pimpinan</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Nama Lengkap
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                type="text"
                name="nama"
                value="{{$data->nama}}"
            />
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Mail
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                type="text"
                name="mail"
                value="{{$data->mail}}"
            />
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Tlp
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                type="text"
                name="tlp"
                value="{{$data->tlp}}"
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

         <!-- info validasi form -->
         @if ($errors->any())
         <div
             class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-5 rounded relative"
             role="alert"
         >
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
         @endif
    </form>
    
</div>
@endsection
