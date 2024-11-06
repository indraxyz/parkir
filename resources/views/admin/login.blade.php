<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>iParkir</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    </head>
    <body class="m-0 font-ubuntu">
        <div class="absolute table w-full h-full">
            <div class="table-cell align-middle">
                <div class="w-full m-auto">
                    <div class="w-full flex flex-row-reverse p-10" style="background-image: url({{ asset('img/parking-area.png') }}); background-size:cover; background-repeat: no-repeat;">
                        
                        <div class="lg:w-1/3 md:w-1/2 ">
                            <form
                                action="{{ url('admin/login') }}"
                                method="post"
                                class="bg-white shadow-md rounded px-8 pt-6 pb-8"
                            >
                                @csrf
                                <img
                                    src="{{ asset('img/logo.png') }}"
                                    class="w-32 mx-auto"
                                />
                                <h3 class="mb-5 mt-8 text-center text-indigo-700">iParkir</h3>

                                <h3 class="my-5">Admin Panel</h3>

                                <div class="mb-4">
                                    <label
                                        class="block text-gray-700 text-sm font-bold mb-2"
                                    >
                                        Username
                                    </label>
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none "
                                        name="username"
                                        type="text"
                                    />
                                </div>
                                <div class="mb-6">
                                    <label
                                        class="block text-gray-700 text-sm font-bold mb-2"
                                        for="password"
                                    >
                                        Password
                                    </label>
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none"
                                        name="password"
                                        type="password"
                                        placeholder="*****"
                                    />
                                </div>
                                <div class="flex items-center justify-between">
                                    <button
                                        class="w-full bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
                                        type="submit"
                                    >
                                        LOGIN
                                    </button>
                                </div>

                                {{-- notif --}}
                                @if ($message = Session::get('false'))
                                <div
                                    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-2 rounded relative"
                                    role="alert"
                                >
                                    <strong class="font-bold">Maaf!</strong>
                                    <span class="block sm:inline">{{ $message }}</span>
                                </div>
                                @endif

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
                    </div>
                    <p class="text-center text-gray-500 text-xs mt-8">
                        © @php echo date("Y") @endphp iParkir. All rights
                        reserved.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
