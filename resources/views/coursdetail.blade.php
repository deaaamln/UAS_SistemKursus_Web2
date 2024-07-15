<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="font-sans antialiase">
    <div class="bg-gray-50 ">
        <nav x-data="{ isOpen: false }" class="relative bg-white shadow">
            <div class="container px-6 py-4 mx-auto md:flex md:justify-between md:items-center">
                <div class="flex items-center justify-between">
                    <a href="{{ route('welcome.index') }}" class="flex items-center">
                        <img class="w-auto h-8 " src="{{ asset('images/Logo.png') }}" alt="">
                    </a>

                    <!-- Mobile menu button -->
                    <div class="flex lg:hidden">
                        <button x-cloak @click="isOpen = !isOpen" type="button"
                            class="text-gray-500  hover:text-gray-600  focus:outline-none focus:text-gray-600 "
                            aria-label="toggle menu">
                            <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                            </svg>

                            <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
                    class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white  md:mt-0 md:p-0 md:top-0 md:relative md:bg-transparent md:w-auto md:opacity-100 md:translate-x-0 md:flex md:items-center">
                    <div class="flex justify-center md:block">
                        @auth
                            <a class="relative text-gray-700 transition-colors duration-300 transform "
                                href="{{ route('courses.index') }}">
                                <Button class="px-2 py-2 bg-gray-100 rounded-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                    </svg></Button>
                            </a>
                        @endauth
                    </div>
                    <div class="flex flex-col md:flex-row md:mx-6 gap-3 md:gap-5">
                        @auth
                            <!-- If user is authenticated, show account image -->

                            <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
                                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                type="button">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="{{ asset('images/profile.png') }}" alt="user photo">
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownAvatar"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                    <div>{{ $user->name }}</div>
                                    <div class="font-medium truncate">{{ $user->email }}</div>
                                </div>
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownUserAvatarButton">
                                    <li>
                                        <a href="{{ route('profile.index') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                                    </li>
                                </ul>
                                <div class="py-2">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <Button
                                            class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-black">Log
                                            Out</Button>
                                    </form>
                                </div>
                            </div>
                        <Button Button @else <!-- If user is not authenticated, show login and signup buttons -->
                                <Button
                                    class="px-3 py-2 rounded-lg border border-black bg-white text-black text-sm font-bold hover:bg-emerald-400 hover:text-white hover:border-white"><a
                                        href="{{ route('login') }}">Login</a></Button>
                                <Button
                                    class="px-3 py-2 rounded-lg  bg-emerald-400 text-white text-sm font-bold flex items-center gap-2 hover:bg-red-400">
                                    <img class="w-auto h-4" src="{{ asset('images/timelapse_24px.png') }}" alt="">
                                    <a href="{{ route('register') }}">Register</a>
                                </Button>
                            @endauth
                    </div>
                </div>
            </div>
        </nav>

        <div class="main flex justify-center bg-white">
            <div class="container mt-5" style="width: 80%">
                <div class="main">
                    <div class="header flex gap-10 justify-between">
                        <div class="thumbnail">
                            <img src="{{ asset('storage/' . $course->image) }}" alt="thumbnail"
                                class="w-full object-cover h-80">
                        </div>
                        <div class="desc px-2 py-2 shadow-md rounded-md">
                            <p class="text-lg font-bold">Chapter 1: Preparation</p>
                            <p class="text-yellow-400 text-sm">12% Complete</p>
                            <div class="chap mt-3">
                                <ul style="list-style: none" class="px-4 mb-5">
                                    <li>
                                        <hr>
                                        <div class="flex items-center gap-28 mt-2 mb-2">
                                            <div class="text">
                                                <p class="text-sm text-gray-600">Installing Vue Js</p>
                                                <p class="flex items-center gap-1 text-xs text-emerald-500"><img
                                                        src="{{ asset('images/play_circle_filled_24px.png') }}"
                                                        alt="" class="h-3"> 12m</p>
                                            </div>
                                            <p class="px-1 py-1 bg-emerald-500 text-white text-xs rounded-md">Completed
                                            </p>
                                        </div>
                                        <hr>
                                    </li>
                                    <li>
                                        <hr>
                                        <div class="flex items-center gap-28 mt-2 mb-2">
                                            <div class="text">
                                                <p class="text-sm text-gray-600">Installing VsCode</p>
                                                <p class="flex items-center gap-1 text-xs text-emerald-500"><img
                                                        src="{{ asset('images/red_filled.png') }}" alt=""
                                                        class="h-3"> 12m</p>
                                            </div>
                                            <p class="px-1 py-1 bg-red-500 text-white text-xs rounded-md">Playing</p>
                                        </div>
                                        <hr>
                                    </li>
                                    <li>
                                        <hr>
                                        <div class="flex items-center gap-28 mt-2 mb-2">
                                            <div class="text">
                                                <p class="text-sm text-gray-600">Setup Project</p>
                                                <p class="flex items-center gap-1 text-xs text-emerald-500"><img
                                                        src="{{ asset('images/abu_filled.png') }}" alt=""
                                                        class="h-3"> 12m</p>
                                            </div>
                                        </div>
                                        <hr>
                                    </li>
                                    <li>
                                        <hr>
                                        <div class="flex items-center gap-28 mt-2 mb-2">
                                            <div class="text">
                                                <p class="text-sm text-gray-600">Create Numbering</p>
                                                <p class="flex items-center gap-1 text-xs text-emerald-500"><img
                                                        src="{{ asset('images/abu_filled.png') }}" alt=""
                                                        class="h-3"> 12m</p>
                                            </div>
                                        </div>
                                        <hr>
                                    </li>
                                    <li>
                                        <hr>
                                        <div class="flex items-center gap-28 mt-2 mb-2">
                                            <div class="text">
                                                <p class="text-sm text-gray-600">Create Function</p>
                                                <p class="flex items-center gap-1 text-xs text-emerald-500"><img
                                                        src="{{ asset('images/abu_filled.png') }}" alt=""
                                                        class="h-3"> 12m</p>
                                            </div>
                                        </div>
                                        <hr>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="title mt-5">
                            <p class="font-bold text-2xl">{{ $course->title }}</p>
                        </div>
                        <div class="channel mt-5 py-2 px-2 bg-gray-100" style="width: 50%">
                            <div class="image">
                                <img class="h-7" src="{{ asset('images/Logo.png') }}" alt="">
                            </div>
                        </div>
                        <div class="about mt-5 text-justify" style="width: 50%">
                            <p class="font-bold text-md mb-3">About Course</p>
                            <p class="title">{{ $course->description }}</p>
                        </div>
                        <div class="review mt-5">
                            <p class="mt-4 mb-5 font-bold">Review </p>
                            <div class="flex gap-3 mb-3">
                                <img src="{{ asset('images/Square-1.png') }}" alt="" class="h-7">
                                <div class="text">
                                    <p class="text-sm font-bold text-emerald-400">Leona Heart</p>
                                    <p class="text-sm font-normal text-gray-300 mt-3">Loved This Course, I'Ve Learned
                                        some technique</p>
                                </div>
                            </div>
                            <div class="flex gap-3 mb-3">
                                <img src="{{ asset('images/Square-2.png') }}" alt="" class="h-7">
                                <div class="text">
                                    <p class="text-sm font-bold text-emerald-400">Jimmy Hampton</p>
                                    <p class="text-sm font-normal text-gray-300 mt-3">Very Good Course, I'Ve Learned
                                        some technique</p>
                                </div>
                            </div>
                            <div class="flex gap-3 mb-3">
                                <img src="{{ asset('images/Square.png') }}" alt="" class="h-7">
                                <div class="text">
                                    <p class="text-sm font-bold text-emerald-400">Tom Edison</p>
                                    <p class="text-sm font-normal text-gray-300 mt-3">I'Ve Learned some technique about
                                        Programming</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <footer class="bg-white">
                        <div class="container px-6 py-12 mx-auto">
                            <div class="md:flex md:-mx-3 md:items-center md:justify-between">
                                <h1 class="text-xl font-semibold tracking-tight text-gray-800 md:mx-3 xl:text-2xl">
                                    Subscribe our newsletter to get update.</h1>

                                <div class="mt-6 md:mx-3 shrink-0 md:mt-0 md:w-auto">
                                    <a href="#"
                                        class="inline-flex items-center justify-center w-full px-4 py-2 text-sm text-white duration-300 bg-gray-800 rounded-lg gap-x-3 hover:bg-gray-700 focus:ring focus:ring-gray-300 focus:ring-opacity-80">
                                        <span>Sign Up Now</span>

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <hr class="my-6 border-gray-200 md:my-10">

                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                                <div>
                                    <p class="font-semibold text-gray-800">Quick Link</p>

                                    <div class="flex flex-col items-start mt-5 space-y-2">
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 hover:underline hover:text-blue-500">Instagram</a>
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 hover:underline hover:text-blue-500">Facebook</a>
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 hover:underline hover:text-blue-500">Our
                                            LinkedIn</a>
                                    </div>
                                </div>

                                <div>
                                    <p class="font-semibold text-gray-800">Popular Course</p>

                                    <div class="flex flex-col items-start mt-5 space-y-2">
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 hover:underline hover:text-blue-500">Clone
                                            & E-Commerce</a>
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 hover:underline hover:text-blue-500">UI
                                            Design</a>
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 hover:underline hover:text-blue-500">Web
                                            Programming</a>
                                    </div>
                                </div>

                                <div>
                                    <p class="font-semibold text-gray-800">Services</p>

                                    <div class="flex flex-col items-start mt-5 space-y-2">
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 hover:underline hover:text-blue-500">Translation</a>
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 hover:underline hover:text-blue-500">Proofreading
                                            & Editing</a>
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 hover:underline hover:text-blue-500">Content
                                            Creation</a>
                                    </div>
                                </div>

                                <div>
                                    <p class="font-semibold text-gray-800">Contact Us</p>

                                    <div class="flex flex-col items-start mt-5 space-y-2">
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 hover:underline hover:text-blue-500">+880
                                            768 473 4978</a>
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 hover:underline hover:text-blue-500">info@myscourse.com</a>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-6 border-gray-200 md:my-10">

                            <div class="flex flex-col items-center justify-between sm:flex-row">
                                <a href="#">
                                    <img class="w-auto h-7" src="{{ asset('images/Logo.png') }}" alt="">
                                </a>

                                <p class="mt-4 text-sm text-gray-500 sm:mt-0">© Copyright 2021. All
                                    Rights Reserved.</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
