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

<body class="bg-gray-50 min-h-screen flex items-center justify-center px-4">
    <div class="bg-white shadow-md rounded-2xl p-8 w-full max-w-xl">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Create New Course</h1>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                {{ session('success') }}
                <script>
                    setTimeout(function() {
                        window.location.href = "{{ route('courses.index') }}";
                    }, 2000);
                </script>
            </div>
        @endif

        @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
            <ul class="list-disc pl-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" 
                    class="w-full px-3 py-2 border rounded-lg  focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror" required />
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea id="description" name="description" rows="3" 
                    class="w-full px-3 py-2 border rounded-lg  focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror" required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select id="category" name="category" 
                    class="w-full px-3 py-2 border rounded-lg  focus:outline-none focus:ring-2 focus:ring-blue-500 @error('category') border-red-500 @enderror" required>
                    <option value="">-- Select Category --</option>
                    <option value="Web Development" {{ old('category') == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                    <option value="Data Science" {{ old('category') == 'Data Science' ? 'selected' : '' }}>Data Science</option>
                    <option value="Cyber Security" {{ old('category') == 'Cyber Security' ? 'selected' : '' }}>Cyber Security</option>
                    <option value="Design" {{ old('category') == 'Design' ? 'selected' : '' }}>Design</option>
                    <option value="Business" {{ old('category') == 'Business' ? 'selected' : '' }}>Business</option>
                </select>
                @error('category')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select id="status" name="status" 
                    class="w-full px-3 py-2 border rounded-lg  focus:outline-none focus:ring-2 focus:ring-blue-500 @error('status') border-red-500 @enderror" required>
                    <option value="">-- Select Status --</option>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>active</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>inactive</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div>
                <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-1">Thumbnail</label>
                <input type="file" id="thumbnail" name="thumbnail" accept="image/*" 
                    class="w-full text-sm text-gray-600 @error('thumbnail') border-red-500 @enderror" 
                    onchange="previewImage(this)" required />
                <img id="thumbnail-preview" class="mt-2 hidden max-h-40 rounded-lg" />
                @error('thumbnail')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="video" class="block text-sm font-medium text-gray-700 mb-1">Video</label>
                <input type="file" id="video" name="video" accept="video/*" 
                    class="w-full text-sm text-gray-600 @error('video') border-red-500 @enderror" required />
                @error('video')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-150 ease-in-out" 
                    onclick="this.disabled=true;this.innerHTML='Creating...';this.form.submit();">
                Create Course
            </button>
        </form>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('photo-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        document.getElementById('courseForm').addEventListener('submit', function(e) {
            const submitButton = this.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.innerHTML = 'Creating...';
        });
    </script>
</body>
</html>