@extends('admin.layout') @section('title') Dashboard @endsection
@section('content')

<h2 class="text-xl font-bold m-3">Hari Ini</h2>
<div class="w-full">
    <div class="flex">
        <div class="w-1/2 bg-indigo-100 border-t-4 border-indigo-500 rounded-b text-indigo-900 px-4 py-3 mx-3 shadow-md" role="alert">
            <div class="flex">
              <div>
                <p class="font-bold text-xl">Parkir Masuk</p>
                <p class="font-bold text-5xl">{{$masuk}}</p>
              </div>
            </div>
        </div>
        <div class="w-1/2 bg-indigo-100 border-t-4 border-indigo-500 rounded-b text-indigo-900 px-4 py-3 mx-3 shadow-md" role="alert">
            <div class="flex">
              <div>
                <p class="font-bold text-xl">Parkir Keluar</p>
                <p class="font-bold text-5xl">{{$keluar}}</p>
              </div>
            </div>
        </div>
    </div>
</div>

<h2 class="text-xl font-bold m-3">Lokasi Parkir</h2>
<div class="w-full">
    <div class="flex">
        <div class="w-1/3 bg-indigo-100 border-t-4 border-indigo-500 rounded-b text-indigo-900 px-4 py-3 mx-3 shadow-md" role="alert">
            <div class="flex">
              <div>
                <p class="font-bold text-xl">Tersedia</p>
                <p class="font-bold text-5xl">{{$tersedia}}</p>
              </div>
            </div>
        </div>
        <div class="w-1/3 bg-indigo-100 border-t-4 border-indigo-500 rounded-b text-indigo-900 px-4 py-3 mx-3 shadow-md" role="alert">
            <div class="flex">
              <div>
                <p class="font-bold text-xl">Terisi</p>
                <p class="font-bold text-5xl">{{$terisi}}</p>
              </div>
            </div>
        </div>
        <div class="w-1/3 bg-indigo-100 border-t-4 border-indigo-500 rounded-b text-indigo-900 px-4 py-3 mx-3 shadow-md" role="alert">
            <div class="flex">
              <div>
                <p class="font-bold text-xl">Jumlah</p>
                <p class="font-bold text-5xl">{{$lokasi}}</p>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection
