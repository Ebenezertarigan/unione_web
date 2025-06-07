<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
   public function show()
{
    $user = Auth::user();
    $profile = $user->profile;
    
    if (!$profile) {
        $profile = $user->profile->create([
            'user_id' => $user->user_id
        ]);
    }

    // Load the relationships
    $profile->load(['skills', 'experiences', 'educations', 'certifications', 'projects']);
    
    return view('profile.index', compact('profile'));
}

    // Experience Methods
    public function createExperience()
    {
        return view('profile.experience.create');
    }

    public function storeExperience(Request $request)
{
    $validated = $request->validate([
        'position' => 'required|string|max:255',
        'company_name' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'description' => 'nullable|string',
    ]);

    // Convert date format for MySQL
    $validated['start_date'] = date('Y-m-d', strtotime($request->start_date . '-01'));
    if ($request->end_date) {
        $validated['end_date'] = date('Y-m-d', strtotime($request->end_date . '-01'));
    }

    // Get the profile and create experience
    $profile = Auth::user()->profile;
    $profile->experiences()->create($validated);

    return redirect()->route('profile.show')->with('success', 'Experience added successfully');
}

    public function editExperience($id)
    {
        $experience = Auth::user()->profile->experiences()->findOrFail($id);
        return view('profile.experience.edit', compact('experience'));
    }

    public function updateExperience(Request $request, $id)
    {
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);

        // Convert date format for MySQL
        $validated['start_date'] = date('Y-m-d', strtotime($request->start_date . '-01'));
        if ($request->end_date) {
            $validated['end_date'] = date('Y-m-d', strtotime($request->end_date . '-01'));
        }

        $experience = Auth::user()->profile->experiences()->findOrFail($id);
        $experience->update($validated);

        return redirect()->route('profile.show')->with('success', 'Experience updated successfully');
    }

    // Project Methods
    public function createProject()
    {
        return view('profile.project.create');
    }

    public function storeProject(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'project_url' => 'nullable|url',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date'
        ]);

        Auth::user()->profile->projects()->create($validated);
        return redirect()->route('profile.show')->with('success', 'Project added successfully');
    }

    // Skill Methods
    public function createSkill()
    {
        return view('profile.skill.create');
    }

    public function storeSkill(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'proficiency_level' => 'required|string|in:Beginner,Intermediate,Advanced,Expert',
            'years_of_experience' => 'nullable|integer|min:0|max:50'
        ]);

        Auth::user()->profile->skills()->create($validated);
        return redirect()->route('profile.show')->with('success', 'Skill added successfully');
    }

    public function editSkill($id)
    {
        $skill = Auth::user()->profile->skills()->findOrFail($id);
        return view('profile.skill.edit', compact('skill'));
    }

    public function updateSkill(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'proficiency_level' => 'required|string|in:Beginner,Intermediate,Advanced,Expert',
            'years_of_experience' => 'nullable|integer|min:0|max:50'
        ]);

        $skill = Auth::user()->profile->skills()->findOrFail($id);
        $skill->update($validated);

        return redirect()->route('profile.show')->with('success', 'Skill updated successfully');
    }

    // Certification Methods
    public function createCertification()
    {
        return view('profile.certification.create');
    }

    public function storeCertification(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'issuing_organization' => 'required|string|max:255',
            'issued_date' => 'required|date',
            'expiration_date' => 'nullable|date|after:issued_date',
            'credential_url' => 'nullable|url',
            'credential_id' => 'nullable|string|max:255'
        ]);

        // Convert date format for MySQL
        $validated['issued_date'] = date('Y-m-d', strtotime($request->issued_date . '-01'));
        if ($request->expiration_date) {
            $validated['expiration_date'] = date('Y-m-d', strtotime($request->expiration_date . '-01'));
        }

        Auth::user()->profile->certifications()->create($validated);
        return redirect()->route('profile.show')->with('success', 'Certification added successfully');
    }

    public function editCertification($id)
    {
        $certification = Auth::user()->profile->certifications()->findOrFail($id);
        return view('profile.certification.edit', compact('certification'));
    }

    public function updateCertification(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'issuing_organization' => 'required|string|max:255',
            'issued_date' => 'required|date',
            'expiration_date' => 'nullable|date|after:issued_date',
            'credential_url' => 'nullable|url',
            'credential_id' => 'nullable|string|max:255'
        ]);

        // Convert date format for MySQL
        $validated['issued_date'] = date('Y-m-d', strtotime($request->issued_date . '-01'));
        if ($request->expiration_date) {
            $validated['expiration_date'] = date('Y-m-d', strtotime($request->expiration_date . '-01'));
        }

        $certification = Auth::user()->profile->certifications()->findOrFail($id);
        $certification->update($validated);

        return redirect()->route('profile.show')->with('success', 'Certification updated successfully');
    }

    // Education Methods
    public function createEducation()
    {
        return view('profile.education.create');
    }

    public function storeEducation(Request $request)
    {
        $validated = $request->validate([
            'school_name' => 'required|string|max:255',
            'degree' => 'nullable|string|max:255',
            'major' => 'nullable|string|max:255',
            'start_year' => 'required|numeric|min:1900|max:2099',
            'end_year' => 'nullable|numeric|min:1900|max:2099|gte:start_year',
        ]);

        Auth::user()->profile->educations()->create($validated);

        return redirect()->route('profile.show')->with('success', 'Education added successfully');
    }

    // Delete Methods
    public function deleteExperience($id)
    {
        Auth::user()->profile->experiences()->findOrFail($id)->delete();
        return redirect()->route('profile.show')->with('success', 'Experience deleted successfully');
    }

    public function deleteProject($id)
    {
        Auth::user()->profile->projects()->findOrFail($id)->delete();
        return redirect()->route('profile.show')->with('success', 'Project deleted successfully');
    }

    public function deleteSkill($id)
    {
        Auth::user()->profile->skills()->findOrFail($id)->delete();
        return redirect()->route('profile.show')->with('success', 'Skill deleted successfully');
    }

    public function deleteCertification($id)
    {
        Auth::user()->profile->certifications()->findOrFail($id)->delete();
        return redirect()->route('profile.show')->with('success', 'Certification deleted successfully');
    }

    // Photo Update Methods
    public function updateCover(Request $request)
    {
        $request->validate([
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $user = Auth::user();
        $profile = $user->profile;

        if ($request->hasFile('cover_photo')) {
            // Delete old cover if exists
            if ($profile->cover_photo) {
                Storage::disk('public')->delete('covers/' . $profile->cover_photo);
            }

            $file = $request->file('cover_photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/covers', $filename);

            $profile->cover_photo = $filename;
            $profile->save();
        }

        return back()->with('success', 'Cover photo updated successfully');
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $user = Auth::user();
        $profile = $user->profile;

        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($profile->avatar) {
                $oldAvatarPath = public_path('avatars/' . $profile->avatar);
                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath);
                }
            }

            // Create avatars directory if it doesn't exist
            $avatarPath = public_path('avatars');
            if (!file_exists($avatarPath)) {
                mkdir($avatarPath, 0777, true);
            }

            // Store new avatar
            $avatar = $request->file('avatar');
            $filename = time() . '_' . $avatar->getClientOriginalName();
            $avatar->move(public_path('avatars'), $filename);

            // Update profile with new filename
            $profile->update(['avatar' => $filename]);
        }

        return back()->with('success', 'Profile photo updated successfully');
    }

    public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'headline' => 'nullable|string|max:255',
        'about' => 'nullable|string',
        'location' => 'nullable|string|max:255',
        'phone_number' => 'nullable|string|max:20',
        'birth_date' => 'nullable|date',
    ]);

    $user = Auth::user();

    // Ensure $user is an Eloquent model before calling save()
    if ($user instanceof \Illuminate\Database\Eloquent\Model) {
        $user->name = $request->name;
        $user->save();
    } else {
        // Optionally, handle the error or throw an exception
        abort(500, 'User model is not an Eloquent instance.');
    }

    // Pastikan profile ada atau buat baru
    if (!$user->profile) {
        $user->profile()->create([
            'headline' => $request->headline,
            'about' => $request->about,
            'location' => $request->location,
            'phone_number' => $request->phone_number,
            'birth_date' => $request->birth_date,
        ]);
    } else {
        $user->profile->update([
            'headline' => $request->headline,
            'about' => $request->about,
            'location' => $request->location,
            'phone_number' => $request->phone_number,
            'birth_date' => $request->birth_date,
        ]);
    }

    return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
}

public function updateAbout(Request $request)
{
    $validated = $request->validate([
        'about' => 'required|string|max:1000',
    ]);

    $user = Auth::user();
    $profile = $user->profile;

    if (!$profile) {
        $profile = $user->profile->create([
            'about' => $validated['about']
        ]);
    } else {
        $profile->update([
            'about' => $validated['about']
        ]);
    }

    return redirect()->route('profile.show')->with('success', 'About section updated successfully');
}
}