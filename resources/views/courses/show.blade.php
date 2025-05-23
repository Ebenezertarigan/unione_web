<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Video Page</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white">
    <!-- Back Button -->
    <header class="p-4 bg-black flex items-center">
        <a
            href="{{ route('courses.index') }}"
            class="flex items-center text-lg font-semibold text-white hover:underline">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 mr-2"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15 19l-7-7 7-7" />
            </svg>
            Back
        </a>
    </header>

    <!-- Main Container -->
    <div class="container mx-auto flex flex-col md:flex-row mt-4 px-4">

        <!-- Main Video Section -->
        <div class="md:w-2/3">

            <!-- Video Player -->
            <div class="bg-black rounded-lg overflow-hidden relative shadow-lg max-w-3xl mx-auto">
                <video class="w-full h-auto" controls>
                    <source src="{{ asset('videos/testvideo.mp4') }}" type="video/mp4">
                    Browser kamu tidak support video.
                </video>
            </div>
            <!-- Video Details -->
            <div class="mt-4 bg-white rounded-lg text-black p-4 shadow-md">
                <h1 class="text-2xl font-bold">
                    Stop Studying Programming
                </h1>
                <div class="flex items-center mt-3">
                    <img
                        src="https://img.freepik.com/free-vector/man-profile-account-picture_24908-81754.jpg?t=st=1733422971~exp=1733426571~hmac=e611c159389b55c60ad55b9fd92f91482e65eb7556c53999ad0a925513cf4d70&w=900"
                        alt="Profile"
                        class="w-12 h-12 rounded-full border-2 border-gray-200" />
                    <div class="ml-3">
                        <h3 class="font-semibold">Andreas Kalista</h3>
                    </div>

                    <!-- Dropdown Button for additional info -->
                    <button
                        id="dropdownButton"
                        class="ml-auto text-black bg-gray-200 rounded-lg px-3 py-1 hover:bg-gray-300 transition-all flex items-center">
                        <span>More Info</span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 ml-1"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>

                <!-- Dropdown Content for additional information -->
                <div
                    id="dropdownContent"
                    class="mt-4 bg-gray-100 rounded-lg p-3 hidden transition-all duration-300">
                    <p class="text-black text-left">
                        Welcome to an in-depth exploration of the Data Engineer
                        profession! In this video, we’ll take you on a journey through the
                        fascinating world of big data, analytics, and applied technology
                        in the tech industry.
                    </p>
                </div>
            </div>

            <script>
                // JavaScript to toggle dropdown content visibility
                const dropdownButton = document.getElementById("dropdownButton");
                const dropdownContent = document.getElementById("dropdownContent");

                dropdownButton.addEventListener("click", () => {
                    dropdownContent.classList.toggle("hidden");
                });
            </script>
        </div>

        <!-- Sidebar Section (Recommended Videos) -->
        <div class="md:w-1/3 md:pl-6 mt-6 md:mt-0">
            <h2 class="text-lg font-bold mb-4">Recommended Videos</h2>
            <div class="space-y-2">
                <!-- Smaller Video Cards (You can add more of these sections for additional content) -->

                <!-- First recommended video -->
                <div
                    class="flex items-center space-x-2 bg-white p-2 rounded-lg hover:shadow-lg hover:bg-gray-700 transition-all cursor-pointer text-black">
                    <img
                        src="https://images.unsplash.com/photo-1499673610122-01c7122c5dcb?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHByb2dyYW1taW5nfGVufDB8fDB8fHww"
                        alt="Thumbnail"
                        class="w-20 h-12 rounded" />
                    <div>
                        <h3 class="text-sm font-semibold truncate">
                            Learn about programming
                        </h3>
                        <p class="text-xs text-gray-400">100K views • 1 week ago</p>
                    </div>
                </div>

                <!-- Second recommended video -->
                <div
                    class="flex items-center space-x-2 bg-white p-2 rounded-lg hover:shadow-lg hover:bg-gray-700 transition-all cursor-pointer text-black">
                    <img
                        src="https://images.unsplash.com/photo-1607798748738-b15c40d33d57?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8cHJvZ3JhbW1pbmd8ZW58MHx8MHx8fDA%3D"
                        alt="Thumbnail"
                        class="w-20 h-12 rounded" />
                    <div>
                        <h3 class="text-sm font-semibold truncate">
                            Top 5 Skills for Data Engineers
                        </h3>
                        <p class="text-xs text-gray-400">245K views • 2 weeks ago</p>
                    </div>
                </div>

                <!-- Third recommended video -->
                <div
                    class="flex items-center space-x-2 bg-white p-2 rounded-lg hover:shadow-lg hover:bg-gray-700 transition-all cursor-pointer text-black">
                    <img
                        src="https://media.istockphoto.com/id/2148178472/photo/hispanic-programmers-collaborating-on-software-development-in-a-modern-office-setting.webp?a=1&b=1&s=612x612&w=0&k=20&c=cOn7tCfq87FzKSSp1Vn2j0b0c8Puw0eKD-GY6JKexJU="
                        alt="Thumbnail"
                        class="w-20 h-12 rounded" />
                    <div>
                        <h3 class="text-sm font-semibold truncate">
                            How to Become a Data Engineer
                        </h3>
                        <p class="text-xs text-gray-400">89K views • 1 month ago</p>
                    </div>
                </div>

                <!-- Add more recommended videos by duplicating the above div blocks -->
                <!-- Third recommended video -->
                <div
                    class="flex items-center space-x-2 bg-white p-2 rounded-lg hover:shadow-lg hover:bg-gray-700 transition-all cursor-pointer text-black">
                    <img
                        src="https://plus.unsplash.com/premium_photo-1663040543387-cb7c78c4f012?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fHByb2dyYW1taW5nfGVufDB8fDB8fHww"
                        alt="Thumbnail"
                        class="w-20 h-12 rounded" />
                    <div>
                        <h3 class="text-sm font-semibold truncate">
                            How to Become a Data Engineer
                        </h3>
                        <p class="text-xs text-gray-400">89K views • 3 month ago</p>
                    </div>
                </div>
                <!--  -->
                <!-- Third recommended video -->
                <div
                    class="flex items-center space-x-2 bg-white p-2 rounded-lg hover:shadow-lg hover:bg-gray-700 transition-all cursor-pointer text-black">
                    <img
                        src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Y29kaW5nfGVufDB8fDB8fHww"
                        alt="Thumbnail"
                        class="w-20 h-12 rounded" />
                    <div>
                        <h3 class="text-sm font-semibold truncate">
                            How to Become a Data Engineer
                        </h3>
                        <p class="text-xs text-gray-400">89K views • 2 month ago</p>
                    </div>
                </div>
                <!--  -->
                <!-- Third recommended video -->
                <div
                    class="flex items-center space-x-2 bg-white p-2 rounded-lg hover:shadow-lg hover:bg-gray-700 transition-all cursor-pointer text-black">
                    <img
                        src="https://images.unsplash.com/photo-1526925539332-aa3b66e35444?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fHByb2dyYW1taW5nfGVufDB8fDB8fHwy"
                        alt="Thumbnail"
                        class="w-20 h-12 rounded" />
                    <div>
                        <h3 class="text-sm font-semibold truncate">
                            testvideo
                        </h3>
                        <p class="text-xs text-gray-400">89K views • 4 month ago</p>
                    </div>
                </div>
                <!--  -->
                <!-- Third recommended video -->
                <div
                    class="flex items-center space-x-2 bg-white p-2 rounded-lg hover:shadow-lg hover:bg-gray-700 transition-all cursor-pointer text-black">
                    <img
                        src="https://plus.unsplash.com/premium_photo-1663040543387-cb7c78c4f012?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fHByb2dyYW1taW5nfGVufDB8fDB8fHww"
                        alt="Thumbnail"
                        class="w-20 h-12 rounded" />
                    <div>
                        <h3 class="text-sm font-semibold truncate">
                            How to Become a Data Engineer
                        </h3>
                        <p class="text-xs text-gray-400">89K views • 5 month ago</p>
                    </div>
                </div>
                <!--  -->
                <!-- Third recommended video -->
                <div
                    class="flex items-center space-x-2 bg-white p-2 rounded-lg hover:shadow-lg hover:bg-gray-700 transition-all cursor-pointer text-black">
                    <img
                        src="https://images.unsplash.com/photo-1483817101829-339b08e8d83f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8cHJvZ3JhbW1pbmd8ZW58MHx8MHx8fDI%3D"
                        alt="Thumbnail"
                        class="w-20 h-12 rounded" />
                    <div>
                        <h3 class="text-sm font-semibold truncate">
                            How to Become a Data Engineer
                        </h3>
                        <p class="text-xs text-gray-400">89K views • 2 month ago</p>
                    </div>
                </div>
                <!--  -->
                <!-- Third recommended video -->
                <div
                    class="flex items-center space-x-2 bg-white p-2 rounded-lg hover:shadow-lg hover:bg-gray-700 transition-all cursor-pointer text-black">
                    <img
                        src="https://images.unsplash.com/photo-1499673610122-01c7122c5dcb?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHByb2dyYW1taW5nfGVufDB8fDB8fHww"
                        alt="Thumbnail"
                        class="w-20 h-12 rounded" />
                    <div>
                        <h3 class="text-sm font-semibold truncate">
                            How to Become a Data Engineer
                        </h3>
                        <p class="text-xs text-gray-400">89K views • 9 month ago</p>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
</body>

</html>