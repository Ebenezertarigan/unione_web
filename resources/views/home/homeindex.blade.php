<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Unione - Professional Learning Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body class="bg-[#F3F2EF]">
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
                    </a>
                </li>
                <li>
                    <a href="komunitas/community.html"
                        class="text-white relative group hover:text-gray-500 border-b-2 border-transparent group-active:border-b-2 group-active:border-white"
                        id="community">
                        Community
                    </a>
                </li>
                <li>
                    <a href="register.html"
                        class="text-white relative group hover:text-gray-500 border-b-2 border-transparent group-active:border-b-2 group-active:border-white"
                        id="news">
                        News
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
                            <a href="connection.html" class="block px-3 py-1 text-xs text-black hover:bg-gray-200">
                                <i class="ri-team-line mr-2"></i>Connection
                            </a>
                        </li>
                        <li>
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
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>

                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="block px-3 py-1 text-xs text-black hover:bg-gray-200">
                                <i class="ri-logout-box-line mr-2"></i>Sign out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Script for dropdown -->
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

    <!-- Main content -->
    <main class="pt-20 max-w-7xl mx-auto px-4 mt-1">

        <!-- Create Post Button -->
        <div class="bg-white rounded-lg shadow p-4 mb-6">
            <div class="flex items-center space-x-4">
                <!-- Foto Profil -->
                <img src="{{ Auth::user()->foto ? asset('photos/profiles/' . Auth::user()->foto) : asset('images/default-avatar.png') }}"
                    class="w-10 h-10 rounded-full object-cover" alt="{{ Auth::user()->name }}">

                <!-- Tombol Start Post -->
                <a href="{{ route('posts.create') }}"
                    class="flex-grow bg-gray-100 hover:bg-gray-200 text-gray-600 px-4 py-2 rounded-full transition text-sm">
                    Tambah post Anda
                </a>

                <!-- Icon opsional -->
                <a href="{{ route('posts.create') }}"
                    class="text-gray-400 hover:text-gray-600 transition text-xl">
                    <i class="ri-add-line"></i>
                </a>
            </div>
        </div>

        <!-- Posts Feed -->
        <div class="space-y-6">
            @foreach ($posts as $post)
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <img src="{{ $post->user->foto ? asset('photos/profiles/'.$post->user->foto) : asset('images/default-avatar.png') }}"
                            class="w-10 h-10 rounded-full object-cover" alt="{{ $post->user->name }}" />
                        <div>
                            <h3 class="font-semibold">{{ $post->user->name }}</h3>
                            <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @if ($post->user_id === Auth::id())
                    <div class="relative">
                        <button onclick="toggleDropdown('post-{{ $post->id }}-dropdown')" class="text-gray-400 hover:text-gray-600">
                            <i class="ri-more-2-fill"></i>
                        </button>
                        <div id="post-{{ $post->id }}-dropdown" class="hidden absolute right-0 mt-2 w-40 bg-white rounded shadow-lg z-50">
                            <a href="{{ route('posts.edit', $post->id) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                Edit
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this post?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>

                <p class="mt-4 text-gray-700 whitespace-pre-wrap">{{ $post->content }}</p>

                @if ($post->image)
                <img src="{{ asset('storage/posts/' . $post->image) }}" alt="Post image" class="mt-4 rounded-lg max-h-96 w-full object-cover" />
                @endif

                <div class="flex space-x-4 mt-4 pt-4 border-t text-gray-500">
                    <button
                        class="like-btn flex items-center space-x-1 cursor-pointer 
      {{ optional($post->likedByUsers)->contains(Auth::id()) ? 'text-blue-600' : 'text-gray-400' }}"
                        data-post-id="{{ $post->id }}">
                        <i class="ri-thumb-up-line"></i>
                        <span class="likes-count">{{ $post->likes->count() }}</span>
                    </button>
                </div>
                <!-- Comments Section -->
                <div class="mt-4 border-t pt-4 space-y-3">
                    @foreach ($post->comments as $comment)
                    <div class="flex space-x-3">
                        <img src="{{ $comment->user->foto ? asset('photos/profiles/'.$comment->user->foto) : asset('images/default-avatar.png') }}"
                            class="w-8 h-8 rounded-full object-cover" alt="{{ $comment->user->name }}">
                        <div>
                            <p class="text-sm"><strong>{{ $comment->user->name }}</strong></p>
                            <p class="text-gray-700 text-sm">{{ $comment->content }}</p>
                            <p class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @endforeach

                    <!-- Form Add Comment -->
                    <form action="{{ route('comments.store') }}" method="POST" class="mt-3 flex space-x-2">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="text" name="content" placeholder="Add a comment..." required
                            class="flex-grow border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition text-sm">
                            Send
                        </button>
                    </form>
                </div>
            </div>
            @endforeach

            <!-- Pagination -->
            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        </div>
    </main>

    <!-- Like Button Script -->
    <script>
        document.querySelectorAll('.like-btn').forEach(button => {
            button.addEventListener('click', function() {
                const postId = this.dataset.postId;
                const likesCountSpan = this.querySelector('.likes-count');
                const token = '{{ csrf_token() }}';

                fetch(`/posts/${postId}/like`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({})
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.liked) {
                            this.classList.add('text-blue-600');
                            this.classList.remove('text-gray-400');
                        } else {
                            this.classList.add('text-gray-400');
                            this.classList.remove('text-blue-600');
                        }
                        likesCountSpan.textContent = data.likesCount;
                    })
                    .catch(error => console.error('Error:', error));
            });
        });

        // Toggle dropdown for post actions
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            if (dropdown.classList.contains('hidden')) {
                dropdown.classList.remove('hidden');
            } else {
                dropdown.classList.add('hidden');
            }
        }
    </script>
</body>

</html>