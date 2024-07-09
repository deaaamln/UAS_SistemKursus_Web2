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
                                href="#">
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
        @if (session('success'))
            <script>
                alert('Success: {{ session('success') }}');
            </script>
        @endif

        @if (session('error'))
            <script>
                alert('Error: {{ session('error') }}');
            </script>
        @endif
        <div class="main flex justify-center bg-white">
            <div class="container mt-5 mb-[5rem] " style="width: 60%">
                <div class="main flex items-center justify-center">
                    <div class="w-full">
                        <table class="min-w-full bg-white rounded-lg shadow-md">
                            <thead>
                                <tr>
                                    <th class="px-3 py-3 text-left font-bold">Image</th>
                                    <th class="px-3 py-3 text-center font-bold">Course</th>
                                    <th class="px-3 py-3 text-center font-bold">Price</th>
                                    <th class="px-3 py-3 text-center font-bold">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-t">
                                    <td class="px-3 py-3 text-left">
                                        <img src="{{ asset('storage/' . $course->image) }}" alt=""
                                            class="">
                                    </td>
                                    <td class="px-3 py-3 text-center">{{ $course->title }}</td>
                                    <td class="px-3 py-3 text-center">Rp. {{ $course->price }}</td>
                                    <td class="px-3 py-3 text-center">Rp. {{ $course->price }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="px-2 py-2 bg-white w-[30rem] shadow-md mt-[5rem] rounded-md">
                    <p class="font-bold">Cart Total</p>
                    <div
                        class="text-left flex items-center justify-between mt-[1rem] border-b border-gray-400 pb-[0.5rem]">
                        <p class="font-normal text-sm">Subtotal :</p>
                        <p class="font-normal text-sm"> Rp. {{ $course->price }}</p>
                    </div>
                    <div class="text-left flex items-center justify-between mt-[1rem] pb-[0.5rem]">
                        <p class="font-normal text-sm">Total :</p>
                        <p class="font-normal text-sm">Rp. {{ $course->price }}</p>
                    </div>
                    <form action="{{ route('transaction.store', $course->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mt-[3rem]">
                            <label for="image">Upload Bukti Pembayaran</label>
                            <input
                                class="mt-[1rem] block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                                id="image" name="image" type="file">
                        </div>
                        <div class="flex items-center justify-center mt-[1rem]">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <input type="hidden" name="amount" value="{{ $course->price }}">
                            <!-- Assuming price is stored in $course->price -->
                            <input type="hidden" name="transaction_date" value="{{ now() }}">
                            <!-- Assuming transaction date is current date/time -->
                            <input type="hidden" name="status" value="completed">
                            <!-- Assuming transaction status is 'completed' -->

                            <Button type="submit"
                                class="text-center px-2 py-2 text-white bg-red-500 rounded-xl w-80 hover:bg-red-100 hover:text-white">
                                Buy Course
                            </Button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
