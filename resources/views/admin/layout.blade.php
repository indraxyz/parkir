@php
$user = json_decode(Session::get('user'));
@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="url" content="{{ url('') }}" />

        <title>@yield('title') - iParkir</title>

        <!-- STYLE -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        @yield('style')
    </head>
    <body>
        <div>
            <!-- navigasi -->
            <nav
                class="flex items-center justify-between flex-wrap bg-indigo-500 p-4"
            >
                <div class="flex items-center flex-shrink-0 text-white mr-6">
                    <svg
                        class="fill-current h-8 w-8 mr-2"
                        width="54"
                        height="54"
                        viewBox="0 0 54 54"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"
                        />
                    </svg>
                    <span class="font-semibold text-xl tracking-tight"
                        >iParkir</span
                    >
                </div>
                <div class="xl:hidden lg:hidden md:hidden">
                    <button
                        class="flex items-center px-3 py-2 border rounded text-indigo-100 border-indigo-400 hover:text-white hover:border-white"
                    >
                        <svg
                            class="fill-current h-3 w-3"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <title>Menu</title>
                            <path
                                d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"
                            />
                        </svg>
                    </button>
                </div>
                <div
                    class=" md:flex md:items-center w-full hidden md:w-auto  md:visible "
                >
                    <a
                        href="{{ url('admin/dashboard') }}"
                        class="block  lg:inline-block lg:mt-0 text-indigo-100 hover:text-white hover:bg-indigo-600 py-2 px-3  rounded-lg"
                    >
                        <img
                            class="fill-current w-5 h-5"
                            src="{{ asset('img/home.svg') }}"
                            alt=""
                            srcset=""
                        />
                    </a>
                    <a
                        href="{{ url('admin/parkir/kelola-masuk') }}"
                        class="block  lg:inline-block lg:mt-0 text-indigo-100 hover:text-white hover:bg-indigo-600 py-2 px-3  rounded-lg"
                    >
                        Masuk
                    </a>
                    <a
                        href="{{ url('admin/parkir/kelola-keluar') }}"
                        class="block  lg:inline-block lg:mt-0 text-indigo-100 hover:text-white hover:bg-indigo-600 py-2 px-3  rounded-lg"
                    >
                        Keluar
                    </a>
                    <a
                        href="{{ url('admin/laporan') }}"
                        class="block  lg:inline-block lg:mt-0 text-indigo-100 hover:text-white hover:bg-indigo-600 py-2 px-3  rounded-lg"
                    >
                        Laporan
                    </a>
                    <div class="flex items-center ">
                        <div
                            class="group cursor-pointer hover:bg-indigo-600 py-2 px-3 rounded-lg"
                        >
                            <a
                                href="#"
                                class="block lg:mt-0 text-indigo-100  flex items-center hover:text-white "
                            >
                                Master
                                <svg
                                    class="fill-current text-indigo-100 h-4 w-4 ml-1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                    />
                                </svg>
                            </a>
                            <div class="relative ">
                                <ul
                                    style="right: 0px; top: 0px; "
                                    class="absolute hidden mt-1 -mr-3 py-2 bg-gray-200 text-gray-700 group-hover:block rounded-lg shadow-md"
                                >
                                
                                    @if ($user->akses == 0 )
                                        <li class="">
                                            <a
                                                class=" hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                                href="{{
                                                    url('admin/master/petugas')
                                                }}"
                                                >Pengguna</a
                                            >
                                        </li>
                                    @endif

                                    <li class="">
                                        <a
                                            class=" hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                            href="{{
                                                url('admin/master/tarif')
                                            }}"
                                            >Tarif</a
                                        >
                                    </li>
                                    
                                    <li class="">
                                        <a
                                            class="  hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                            href="{{
                                                url(
                                                    'admin/master/lokasi-parkir'
                                                )
                                            }}"
                                            >Lokasi</a
                                        >
                                    </li>
                                    <li class="">
                                        <a
                                            class="  hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                            href="{{
                                                url('admin/master/lantai')
                                            }}"
                                            >Lantai</a
                                        >
                                    </li>
                                    <li class="">
                                        <a
                                            class="  hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                            href="{{
                                                url('admin/master/blok')
                                            }}"
                                            >Blok</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div
                            class="group cursor-pointer hover:bg-indigo-600 py-2 px-3 rounded-lg"
                        >
                            <a href="#" class="block">
                                <img
                                    class="fill-current w-5 h-5"
                                    src="{{ asset('img/gear.svg') }}"
                                    alt=""
                                    srcset=""
                                />
                            </a>
                            <div class="relative">
                                <ul
                                    style="right: 0px; top: 0px; "
                                    class="absolute hidden mt-1 -mr-3 py-2 bg-gray-200 text-gray-700 group-hover:block rounded-lg shadow-md"
                                >
                                    <li class="">
                                        <a
                                            class=" hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                            href="{{ url('admin/akun-saya') }}"
                                            >Akun</a
                                        >
                                    </li>
                                    <li class="">
                                        <a
                                            class=" hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                            href="{{ url('admin/logout') }}"
                                            >Logout</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="m-5">
                @yield('content')
            </div>
        </div>

        <!-- JS -->
        <script src="{{ url('js/jquery.min.js') }}"></script>
        @yield('js')
    </body>
</html>
