@extends('layouts.admin')

@section('content')
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
    <style>
        .data .icon {
            background-color: #cb0c9f;
        }
    </style>
    <div class="container">
        <div class="flex items-center py-2 overflow-x-auto whitespace-nowrap">
            <a href="#" class="text-gray-300  hover:underline text-sm">
                Pages
            </a>

            <span class="mx-1 text-gray-500">
                /
            </span>

            <a href="#" class="text-gray-600 hover:underline text-sm">
                Add Course
            </a>
        </div>
        <h5 class="font-bold text-md">Add Course</h5>
        <div class="row justify-content-start px-3">
            <div class="flex  gap-5">
                <div class="addcourse mt-5 bg-white px-5 py-5 shadow-md rounded-md flex items-center">
                    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data"
                        class="max-w-sm mx-auto">
                        @csrf
                        <div class="mb-5">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">Title</label>
                            <input type="text" id="title" name="title"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Course Title" required />
                        </div>
                        <div class="mb-5">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                            <textarea id="description" name="description" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Write description here..." required></textarea>
                        </div>
                        <div class="mb-5">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                            <input type="number" id="price" name="price"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Course Price" required step="0.01" />
                        </div>
                        <div class="mb-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="image">Upload Image</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                                id="image" name="image" type="file" required>
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add
                            Course</button>
                    </form>

                </div>
                <div class="schedules mt-5 bg-white px-5 py-5 shadow-md rounded-md">
                    <form action="{{ route('courses.add-schedule') }}" method="POST" class="max-w-sm mx-auto">
                        @csrf
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Add Schedule</label>
                            <select id="countries" name="course_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a Schedule</option>
                                @foreach ($courses as $course)
                                    <option value=" {{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="start_datetime" class="block mb-2 text-sm font-medium text-gray-900">Start Date and
                                Time</label>
                            <input type="text" id="start_datetime" name="start_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date and time">
                        </div>
                        <div class="mb-5">
                            <label for="end_datetime" class="block mb-2 text-sm font-medium text-gray-900">End Date and
                                Time</label>
                            <input type="text" id="end_datetime" name="end_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date and time">
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add
                            Schedule</button>
                    </form>
                </div>
            </div>
            <div class="table mb-[5rem] px-2 py-2 bg-white shadow-md mt-5">
                <section class="container px-4 mx-auto">
                    <h2 class="text-lg font-medium text-gray-800">Data Course</h2>
                    <div class="flex flex-col mt-6">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden border border-gray-200  md:rounded-lg">

                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                    <span>Title</span>
                                                </th>
                                                <th scope="col"
                                                    class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                    Description
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                    Image
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                    Schedule Start
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                    Schedule End
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($courses as $course)
                                                <tr>
                                                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                        {{ $course->title }}
                                                    </td>
                                                    <td class="px-4 py-4 text-sm font-medium ">
                                                        {{ $course->description }}
                                                    </td>
                                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                        <img src="{{ asset('storage/' . $course->image) }}"
                                                            alt="{{ $course->title }}" class=" h-16 object-cover">
                                                    </td>
                                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                        @if ($course->schedules->isNotEmpty())
                                                            {{ \Carbon\Carbon::parse($course->schedules->first()->start_date)->format('D, H:i') }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                        @if ($course->schedules->isNotEmpty())
                                                            {{ \Carbon\Carbon::parse($course->schedules->first()->end_date)->format('D, H:i') }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td
                                                        class="px-4 py-4 text-sm whitespace-nowrap flex items-center justify-center gap-2">
                                                        <form action="{{ route('courses.destroy', $course->id) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="px-2 py-1 bg-red-500 text-white rounded-md hover:text-red-100"
                                                                onclick="return confirm('Are you sure you want to delete this course?');">
                                                                Delete
                                                            </button>
                                                        </form>
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
                        <a href="#"
                            class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                            </svg>

                            <span>
                                previous
                            </span>
                        </a>

                        <div class="items-center hidden md:flex gap-x-3">
                            <a href="#" class="px-2 py-1 text-sm text-blue-500 rounded-md  bg-blue-100/60">1</a>
                        </div>

                        <a href="#"
                            class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100">
                            <span>
                                Next
                            </span>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- Initialize flatpickr for datetime inputs -->
    <script>
        flatpickr("#start_datetime", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true,
        });

        flatpickr("#end_datetime", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true,
        });
    </script>
@endsection
