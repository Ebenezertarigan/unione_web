<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ isset($post) ? 'Edit Post' : 'Create Post' }} - Unione</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

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

    <main class="pt-20 max-w-3xl mx-auto px-6 pb-10">
        <h1 class="text-3xl font-semibold mb-8">{{ isset($post) ? 'Edit Post' : 'Create New Post' }}</h1>

        @if ($errors->any())
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            <strong class="font-bold">Oops! There are some errors:</strong>
            <ul class="list-disc list-inside mt-2">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form
            action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="bg-white rounded-lg shadow p-8">
            @csrf
            @if(isset($post))
            @method('PUT')
            @endif

            {{-- Title --}}
            <div class="mb-6">
                <label for="title" class="block mb-2 font-medium text-gray-700">Title <span class="text-red-600">*</span></label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $post->title ?? '') }}"
                    placeholder="Enter your post title"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500
          @error('title') border-red-500  @enderror"
                    required />
                @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Content --}}
            <div class="mb-6">
                <label for="content" class="block mb-2 font-medium text-gray-700">Content <span class="text-red-600">*</span></label>
                <textarea
                    id="content"
                    name="content"
                    rows="6"
                    placeholder="Write your post content here..."
                    class="w-full px-4 py-3 border rounded-md resize-y focus:outline-none focus:ring-2 focus:ring-blue-500
          @error('content') border-red-500  @enderror"
                    required>{{ old('content', $post->content ?? '') }}</textarea>
                @error('content')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image Upload --}}
            <div class="mb-6">
                <label for="image" class="block mb-2 font-medium text-gray-700">Upload Image (optional)</label>

                @if(isset($post) && $post->image)
                <div class="mb-3">
                    <p class="text-sm text-gray-600 mb-1">Current Image:</p>
                    <img
                        src="{{ asset('storage/posts/' . $post->image) }}"
                        alt="Current image"
                        class="max-w-xs rounded-md shadow"
                        id="current-image" />
                </div>
                @endif

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept="image/*"
                    class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4
          file:rounded file:border-0 file:text-sm file:font-semibold
          file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100
          @error('image') border-red-500 @enderror"
                    onchange="previewImage(event)" />
                @error('image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <div class="mt-4">
                    <p class="text-sm text-gray-600 mb-1">Preview:</p>
                    <img id="preview" src="#" alt="Image Preview" class="max-w-xs rounded-md shadow hidden" />
                </div>
            </div>

            {{-- Buttons --}}
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="px-6 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">Cancel</a>
                <button
                    type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    {{ isset($post) ? 'Update Post' : 'Create Post' }}
                </button>
            </div>
        </form>
    </main>

    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const currentImage = document.getElementById('current-image');
            const file = event.target.files[0];
            if (!file) {
                preview.src = '#';
                preview.classList.add('hidden');
                if (currentImage) currentImage.classList.remove('hidden');
                return;
            }
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                if (currentImage) currentImage.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }
    </script>

</body>

</html>