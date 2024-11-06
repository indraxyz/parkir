@extends('admin.layout') @section('title') Akun Saya @endsection
@section('content')
<div class="w-full max-w-xl mx-auto mt-20">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h1 class="text-2xl mb-5 mt-8">Akun Saya</h1>
        <!-- <h3 class="mb-5 mt-8">ADMIN PANEL</h3> -->

        @if ($message = Session::get('success'))
        <div
            class="bg-indigo-100 border border-indigo-400 text-indigo-700 px-4 py-3 my-2 rounded relative"
            role="alert"
        >
            <strong class="font-bold">Yeay!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
        @endif
        @if ($message = Session::get('error'))
        <div
            class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-2 rounded relative"
            role="alert"
        >
            <strong class="font-bold">Maaf!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
        @endif

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
        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-bold mb-2">
                Tlp
            </label>
            <label class="block text-gray-700 text-md mb-2">
                {{$data->tlp}}
            </label>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-bold mb-2">
                Akses
            </label>
            <label class="block text-gray-700 text-md mb-2">
                @switch($data->akses) @case('0') Master @break @case('1') Admin
                @break @case('2') Pimpinan @break @default Data Salah @endswitch 
            </label>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-lg font-bold mb-2">
                Last Update
            </label>
            <label class="block text-gray-700 text-md mb-2">
                {{$data->updated_at}}
            </label>
        </div>
        <div class="flex items-center">
            <a href="{{ url('admin/akun-edit/'.$data->id) }}">
                <svg
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    class="pencil w-10 h-10 shadow-md p-2 rounded-full mx-2 text-indigo-500 cursor-pointer hover:text-indigo-600 "
                >
                    <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                    ></path>
                </svg>
            </a>

            <a href="{{ url('admin/akun-editpassword/'.$data->id) }}">
                <svg
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    class="lock-closed w-10 h-10 shadow-md p-2 rounded-full mx-2 text-indigo-500 cursor-pointer hover:text-indigo-600"
                >
                    <path
                        fill-rule="evenodd"
                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection
