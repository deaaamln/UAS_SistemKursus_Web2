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
                            <a class="relative text-gray-700 transition-colors duration-300 transform " href="">
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
                                        <a href=""
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
                <div id="indicators-carousel" class="relative w-full z-0" data-carousel="static">
                    <!-- Carousel wrapper -->
                    <div class="relative overflow-hidden rounded-lg" style="height: 29rem">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                            <img src="{{ asset('images/Hero.png') }}"
                                class="absolute block w-full object-cover  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('images/Hero.png') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('images/Hero.png') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('images/Hero.png') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 5 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('images/Hero.png') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                            data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                            aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                            aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                            aria-label="Slide 4" data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                            aria-label="Slide 5" data-carousel-slide-to="4"></button>
                    </div>
                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30  group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
                <div class="category mt-10 mb-10 flex items-center justify-center gap-3">
                    <div class="wrap px-2 py-1 border border-emerald-400 rounded-xl">
                        <a href="">
                            <p class="text-emerald-400">All Recomendation</p>
                        </a>
                    </div>
                    <div class="wrap px-2 py-1 border border-gray-400 rounded-xl hover:border-emerald-400">
                        <a href="">
                            <p class="text-gray-500 hover:text-emerald-400">Adobe Ilustrator</p>
                        </a>
                    </div>
                    <div class="wrap px-2 py-1 border border-gray-400 rounded-xl hover:border-emerald-400">
                        <a href="">
                            <p class="text-gray-500 hover:text-emerald-400">Adobe Photoshop</p>
                        </a>
                    </div>
                    <div class="wrap px-2 py-1 border border-gray-400 rounded-xl hover:border-emerald-400">
                        <a href="">
                            <p class="text-gray-500 hover:text-emerald-400">UI Design</p>
                        </a>
                    </div>
                    <div class="wrap px-2 py-1 border border-gray-400 rounded-xl hover:border-emerald-400">
                        <a href="">
                            <p class="text-gray-500 hover:text-emerald-400">Web Programming</p>
                        </a>
                    </div>
                    <div class="wrap px-2 py-1 border border-gray-400 rounded-xl hover:border-emerald-400">
                        <a href="">
                            <p class="text-gray-500 hover:text-emerald-400">Mobile Programming</p>
                        </a>
                    </div>
                </div>
                <div class="Trending">
                    <div class="header">
                        <p class="font-bold text-2xl">Trending Course</p>
                        <p class="mt-2 text-gray-500">We know the best things for You. Top picks for You.</p>
                    </div>
                    <div class="wrap-card flex flex-wrap gap-3 mt-5">
                        @foreach ($courses as $course)
                            <a href="{{ auth()->check() ? route('buy-course', $course->id) : route('login') }}">
                                <div class="max-w-xs w-full bg-white rounded-lg shadow-md">
                                    <img class="w-full object-cover hover:opacity-75"
                                        src="{{ asset('storage/' . $course->image) }}" alt="" />
                                    <div class="p-4">
                                        <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                                            {{ $course->title }}
                                        </h5>
                                        <div class="developer flex items-center gap-2 mb-2">
                                            <img src="{{ asset('images/person_outline_24px.png') }}" alt="">
                                            <p class="text-sm text-emerald-500">Course ID: {{ $course->id }}</p>
                                        </div>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                            {{ Str::limit($course->description, 100) }}
                                        </p>
                                        @if ($course->schedules->isNotEmpty())
                                            <div class="mt-3 mb-2">
                                                <ul class="list-none">
                                                    @foreach ($course->schedules as $schedule)
                                                        <li class="flex items-center gap-3">
                                                            <p
                                                                class="px-1 py-1 bg-emerald-500 rounded-lg text-white w-24 text-xs font-bold text-center">
                                                                {{ $schedule->start_date }}
                                                            </p> -
                                                            <p
                                                                class="px-1 py-1 bg-red-500 rounded-lg text-white w-24 text-xs font-bold text-center">
                                                                {{ $schedule->end_date }}
                                                            </p>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <button class="px-3 py-2 bg-emerald-400 text-white rounded-xl">
                                            Register Now
                                        </button>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="Rekomendasi mt-10">
                    <div class="header">
                        <p class="font-bold text-2xl">More From Us</p>
                        <p class="mt-2 text-gray-500">We know the best things for You. Top picks for You.</p>
                    </div>
                    <div class="wrap-card flex items-center gap-3 mt-5">
                        <a href="#">
                            <div class="max-w-xs w-full bg-white  rounded-lg">
                                <a href="#">
                                    <img class="w-full object-cover hover:opacity-25"
                                        src="{{ asset('images/Card6.png') }}" alt="" />
                                </a>
                                <div class="mt-2">
                                    <h5
                                        class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                                        Website Dev Zero to Hero</h5>
                                    <div class="developer flex items-center gap-2 mb-2">
                                        <img src="{{ asset('images/person_outline_24px.png') }}" alt="">
                                        <p class="text-sm text-emerald-500">Course ID</p>
                                    </div>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lets Learn about
                                        Website Development from Zero to Hero
                                        in course we learn about variable function and deploying a website.
                                    </p>
                                    <Button class="px-3 py-2 bg-emerald-400 text-white rounded-xl">Register
                                        Now</Button>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="max-w-xs w-full bg-white  rounded-lg">
                                <a href="#">
                                    <img class="w-full object-cover hover:opacity-25"
                                        src="{{ asset('images/Rek1.png') }}" alt="" />
                                </a>
                                <div class="mt-2">
                                    <h5
                                        class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                                        Vue Js Script Course</h5>
                                    <div class="developer flex items-center gap-2 mb-2">
                                        <img src="{{ asset('images/person_outline_24px.png') }}" alt="">
                                        <p class="text-sm text-emerald-500">Course ID</p>
                                    </div>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Vue JS is a framework
                                        of javascript
                                        but in this course we learn about how to create method and send data using API.
                                    </p>
                                    <Button class="px-3 py-2 bg-emerald-400 text-white rounded-xl">Register
                                        Now</Button>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="max-w-xs w-full bg-white  rounded-lg">
                                <a href="#">
                                    <img class="w-full object-cover hover:opacity-25"
                                        src="{{ asset('images/Rek2.png') }}" alt="" />
                                </a>
                                <div class="mt-2">
                                    <h5
                                        class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                                        UI Design For Beginners</h5>
                                    <div class="developer flex items-center gap-2 mb-2">
                                        <img src="{{ asset('images/person_outline_24px.png') }}" alt="">
                                        <p class="text-sm text-emerald-500">Course ID</p>
                                    </div>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lets Learn with me
                                        about UI Design for Beginners
                                        we learn about how create a UI UX from Zero.
                                    </p>
                                    <Button class="px-3 py-2 bg-emerald-400 text-white rounded-xl">Register
                                        Now</Button>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="max-w-xs w-full bg-white  rounded-lg">
                                <a href="#">
                                    <img class="w-full object-cover hover:opacity-25"
                                        src="{{ asset('images/Rek3.png') }}" alt="" />
                                </a>
                                <div class="mt-2">
                                    <h5
                                        class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                                        Mobile Dev React Native</h5>
                                    <div class="developer flex items-center gap-2 mb-2">
                                        <img src="{{ asset('images/person_outline_24px.png') }}" alt="">
                                        <p class="text-sm text-emerald-500">Course ID</p>
                                    </div>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">I'am a Professional in
                                        React Native, over 4 years using react native
                                        to create app for android and IOS and deploying.
                                    </p>
                                    <Button class="px-3 py-2 bg-emerald-400 text-white rounded-xl">Register
                                        Now</Button>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="contact">
                    <section class="bg-white ">
                        <div class="container px-6 py-12 mx-auto">
                            <div>
                                <p class="font-medium text-blue-500 text-2xl">Contact us</p>

                                <h1 class="mt-2 text-2xl font-semibold text-gray-800 md:text-3xl ">Chat
                                    to our friendly team</h1>

                                <p class="mt-3 text-gray-500 ">We’d love to hear from you. Please
                                    fill out this form or shoot us an email.</p>
                            </div>

                            <div class="grid grid-cols-1 gap-12 mt-10 lg:grid-cols-2">
                                <div class="grid grid-cols-1 gap-12 md:grid-cols-2">
                                    <div>
                                        <span class="inline-block p-3 text-blue-500 rounded-full bg-blue-100/80 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                            </svg>
                                        </span>

                                        <h2 class="mt-4 text-base font-medium text-gray-800 ">Email</h2>
                                        <p class="mt-2 text-sm text-gray-500 ">Our friendly team is
                                            here to help.</p>
                                    </div>

                                    <div>
                                        <span class="inline-block p-3 text-blue-500 rounded-full bg-blue-100/80 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                            </svg>
                                        </span>

                                        <h2 class="mt-4 text-base font-medium text-gray-800 ">Live chat
                                        </h2>
                                        <p class="mt-2 text-sm text-gray-500 ">Our friendly team is
                                            here to help.</p>
                                    </div>

                                    <div>
                                        <span class="inline-block p-3 text-blue-500 rounded-full bg-blue-100/80 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                            </svg>
                                        </span>

                                        <h2 class="mt-4 text-base font-medium text-gray-800 ">Office
                                        </h2>
                                        <p class="mt-2 text-sm text-gray-500 ">Come say hello at our
                                            office HQ.</p>
                                    </div>

                                    <div>
                                        <span class="inline-block p-3 text-blue-500 rounded-full bg-blue-100/80 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                            </svg>
                                        </span>

                                        <h2 class="mt-4 text-base font-medium text-gray-800 ">Phone</h2>
                                        <p class="mt-2 text-sm text-gray-500 ">Mon-Fri from 8am to
                                            5pm.</p>
                                    </div>
                                </div>

                                <div class="p-4 py-6 rounded-lg bg-gray-50  md:p-8">
                                    <form>
                                        <div class="-mx-2 md:items-center md:flex">
                                            <div class="flex-1 px-2">
                                                <label class="block mb-2 text-sm text-gray-600 ">First
                                                    Name</label>
                                                <input type="text" placeholder="John "
                                                    class="block w-full px-5 py-2.5 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg  focus:border-blue-400  focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                                            </div>

                                            <div class="flex-1 px-2 mt-4 md:mt-0">
                                                <label class="block mb-2 text-sm text-gray-600 ">Last
                                                    Name</label>
                                                <input type="text" placeholder="Doe"
                                                    class="block w-full px-5 py-2.5 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg  focus:border-blue-400  focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <label class="block mb-2 text-sm text-gray-600 ">Email
                                                address</label>
                                            <input type="email" placeholder="johndoe@example.com"
                                                class="block w-full px-5 py-2.5 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg  focus:border-blue-400  focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                                        </div>

                                        <div class="w-full mt-4">
                                            <label
                                                class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Message</label>
                                            <textarea
                                                class="block w-full h-32 px-5 py-2.5 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg md:h-56  focus:border-blue-400 ` focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                                placeholder="Message"></textarea>
                                        </div>

                                        <button
                                            class="w-full px-6 py-3 mt-4 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                            Send message
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="footer">
                    <footer class="bg-white dark:bg-gray-900">
                        <div class="container px-6 py-12 mx-auto">
                            <div class="md:flex md:-mx-3 md:items-center md:justify-between">
                                <h1
                                    class="text-xl font-semibold tracking-tight text-gray-800 md:mx-3 xl:text-2xl dark:text-white">
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

                            <hr class="my-6 border-gray-200 md:my-10 dark:border-gray-700">

                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                                <div>
                                    <p class="font-semibold text-gray-800 dark:text-white">Quick Link</p>

                                    <div class="flex flex-col items-start mt-5 space-y-2">
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 dark:text-gray-300 dark:hover:text-blue-400 hover:underline hover:text-blue-500">Instagram</a>
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 dark:text-gray-300 dark:hover:text-blue-400 hover:underline hover:text-blue-500">Facebook</a>
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 dark:text-gray-300 dark:hover:text-blue-400 hover:underline hover:text-blue-500">Our
                                            LinkedIn</a>
                                    </div>
                                </div>

                                <div>
                                    <p class="font-semibold text-gray-800 dark:text-white">Popular Course</p>

                                    <div class="flex flex-col items-start mt-5 space-y-2">
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 dark:text-gray-300 dark:hover:text-blue-400 hover:underline hover:text-blue-500">Clone
                                            & E-Commerce</a>
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 dark:text-gray-300 dark:hover:text-blue-400 hover:underline hover:text-blue-500">UI
                                            Design</a>
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 dark:text-gray-300 dark:hover:text-blue-400 hover:underline hover:text-blue-500">Web
                                            Programming</a>
                                    </div>
                                </div>

                                <div>
                                    <p class="font-semibold text-gray-800 dark:text-white">Services</p>

                                    <div class="flex flex-col items-start mt-5 space-y-2">
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 dark:text-gray-300 dark:hover:text-blue-400 hover:underline hover:text-blue-500">Translation</a>
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 dark:text-gray-300 dark:hover:text-blue-400 hover:underline hover:text-blue-500">Proofreading
                                            & Editing</a>
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 dark:text-gray-300 dark:hover:text-blue-400 hover:underline hover:text-blue-500">Content
                                            Creation</a>
                                    </div>
                                </div>

                                <div>
                                    <p class="font-semibold text-gray-800 dark:text-white">Contact Us</p>

                                    <div class="flex flex-col items-start mt-5 space-y-2">
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 dark:text-gray-300 dark:hover:text-blue-400 hover:underline hover:text-blue-500">+880
                                            768 473 4978</a>
                                        <a href="#"
                                            class="text-gray-600 transition-colors duration-300 dark:text-gray-300 dark:hover:text-blue-400 hover:underline hover:text-blue-500">info@myscourse.com</a>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-6 border-gray-200 md:my-10 dark:border-gray-700">

                            <div class="flex flex-col items-center justify-between sm:flex-row">
                                <a href="#">
                                    <img class="w-auto h-7" src="{{ asset('images/Logo.png') }}" alt="">
                                </a>

                                <p class="mt-4 text-sm text-gray-500 sm:mt-0 dark:text-gray-300">© Copyright 2021. All
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
