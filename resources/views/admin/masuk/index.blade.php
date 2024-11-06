@extends('admin.layout') @section('title') Kelola Parkir Masuk @endsection
@section('content')
<h2 class="text-2xl mb-3">Kelola Parkir Masuk</h2>

@if ($message = Session::get('false'))
    <div
        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-2 rounded relative"
        role="alert"
    >
        <strong class="font-bold">Maaf!</strong>
        <span class="block sm:inline">{{ $message }}</span>
    </div>
@endif

<div class="flex items-center justify-between mb-2 mt-5">
    <form
        action="{{ url('admin/parkir/masuk-cari') }}"
        method="get"
        class="w-full "
    >
        @csrf
        <input
            class=" shadow appearance-none border rounded w-1/3  py-2 px-3 text-gray-700 leading-tight focus:outline-none "
            type="text"
            placeholder="Cari : Nota, Plat nomor"
            name="key"
        />
    </form>

    <a href="{{ url('admin/parkir/form-masuk') }}" class="">
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
            {{-- <th class="px-4 py-2 w-10">No.</th> --}}
            <th class="px-4 py-2">Nota</th>
            <th class="px-4 py-2">Lokasi</th>
            <th class="px-4 py-2">Masuk</th>
            <th class="px-4 py-2">Petugas</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">.</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr data-id="x">
                {{-- <td class="border px-4 py-2">{{$loop->iteration}}</td> --}}
                <td class="border px-4 py-2">{{$data->nota}}</td>
                <td class="border px-4 py-2">{{$data->lokasi->lantai->nama.'/'.$data->lokasi->blok->nama.'/'.$data->lokasi->nomor}}</td>
                <td class="border px-4 py-2">{{$data->waktu_masuk}}</td>
                <td class="border px-4 py-2">{{$data->petugas->nama}}</td>
                <td class="border px-4 py-2">
                    @switch($data->status)
                        @case('0') 
                            Masuk
                            @break 
                        @case('1')
                            Keluar
                            @break 
                        @case('2')
                            Terbayar
                            @break 
                        @default Data Salah 
                    @endswitch
                </td>
                <td class="border px-4 py-2 w-20">
                    <div class="flex items-center">
                        <a href="{{ url('admin/parkir/masuk-edit/'.$data->id) }}">
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

                        <a href="{{ url('admin/parkir/masuk-struk/'.$data->id) }}">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="newspaper w-6 h-6 mx-2 text-indigo-500 cursor-pointer hover:text-indigo-600"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path><path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path></svg>
                            
                        </a>

                        <a href="{{ url('admin/parkir/masuk-hapus/'.$data->id) }}">
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
