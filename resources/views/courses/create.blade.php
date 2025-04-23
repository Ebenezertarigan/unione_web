<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Course</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center px-4">
    <div class="bg-white shadow-md rounded-2xl p-8 w-full max-w-xl">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Create New Course</h1>

        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" id="title" name="title" required class="w-full px-3 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea id="description" name="description" rows="3" required class="w-full px-3 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <input type="text" id="category" name="category" required class="w-full px-3 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <input type="text" id="status" name="status" required class="w-full px-3 py-2 border rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Course Photo</label>
                <input type="file" id="photo" name="photo" accept="image/*" class="w-full text-sm text-gray-600" />
            </div>

            <div>
                <label for="course_video" class="block text-sm font-medium text-gray-700 mb-1">Course Video</label>
                <input type="file" id="course_video" name="course_video" accept="video/*" class="w-full text-sm text-gray-600" />
            </div>

            <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-150 ease-in-out">
                Create Course
            </button>
        </form>
    </div>
</body>
</html>
