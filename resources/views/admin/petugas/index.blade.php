@extends('admin.layout') @section('title') Kelola Petugas @endsection
@section('content')
<h2 class="text-2xl mb-3">Kelola Pengguna</h2>

<div class="flex items-center justify-between mb-2 mt-5">
    <form
        action="{{ url('admin/master/petugas-cari') }}"
        method="get"
        class="w-full "
    >
        @csrf
        <input
            class=" shadow appearance-none border rounded w-1/4  py-2 px-3 text-gray-700 leading-tight focus:outline-none "
            type="text"
            placeholder="Cari"
            name="key"
        />
    </form>

    <a href="{{ url('admin/master/petugas-add') }}" class="">
        <svg
            viewBox="0 0 20 20"
            fill="currentColor"
            class="plus-circle w-6 h-6 mx-2 text-indigo-500 cursor-pointer hover:text-indigo-600"
        >
            <path
                fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                clip-rule="evenodd"
            ></path>
        </svg>
    </a>
</div>
<table class="table-auto w-full mb-5">
    <thead>
        <tr>
            <th class="px-4 py-2 w-10">No.</th>
            <th class="px-4 py-2">Username</th>
            <th class="px-4 py-2">Nama</th>
            <th class="px-4 py-2">Mail</th>
            <th class="px-4 py-2">Tlp.</th>
            <th class="px-4 py-2">Akses</th>
            <th class="px-4 py-2">.</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr data-id="x">
            <td class="border px-4 py-2">{{$loop->iteration}}</td>
            <td class="border px-4 py-2">{{$data->username}}</td>
            <td class="border px-4 py-2">{{$data->nama}}</td>
            <td class="border px-4 py-2">{{$data->mail}}</td>
            <td class="border px-4 py-2">{{$data->tlp}}</td>
            <td class="border px-4 py-2">
                @switch($data->akses) @case('0') Master @break @case('1') Admin
                @break @case('2') Pimpinan @break @default Data Salah @endswitch 
            </td>
            <td class="border px-4 py-2 w-20">
                <div class="flex items-center">
                    <a href="{{ url('admin/master/petugas-edit/'.$data->id) }}">
                        <svg
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            class="pencil w-6 h-6 mx-2 text-indigo-500 cursor-pointer hover:text-indigo-600"
                        >
                            <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                            ></path>
                        </svg>
                    </a>

                    <a
                        href="{{ url('admin/master/petugas-detail/'.$data->id) }}"
                    >
                        <svg
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            class="annotation w-6 h-6 mx-2 text-indigo-500 cursor-pointer hover:text-indigo-600"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </a>

                    <a
                        href="{{ url('admin/master/petugas-hapus/'.$data->id) }}"
                    >
                        <svg
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            class="trash w-6 h-6 mx-2 cursor-pointer text-indigo-500 hover:text-indigo-600"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

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
