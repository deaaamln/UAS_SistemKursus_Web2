<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('images/Logo.jpeg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/Logo.jpeg') }}" type="image/x-icon">
    @vite('resources/css/app.css')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body style="background: #f8f9fa">
    <div id="app" class="flex">
        <!-- Sidebar -->
        <aside class="flex flex-col w-64 h-auto px-4 py-8 overflow-y-auto  border-r rtl:border-r-0 rtl:border-l">
            <a href="#" class="mb-[2rem] flex justify-center">
                <img class="w-auto h-6 sm:h-7" src="{{ asset('images/Logo.png') }}" alt="">
            </a>
            <div class="flex flex-col justify-between flex-1 mt-6">
                <nav>
                    <a class="flex items-center px-4 py-2 text-gray-600  rounded-md hover:bg-white group {{ request()->is('dashboard-adminw') ? 'bg-white shadow-md' : '' }}"
                        href="{{ route('dashboard-admin') }}">
                        <div
                            class="px-2 py-2 rounded-md group-hover:bg-purple-500 shadow-md {{ request()->is('dashboard-adminw') ? 'bg-purple-500' : '' }}">
                            <svg class="w-5 h-5 group-hover:stroke-white  {{ request()->is('dashboard-admin') ? 'stroke-white' : '' }}"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <span class="mx-4 font-normal">Dashboard</span>
                    </a>

                    <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md hover:bg-white group  {{ request()->is('add-course') ? 'bg-white shadow-md' : '' }}"
                        href="{{ route('add-course') }}">
                        <div
                            class="px-2 py-2 rounded-md group-hover:bg-purple-500 shadow-md {{ request()->is('add-course') ? 'bg-purple-500' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="size-6 group-hover:stroke-white {{ request()->is('add-course') ? 'stroke-white' : '' }}">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <span class="mx-4 font-normal">Add Course</span>
                    </a>
                    <hr class="my-6 border-gray-200 dark:border-gray-600" />
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            class="flex items-center w-full px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md hover:bg-white group"
                            href="#">
                            <div class="px-2 py-2  bg-white rounded-md group-hover:bg-purple-500 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 group-hover:stroke-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                </svg>
                            </div>
                            <span class="mx-4 font-medium">Log Out</span>
                        </button>
                    </form>
                </nav>

        </aside>
        <!-- Content -->
        <div class="content px-5">
            <!-- Main Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
