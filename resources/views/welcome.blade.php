<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Header</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.22/dist/full.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="bg-gray-100 text-white">
    <!-- Navbar -->
    <div class="navbar bg-black shadow-md">
        <div class="flex-1">
            <!-- Logo -->
            <a href="#" class="btn btn-ghost normal-case text-xl flex items-center gap-2 place-content-center">
                <img src="images\logoputihtest.png" alt="Logo Website" width="100" />
            </a>
        </div>
        <div class="flex-none">
            <!-- Navigation Links -->
            <ul class="menu menu-horizontal px-1 hidden md:flex">
                <li><a href="index.php">About</a></li>
                <li><a href="about.html">Rate</a></li>
                <li><a href="contact.html">Features</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="register.html">Register</a></li>
            </ul>
        </div>
    </div>

    <!-- About Section -->
    <main>
        <section class="bg-white py-20 pl-9">
            <div class="container mx-auto flex flex-nowrap md:flex-row items-start">
                <div class="md:w-1/2">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 text-black">
                        Find Your Dream Job and Connect with Other People With UNIONE
                    </h1>
                    <p class="text-black mb-6">
                        In today’s competitive job market, finding the right opportunity and building a strong
                        professional network can make all the difference.
                        <b class="text-black">Unione</b> is designed to simplify and enhance your job search experience
                        while helping you create valuable connections. Here’s how <b class="text-black">Unione</b> can
                        revolutionize your career journey.
                    </p>
                    <a href="login.html">
                        <button class="px-6 py-3 bg-black text-white font-semibold rounded-lg hover:bg-blue-600">
                            Get Started
                        </button>
                    </a>
                </div>
                <div class="w-100 justify-center mt-2 md:mt-0">
                    <img src="images/ilustrasion-landing-page.png" alt="Hero Image" />
                </div>
            </div>
        </section>

        <!-- Partnership -->
        <section class="bg-black py-10">
            <p class="text-white text-center p-2 font-bold text-lg">Our Clients</p>
            <div class="container mx-auto flex items-center justify-around space-x-2.5 pt-6">
                <img src="images/microsoft.png" alt="Logo 1" class="h-10" />
                <img src="images/Facebook.png" alt="Logo 2" class="h-10" />
                <img src="images/microsoft.png" alt="Logo 3" class="h-10" />
                <img src="images/google.png" alt="Logo 4" class="h-10" />
                <img src="images/Facebook.png" alt="Logo 5" class="h-10" />
            </div>
        </section>

        <!-- Rating Section -->
        <section class="py-16 bg-white">
            <div class="flex justify-center space-x-4">
                <!-- Card 1 -->
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-end px-4 pt-4">
                        <button id="dropdownButton" data-dropdown-toggle="dropdown"
                            class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 16 3">
                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col items-center pb-10">
                        <img class="w-24 h-24 mb-2 rounded-full shadow-lg object-cover" src="images/fotoorang6.jpg"
                            alt="Bonnie image" />
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Andreas kalenski</h5>
                        <p class="text-yellow-500">★★★★★</p>
                        <span class="text-sm text-gray-500 dark:text-gray-400 text-center">Frontend Developer</span>
                        <p class="text-black pt-2 pl-10 pr-10 Center">"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse minus veritatis dicta quis quo. Omnis amet perferendis dolorum eum sapiente alias modi, magni laudantium tenetur ullam illo dolore reiciendis molestiae!"</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-end px-4 pt-4">
                        <button id="dropdownButton" data-dropdown-toggle="dropdown"
                            class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 16 3">
                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col items-center pb-10">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg object-cover" src="images/fotoorang9.jpg"
                            alt="Bonnie image" />
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Aurelia Gracesiella</h5>
                        <p class="text-yellow-500">★★★★★</p>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                        <p class="text-black pt-2 pl-10 pr-10 Center">"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse minus veritatis dicta quis quo. Omnis amet perferendis dolorum eum sapiente alias modi, magni laudantium tenetur ullam illo dolore reiciendis molestiae!"</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-black text-white p-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <h2 class="text-xl font-bold">UNIONE</h2>
                    <p>
                        Unione is your career partner, helping you find your dream job and connect with industry peers
                    </p>
                </div>
                <div>
                    <h2 class="text-xl font-bold">Links</h2>
                    <ul>
                        <li><a href="about.html">About</a></li>
                        <li><a href="features.html">Features</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h2 class="text-xl font-bold">Social</h2>
                    <div class="flex space-x-4">
                        <a href="https://twitter.com" class="text-white">Twitter</a>
                        <a href="https://facebook.com" class="text-white">Facebook</a>
                        <a href="https://instagram.com" class="text-white">Instagram</a>
                    </div>
                </div>
            </div>
        </footer>
    </main>
</body>

</html>