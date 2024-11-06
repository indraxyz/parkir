@extends('admin.layout') @section('title') Kelola Tarif @endsection
@section('content')
<h2 class="text-2xl mb-3">Kelola Tarif</h2>

<div class="flex flex-row-reverse items-center mb-2 mt-5">
    <a href="{{ url('admin/master/tarif-add') }}" class="">
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
            <th class="px-4 py-2">No.</th>
            <th class="px-4 py-2">Batas Jam</th>
            <th class="px-4 py-2">Biaya</th>
            <th class="px-4 py-2">Keterangan</th>
            <th class="px-4 py-2">.</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr data-id="x">
            <td class="border px-4 py-2 w-10">{{$loop->iteration}}</td>
            <td class="border px-4 py-2">{{$data->batas_jam}}</td>
            <td class="border px-4 py-2">{{$data->biaya}}</td>
            <td class="border px-4 py-2">
                {{$data->keterangan}}
            </td>
            <td class="border px-4 py-2 w-20">
                <div class="flex items-center">
                    <a href="{{ url('admin/master/tarif-edit/'.$data->id) }}">
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

                    <a href="{{ url('admin/master/tarif-hapus/'.$data->id) }}">
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

@endsection
