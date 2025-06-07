<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ Auth::user()->name }} | Profile - Unione</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Add Alpine.js for better interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100" x-data="{ 
    showEditProfile: false,
    showEditAbout: false
}">
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


    <!-- Main Content -->
    <div class="pt-20 pb-12 px-4">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Left Column -->
            <div class="md:col-span-1 space-y-6">
                <!-- Profile Card -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <form action="{{ route('profile.update-cover') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="h-24 bg-gradient-to-r from-blue-500 to-blue-600 relative">
                            <input type="file" id="cover_photo" name="cover_photo" class="hidden" accept="image/*">
                            <button type="button" onclick="document.getElementById('cover_photo').click()" 
                                    class="absolute bottom-2 right-2 bg-white/80 p-2 rounded-full hover:bg-white">
                                <i class="ri-camera-line text-gray-700"></i>
                            </button>
                        </div>
                    </form>

                    <div class="relative px-4 pb-4">
                        <form action="{{ route('profile.update-avatar') }}" method="POST" enctype="multipart/form-data" id="avatarForm">
                            @csrf
                            <div class="relative -mt-12 mb-3">
                                @if($profile->avatar)
                                    <img src="{{ asset('avatars/' . $profile->avatar) }}" 
                                         alt="Profile Picture"
                                         class="w-24 h-24 rounded-full border-4 border-white shadow-md object-cover mx-auto">
                                @else
                                    <img src="{{ asset('images/default-avatar.png') }}" 
                                         alt="Profile Picture"
                                         class="w-24 h-24 rounded-full border-4 border-white shadow-md object-cover mx-auto">
                                @endif
                                <input type="file" id="avatar" name="avatar" class="hidden" accept="image/*" onchange="document.getElementById('avatarForm').submit()">
                                <button type="button" onclick="document.getElementById('avatar').click()"
                                        class="absolute bottom-0 right-1/3 bg-white p-1.5 rounded-full shadow-md hover:bg-gray-50">
                                    <i class="ri-camera-line text-gray-700"></i>
                                </button>
                            </div>
                        </form>

                        <div class="text-center">
                            <h2 class="text-xl font-bold">{{ Auth::user()->name }}</h2>
                            <p class="text-gray-600 text-sm">{{ Auth::user()->profile->headline ?? 'Add your headline' }}</p>
                            <p class="text-gray-500 text-sm mt-1">
                                <i class="ri-map-pin-line"></i> {{ Auth::user()->profile->location ?? 'Add location' }}
                            </p>
                        </div>

                        <div class="mt-4 space-y-2">
                            <button @click="showEditProfile = true"
                                class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                                Edit Profile
                            </button>
                            <button class="w-full px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-200">
                                Share Profile
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Stats Card -->
                <div class="bg-white rounded-xl shadow-sm p-4">
                    <h3 class="font-semibold mb-4 flex items-center">
                        <i class="ri-bar-chart-box-line mr-2"></i> Your Stats
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center p-2 hover:bg-gray-50 rounded">
                            <span class="text-gray-600">Profile views</span>
                            <div class="flex items-center">
                                <span class="font-semibold">1,234</span>
                                <span class="text-green-500 text-xs ml-2">+12%</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center p-2 hover:bg-gray-50 rounded">
                            <span class="text-gray-600">Course completions</span>
                            <div class="flex items-center">
                                <span class="font-semibold">15</span>
                                <div class="ml-2 w-20 bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-600 h-2 rounded-full" style="width: 75%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between items-center p-2 hover:bg-gray-50 rounded">
                            <span class="text-gray-600">Connections</span>
                            <span class="font-semibold">289</span>
                        </div>
                    </div>
                </div>

                <!-- Skills Section -->
                <div class="bg-white rounded-xl shadow-sm p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-semibold">Skills</h3>
                        <a href="{{ route('profile.skill.create') }}" 
                           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Add Skill
                        </a>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @forelse($profile->skills as $skill)
                            <div class="bg-gray-100 rounded-lg p-2">
                                <div class="flex justify-between items-center">
                                    <span class="font-medium">{{ $skill->name }}</span>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('profile.skill.edit', $skill->id) }}" 
                                           class="text-blue-600 hover:text-blue-700">
                                            <i class="ri-edit-line"></i>
                                        </a>
                                        <form action="{{ route('profile.skill.delete', $skill->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-700">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600">{{ $skill->proficiency_level }}</p>
                                @if($skill->years_of_experience)
                                    <p class="text-xs text-gray-500">{{ $skill->years_of_experience }} years</p>
                                @endif
                            </div>
                        @empty
                            <p class="text-gray-500 text-center w-full py-4">No skills added yet</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="md:col-span-3 space-y-6">
                <!-- About Section -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold">About</h2>
                        <button @click="showEditAbout = true" class="text-blue-600 hover:text-blue-700">
                            <i class="ri-edit-line text-lg"></i>
                        </button>
                    </div>
                    <p class="text-gray-700 leading-relaxed">
                        {{ Auth::user()->profile->about ?? 'Add your bio' }}
                    </p>
                </div>

                <!-- Experience Section -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold">Experience</h2>
                        <a href="{{ route('profile.experience.create') }}" 
                           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Add Experience
                        </a>
                    </div>
                    <div class="space-y-4">
                        @forelse($profile->experiences as $experience)
                        <div class="border rounded-lg p-4">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="font-semibold">{{ $experience->position }}</h3>
                                    <p class="text-sm text-gray-600">{{ $experience->company_name }}</p>
                                    <p class="text-sm text-gray-500">
                                        {{ $experience->start_date->format('M Y') }} - 
                                        {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}
                                    </p>
                                </div>
                                <div class="flex space-x-2">
                                    <button @click="showEditExperience = true" class="text-blue-600 hover:text-blue-700">
                                        <i class="ri-edit-line"></i>
                                    </button>
                                    <form action="{{ route('profile.experience.delete', $experience->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-700">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @if($experience->description)
                            <p class="text-sm text-gray-600 mt-2">{{ $experience->description }}</p>
                            @endif
                        </div>
                        @empty
                        <p class="text-gray-500 text-center py-4">Add your work experience</p>
                        @endforelse
                    </div>
                </div>

                <!-- Education Section -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold">Education</h2>
                        <a href="{{ route('profile.education.create') }}" 
                           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Add Education
                        </a>
                    </div>
                    <div class="space-y-4">
                        @forelse($profile->educations as $education)
                        <div class="border rounded-lg p-4">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="font-semibold">{{ $education->school_name }}</h3>
                                    <p class="text-sm text-gray-600">{{ $education->degree }}, {{ $education->major }}</p>
                                    <p class="text-sm text-gray-500">
                                        {{ $education->start_year }} - {{ $education->end_year ?? 'Present' }}
                                    </p>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="{{ route('profile.education.edit', $education->id) }}" 
                                       class="text-blue-600 hover:text-blue-700">
                                        <i class="ri-edit-line"></i> Edit
                                    </a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="text-gray-500 text-center py-4">Add your education</p>
                        @endforelse
                    </div>
                </div>

                <!-- Certificates Section -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold">Certificates</h2>
                        <a href="{{ route('profile.certification.create') }}" 
                           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Add Certificate
                        </a>
                    </div>
                    <div class="space-y-4">
                        @forelse($profile->certifications as $certification)
                        <div class="border rounded-lg p-4">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="font-semibold">{{ $certification->title }}</h3>
                                    <p class="text-sm text-gray-600">{{ $certification->issuing_organization }}</p>
                                    <p class="text-sm text-gray-500">
                                        {{ $certification->issued_date ? $certification->issued_date->format('M Y') : 'Not specified' }} - 
                                        {{ $certification->expiration_date ? $certification->expiration_date->format('M Y') : 'No expiration' }}
                                    </p>
                                </div>
                                <div class="flex space-x-2">
                                    <button @click="showEditCertification = true" class="text-blue-600 hover:text-blue-700">
                                        <i class="ri-edit-line"></i>
                                    </button>
                                    <form action="{{ route('profile.certification.delete', $certification->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-700">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="text-gray-500 text-center py-4">Add your certifications</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div x-show="showEditProfile" 
         class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
         x-cloak>
        <div class="bg-white rounded-xl max-w-md w-full mx-4 p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Edit Profile</h3>
                <button @click="showEditProfile = false" class="text-gray-500 hover:text-gray-700">
                    <i class="ri-close-line text-xl"></i>
                </button>
            </div>
            <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Headline</label>
                    <input type="text" name="headline" value="{{ Auth::user()->profile->headline ?? '' }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" name="location" value="{{ Auth::user()->profile->location ?? '' }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700">
                    Save Changes
                </button>
            </form>
        </div>
    </div>

    <!-- Add Experience Modal -->
    <div x-show="showAddExperience" 
         class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
         x-cloak>
        <div class="bg-white rounded-xl max-w-md w-full mx-4 p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Add Experience</h3>
                <button @click="showAddExperience = false" class="text-gray-500 hover:text-gray-700">
                    <i class="ri-close-line text-xl"></i>
                </button>
            </div>
            <form action="{{ route('profile.experience.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Position</label>
                    <input type="text" name="position" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Company</label>
                    <input type="text" name="company_name" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input type="month" name="start_date" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">End Date</label>
                        <input type="month" name="end_date"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" rows="3"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700">
                    Add Experience
                </button>
            </form>
        </div>
    </div>

    <!-- Add Education Modal -->
    <div x-show="showAddEducation" 
         class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
         x-cloak>
        <div class="bg-white rounded-xl max-w-md w-full mx-4 p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Add Education</h3>
                <button @click="showAddEducation = false" class="text-gray-500 hover:text-gray-700">
                    <i class="ri-close-line text-xl"></i>
                </button>
            </div>
            <form action="{{ route('profile.education.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">School Name</label>
                    <input type="text" name="school_name" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Degree</label>
                        <input type="text" name="degree"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Major</label>
                        <input type="text" name="major"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Start Year</label>
                        <input type="number" name="start_year" min="1900" max="2099" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">End Year</label>
                        <input type="number" name="end_year" min="1900" max="2099"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700">
                    Add Education
                </button>
            </form>
        </div>
    </div>

    <!-- Add Skill Modal -->
    <div x-show="showAddSkill" 
         class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
         x-cloak>
        <div class="bg-white rounded-xl max-w-md w-full mx-4 p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Add Skill</h3>
                <button @click="showAddSkill = false" class="text-gray-500 hover:text-gray-700">
                    <i class="ri-close-line text-xl"></i>
                </button>
            </div>
            <form action="{{ route('profile.skill.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Skill Name</label>
                    <input type="text" name="name" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Proficiency Level</label>
                    <select name="proficiency_level" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Advanced">Advanced</option>
                        <option value="Expert">Expert</option>
                    </select>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700">
                    Add Skill
                </button>
            </form>
        </div>
    </div>

    <!-- Edit About Modal -->
    <div x-show="showEditAbout" 
         class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
         x-cloak>
        <div class="bg-white rounded-xl max-w-md w-full mx-4 p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Edit About</h3>
                <button @click="showEditAbout = false" class="text-gray-500 hover:text-gray-700">
                    <i class="ri-close-line text-xl"></i>
                </button>
            </div>
            <form action="{{ route('profile.update-about') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700">About You</label>
                    <textarea name="about" rows="4" required
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ Auth::user()->profile->about }}</textarea>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700">
                    Save Changes
                </button>
            </form>
        </div>
    </div>

    <!-- Edit Experience Modal -->
    <div x-show="showEditExperience" 
         class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
         x-cloak>
        <div class="bg-white rounded-xl max-w-md w-full mx-4 p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Edit Experience</h3>
                <button @click="showEditExperience = false" class="text-gray-500 hover:text-gray-700">
                    <i class="ri-close-line text-xl"></i>
                </button>
            </div>
            <form action="{{ route('profile.experience.update', $experience->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700">Position</label>
                    <input type="text" name="position" value="{{ $experience->position }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Company</label>
                    <input type="text" name="company_name" value="{{ $experience->company_name }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input type="month" name="start_date" value="{{ $experience->start_date->format('Y-m') }}" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">End Date</label>
                        <input type="month" name="end_date" value="{{ $experience->end_date ? $experience->end_date->format('Y-m') : '' }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" rows="3"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ $experience->description }}</textarea>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700">
                    Save Changes
                </button>
            </form>
        </div>
    </div>

    <!-- Edit Education Modal -->
    <div x-show="showEditEducation" 
         class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
         x-cloak>
        <div class="bg-white rounded-xl max-w-md w-full mx-4 p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Edit Education</h3>
                <button @click="showEditEducation = false" class="text-gray-500 hover:text-gray-700">
                    <i class="ri-close-line text-xl"></i>
                </button>
            </div>
            <form action="{{ route('profile.education.update', $education->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700">School Name</label>
                    <input type="text" name="school_name" value="{{ $education->school_name }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Degree</label>
                        <input type="text" name="degree" value="{{ $education->degree }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Major</label>
                        <input type="text" name="major" value="{{ $education->major }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Start Year</label>
                        <input type="number" name="start_year" min="1900" max="2099" value="{{ $education->start_year }}" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">End Year</label>
                        <input type="number" name="end_year" min="1900" max="2099" value="{{ $education->end_year }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700">
                    Save Changes
                </button>
            </form>
        </div>
    </div>

    <!-- Edit Skill Modal -->
    <div x-show="showEditSkill" 
         class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
         x-cloak>
        <div class="bg-white rounded-xl max-w-md w-full mx-4 p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Edit Skill</h3>
                <button @click="showEditSkill = false" class="text-gray-500 hover:text-gray-700">
                    <i class="ri-close-line text-xl"></i>
                </button>
            </div>
            <form action="{{ route('profile.skill.update', $skill->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700">Skill Name</label>
                    <input type="text" name="name" value="{{ $skill->name }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Proficiency Level</label>
                    <select name="proficiency_level" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="Beginner" @if($skill->proficiency_level == 'Beginner') selected @endif>Beginner</option>
                        <option value="Intermediate" @if($skill->proficiency_level == 'Intermediate') selected @endif>Intermediate</option>
                        <option value="Advanced" @if($skill->proficiency_level == 'Advanced') selected @endif>Advanced</option>
                        <option value="Expert" @if($skill->proficiency_level == 'Expert') selected @endif>Expert</option>
                    </select>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700">
                    Save Changes
                </button>
            </form>
        </div>
    </div>

    <!-- Edit Certification Modal -->
    <div x-show="showEditCertification" 
         class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
         x-cloak>
        <div class="bg-white rounded-xl max-w-md w-full mx-4 p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Edit Certification</h3>
                <button @click="showEditCertification = false" class="text-gray-500 hover:text-gray-700">
                    <i class="ri-close-line text-xl"></i>
                </button>
            </div>
            <form action="{{ route('profile.certification.update', $certification->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" value="{{ $certification->title }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Issuing Organization</label>
                    <input type="text" name="issuing_organization" value="{{ $certification->issuing_organization }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Issued Date</label>
                        <input type="month" name="issued_date" value="{{ $certification->issued_date->format('Y-m') }}" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Expiration Date</label>
                        <input type="month" name="expiration_date" value="{{ $certification->expiration_date ? $certification->expiration_date->format('Y-m') : '' }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white rounded-lg px-4 py-2 hover:bg-blue-700">
                    Save Changes
                </button>
            </form>
        </div>
    </div>

    <!-- Alpine.js Initialization -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('profile', () => ({
                showEditProfile: false,
                showEditAbout: false,
                showAddExperience: false,
                showAddEducation: false,
                showAddSkill: false,
                showEditExperience: false,
                showEditEducation: false,
                showEditSkill: false,
                showEditCertification: false,
            }))
        })
    </script>
</body>

</html>