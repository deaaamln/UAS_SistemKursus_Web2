@extends('layouts.admin')

@section('content')
    <style>
        .data .icon {
            background-color: #cb0c9f;
        }
    </style>
    <div class="container px-5">
        <div class="flex items-center py-2 overflow-x-auto whitespace-nowrap">
            <a href="#" class="text-gray-300  hover:underline text-sm">
                Pages
            </a>

            <span class="mx-1 text-gray-500">
                /
            </span>

            <a href="#" class="text-gray-600 hover:underline text-sm">
                Dashboard
            </a>
        </div>
        <h5 class="font-bold text-md">Dashboard</h5>
        <div class="row justify-content-start px-3">
            <div class="col-md-12">
                <div class="main mt-5">
                    <div class="data-main flex items-center gap-3">
                        <div class="data py-2 px-3 bg-white rounded-md flex items-center justify-between shadow-sm"
                            style="width: 18rem">
                            <div class="angka">
                                <p class="font-normal mb-0" style="font-size:14px">Jumlah User</p>
                                <p class="font-bold mb-0" style="font-size: 18px">{{ $userCount }}</p>
                            </div>
                            <div class="icon py-2 px-2 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="white" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                </svg>
                            </div>
                        </div>
                        <div class="data py-2 px-3 bg-white rounded-md flex items-center justify-between shadow-sm"
                            style="width: 18rem">
                            <div class="angka">
                                <p class="font-normal mb-0" style="font-size:14px">Jumlah Course</p>
                                <p class="font-bold mb-0" style="font-size: 18px">{{ $courseCount }}</p>
                            </div>
                            <div class="icon py-2 px-2 rounded-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="white" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                </svg>


                            </div>
                        </div>
                    </div>
                    <div class="flex items-center mt-5  px-4 py-3 bg-white shadow-md rounded-md">
                        <section class="container px-4 mx-auto">
                            <h2 class="text-lg font-medium text-gray-800">Users</h2>
                            <div class="flex flex-col mt-6">
                                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                        <div class="overflow-hidden border border-gray-200 md:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col"
                                                            class="py-3.5 px-4 text-sm font-normal text-left text-gray-500">
                                                            Name
                                                        </th>
                                                        <th scope="col"
                                                            class="px-12 py-3.5 text-sm font-normal text-left text-gray-500">
                                                            Email
                                                        </th>
                                                        <th scope="col"
                                                            class="px-4 py-3.5 text-sm font-normal text-left text-gray-500">
                                                            History Course
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    @foreach ($users as $user)
                                                        <tr>
                                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                                {{ $user->name }}
                                                            </td>
                                                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                                                {{ $user->email }}
                                                            </td>
                                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                                {{-- You can customize how you display user's course history here --}}
                                                                {{ count($user->courses) }} Courses
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between mt-6">
                                {{-- Previous and Next pagination links --}}
                                <a href="#"
                                    class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                                    </svg>
                                    <span>Previous</span>
                                </a>

                                <div class="items-center hidden md:flex gap-x-3">
                                    <a href="#"
                                        class="px-2 py-1 text-sm text-blue-500 rounded-md  bg-blue-100/60">1</a>
                                    {{-- Pagination links --}}
                                </div>

                                <a href="#"
                                    class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100">
                                    <span>Next</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
