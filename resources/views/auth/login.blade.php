<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
</head>

<body class="bg-cover bg-center min-h-screen flex items-center justify-center" style="background-color: black;">
    <!-- Glass Login Card with Image -->
    <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-xl shadow-lg p-8 w-full max-w-4xl flex items-center">
        <!-- Left Side - Image -->
        <div class="w-1/2 hidden md:block">
            <img src="img/login-picture.png" alt="Login Illustration" class="rounded-lg">
        </div>
        <!-- Right Side - Form -->
        <div class="w-full md:w-1/2 p-4">
            <h2 class="text-2xl font-bold text-center text-white mb-6">Login</h2>

            <!-- Tampilkan pesan error jika ada -->
            <?php if (isset($error_message)): ?>
                <p class="text-red-500 text-center mb-4"><?= htmlspecialchars($error_message) ?></p>
            <?php endif; ?>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-200 mb-2">Email</label>
                    <input type="email" name="email" id="email"
                        class="w-full px-4 py-2 bg-white bg-opacity-20 text-white placeholder-gray-300 border border-white border-opacity-30 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Enter your email" required />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-200 mb-2">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-2 bg-white bg-opacity-20 text-white placeholder-gray-300 border border-white border-opacity-30 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Enter your password" required />
                </div>

                <!-- Submit Button -->
                <button type="submit" name="login"
                    class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Login
                </button>
            </form>

            <!-- Additional Links -->
            <p class="text-center text-sm text-gray-300 mt-4">
                Don't have an account? <a href="#" class="text-blue-400 hover:underline">Sign Up</a>
            </p>

        </div>
    </div>
</body>

</html>