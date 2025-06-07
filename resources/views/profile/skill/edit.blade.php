
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Skill</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <div class="mb-4">
                <h1 class="text-2xl font-bold">Edit Skill</h1>
                <p class="text-gray-600">Update your skill information</p>
            </div>

            @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-4">
                <div class="flex">
                    <div class="ml-3">
                        <p class="text-sm text-red-600">Please correct the following errors:</p>
                        <ul class="mt-2 text-sm text-red-600 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm p-6">
                <form action="{{ route('profile.skill.update', $skill->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Skill Name</label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               value="{{ old('name', $skill->name) }}" 
                               required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="proficiency_level" class="block text-sm font-medium text-gray-700">Proficiency Level</label>
                        <select name="proficiency_level" 
                                id="proficiency_level"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @foreach(['Beginner', 'Intermediate', 'Advanced', 'Expert'] as $level)
                                <option value="{{ $level }}" {{ old('proficiency_level', $skill->proficiency_level) == $level ? 'selected' : '' }}>
                                    {{ $level }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="years_of_experience" class="block text-sm font-medium text-gray-700">Years of Experience</label>
                        <input type="number" 
                               name="years_of_experience" 
                               id="years_of_experience"
                               value="{{ old('years_of_experience', $skill->years_of_experience) }}"
                               min="0" 
                               max="50"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="flex justify-end space-x-3 pt-4">
                        <a href="{{ route('profile.show') }}" 
                           class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>