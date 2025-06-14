<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unione</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        /* Perbaikan z-index untuk dropdown */
        #user-dropdown {
            z-index: 1000;
        }

        /* Pastikan carousel berada di belakang dropdown */
        #carousel {
            z-index: 1;
        }
    </style>
</head>


<body class="bg-white">
    <!-- Header -->
    <header>
        <nav class="fixed top-0 w-full z-50 flex items-center justify-between p-2 bg-black">
            <!-- Logo -->
            <div class="Logo">
                <a href="beranda.html"><img src="images/logoputihtest.png" alt="Logo Website" width="80" /></a>
            </div>

            <!-- Search Bar -->
            <form action="{{ route('courses.index') }}" method="GET" class="flex items-center space-x-2 flex-grow ml-4 max-w-full">
                <input type="search" name="search"
                    value="{{ request('search') }}"
                    class="p-1 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                    placeholder="Search..." />
                <button type="submit" class="p-1.5 text-white bg-ghost rounded-full hover:bg-ghost transition duration-200 text-xs">
                    <i class="ri-search-line text-white"></i>
                </button>
            </form>

            <!-- Navigation Links -->
            <ul class="flex space-x-4 mx-4 text-lg">
                <li>
                    <a href="course-user.html"
                        class="text-gray-400 relative group hover:text-gray-500 border-b-2 border-transparent group-active:border-b-2 group-active:border-white"
                        id="course">
                        Course
                    </a>
                </li>
                <li>
                    <a href="jobs.html"
                        class="text-white relative group hover:text-gray-500 border-b-2 border-transparent group-active:border-b-2 group-active:border-white"
                        id="job">
                        Job
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                    </a>
                </li>
                <li>
                    <a href="komunitas/community.html"
                        class="text-white relative group hover:text-gray-500 border-b-2 border-transparent group-active:border-b-2 group-active:border-white"
                        id="community">
                        Community
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                    </a>
                </li>
                <li>
                    <a href="register.html"
                        class="text-white relative group hover:text-gray-500 border-b-2 border-transparent group-active:border-b-2 group-active:border-white"
                        id="news">
                        News
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                    </a>
                </li>
            </ul>

            <!-- Profile Section -->
            <div class="relative flex items-center">
                <!-- Profile Button -->
                <button type="button"
                    class="flex items-center space-x-2 text-sm text-white focus:outline-none px-3 py-2 bg-ghost rounded-md"
                    id="user-menu-button">
                    <img class="w-8 h-8 rounded-full object-cover object-center"
                        src="https://plus.unsplash.com/premium_photo-1689977968861-9c91dbb16049?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="User Photo">
                    <span class="hidden sm:block text-sm">Andreas kalista</span>
                </button>

                <!-- Dropdown Menu -->
                <div id="user-dropdown"
                    class="absolute right-0 hidden w-40 text-sm list-none bg-white divide-y divide-gray-200 rounded-lg shadow"
                    style="top: 40px;">
                    <div class="px-3 py-2">
                        <a href="profileawal.html" class="block text-sm text-black">Andreas kalista</a>
                        <a class="block text-xs text-gray-500 truncate">name@flowbite.com</a>
                    </div>
                    <ul class="py-1">
                        <li>
                            <a href="#" class="block px-3 py-1 text-xs text-black hover:bg-gray-200">
                                <i class="ri-message-2-line mr-2"></i>Message
                            </a>
                        </li>
                        <li>
                        <li>
                            <a href="connection.html" class="block px-3 py-1 text-xs tect-black hover:bg-gray-200">
                                <i class="ri-team-line mr-2"></i>Connection
                            </a>
                        </li>
                        <a href="setting.html" class="block px-3 py-1 text-xs text-black hover:bg-gray-200">
                            <i class="ri-settings-3-line mr-2"></i>Settings
                        </a>
                        </li>
                        <li>
                            <a href="FAQ.html" class="block px-3 py-1 text-xs text-black hover:bg-gray-200">
                                <i class="ri-question-line mr-2"></i>FAQ
                            </a>
                        </li>
                        <li>
                            <a href="notification.html" class="block px-3 py-1 text-xs text-black hover:bg-gray-200">
                                <i class="ri-notification-line mr-2"></i>Notifications
                            </a>
                        </li>
                        <li>
                            <a href="index.html" class="block px-3 py-1 text-xs text-black hover:bg-gray-200">
                                <i class="ri-logout-box-line mr-2"></i>Sign out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Script -->
    <script>
        const userMenuButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');

        // Toggle dropdown visibility on button click
        userMenuButton.addEventListener('click', () => {
            userDropdown.classList.toggle('hidden');
        });

        // Hide dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
                userDropdown.classList.add('hidden');
            }
        });
    </script>


    <!-- Navbar End -->

    <!-- Carousel Section -->
    <div class="relative w-full h-[384px] overflow-hidden">
        <div class="flex transition-transform duration-700 ease-in-out" id="carousel">
            <div class="flex-shrink-0 w-full">
                <img src="images/header-kursus2.jpg" alt="Slide 3" class="w-full h-auto">
            </div>
        </div>
    </div>

    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-semibold">Courses</h1>
            <a href="{{ route('courses.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Add New Course
            </a>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($courses as $course)
            <div class="max-w-xs rounded overflow-hidden shadow-md bg-white">
                <img class="w-full h-32 object-cover"
                    src="{{ asset('photos/' . ($course->thumbnail ?? 'default.jpg')) }}"
                    alt="Course Thumbnail">
                <div class="px-4 py-2">
                    <h2 class="font-bold text-lg mb-2">{{ $course->title }}</h2>
                    <div class="flex items-center space-x-2">
                        <img class="w-8 h-8 rounded-full object-cover"
                            src="{{ asset('photos/header-kursus2.jpg') }}" alt="User Avatar">
                        <h3 class="font-bold text-sm">{{ $course->user->name ?? 'Instructor' }}</h3>
                    </div>
                    <p class="text-gray-600 text-sm mt-1">{{ $course->description }}</p>
                </div>
                <div class="px-4 pt-2 pb-1 flex justify-between items-center">
                    <a href="{{ route('courses.show', ['course_id' => $course->course_id]) }}"
                        class="bg-blue-500 text-white text-sm px-3 py-1 rounded hover:bg-blue-700">
                        Cek sekarang
                    </a>

                    <div class="flex space-x-4">
                        <a href="{{ route('courses.edit', ['course_id' => $course->course_id]) }}"
                            class="text-blue-500 text-sm hover:underline">Edit</a>
                        <form action="{{ route('courses.destroy', ['course_id' => $course->course_id]) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus course ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 text-sm hover:underline pb-1">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-gray-500 text-sm col-span-4 text-center">Belum ada course yang ditambahkan.</p>
            @endforelse
        </div>
    </div>
    </div>
    </div>

    <footer>
        <p align="center">Copyright @2025</p>
        <p align="center">Unione</p>
    </footer>

</body>

</html>