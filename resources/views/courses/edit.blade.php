<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6">Edit Course</h1>

        <!-- Form Edit Course -->
        <form action="{{ route('courses.update', $course['id']) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" value="{{ $course['title'] }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $course['description'] }}</textarea>
            </div>
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <input type="text" id="category" name="category" value="{{ $course['category'] }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>  
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <input type="text" id="status" name="status" value="{{ $course['status'] }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>  

            <div class="mb-4">
                <label for="thumbnail" class="block text-sm font-medium text-gray-700">Course Photo</label>
                <input type="file" id="photo" name="photo" accept="image/*" class="mt-1 block w-full text-sm text-gray-600" />
            </div>
            <div class="mb-4">
                <label for="course_video" class="block text-sm font-medium text-gray-700">Course Video</label>
                <input type="file" id="course_video" name="course_video" accept="video/*" class="mt-1 block w-full text-sm text-gray-600" />
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                Update Course
            </button>
        </form>
    </div>

</body>

</html>
