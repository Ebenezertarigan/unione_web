<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Unione - Professional Learning Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>
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
                    <a href="{{ route('courses.index') }}"
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
                        src="{{ Auth::user()->foto ? asset('photos/profiles/'.Auth::user()->foto) : asset('images/default-avatar.png') }}"
                        alt="{{ Auth::user()->name }}">
                    <span class="hidden sm:block text-sm">{{ Auth::user()->name }}</span>
                </button>

                <!-- Dropdown Menu -->
                <div id="user-dropdown"
                    class="absolute right-0 hidden w-40 text-sm list-none bg-white divide-y divide-gray-200 rounded-lg shadow"
                    style="top: 40px;">
                    <div class="px-3 py-2">
                        <a href="{{ route('profile.show') }}" class="block text-sm text-gray-900 hover:text-blue-600">
                            {{ Auth::user()->name }}
                        </a>
                        <a class="block text-xs text-gray-500 truncate">
                            {{ Auth::user()->email }}
                        </a>
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

    <div class="max-w-2xl mx-auto py-12">
    <h2 class="text-2xl font-bold m-6">Edit Post</h2>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul class="list-disc pl-6">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block font-medium">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:ring-blue-500" required>
        </div>

        <div>
            <label for="content" class="block font-medium">Content</label>
            <textarea name="content" id="content" rows="5"
                class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:ring-blue-500" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <div>
            <label for="image" class="block font-medium">Image (optional)</label>
            @if ($post->image)
                <img src="{{ asset('storage/posts/' . $post->image) }}" alt="Current image" class="mb-2 h-48 rounded">
            @endif
            <input type="file" name="image" id="image" class="w-full">
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('home.homeindex') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
</body>
</html>