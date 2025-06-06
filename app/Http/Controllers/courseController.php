<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $courses = Course::with('details')->get();
        return view('courses.index', compact('courses'));
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'nullable|string|max:100',
            'status' => 'required|in:active,inactive',
            'video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg|max:102400'
        ]);

        // Persiapan data untuk disimpan
        $courseData = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category' => $validated['category'] ?? null,
            'status' => $validated['status'],
            'user_id' => Auth::user()->user_id // pastikan kolom 'user_id' ada di tabel
        ];

        // Jika ada file video, simpan ke folder public/videos
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filename = uniqid('video_') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('videos'), $filename);
            $courseData['video'] = $filename;
        }

        // Simpan course dan simpan instansinya ke variabel
        $course = Course::create($courseData);

        // Redirect ke halaman show dengan parameter id course
        return redirect()->route('courses.show', ['course_id' => $course->course_id]) // pastikan key-nya 'course_id' sesuai DB
                        ->with('success', 'Course created successfully!');
    }

    public function show($course_id)
    {
        $course = Course::findOrFail($course_id);
        return view('courses.show', compact('course'));
    }
    public function edit($course_id)
    {
        $course = Course::findOrFail($course_id);
        return view('courses.edit', compact('course'));
    }


    public function update(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id);
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'category' => 'nullable|string|max:100',
            'status' => 'required|in:active,inactive',
            'video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg|max:102400'
        ]);

        $updateData = collect($validated)->filter()->all();

        if ($request->hasFile('video')) {
            if ($course->video) {
                @unlink(public_path('videos/' . $course->video));
            }
            
            $file = $request->file('video');
            $filename = uniqid('video_') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('videos'), $filename);
            $updateData['video'] = $filename;
        }

        $course->update($updateData);

        return redirect()->route('courses.show', ['course_id' => $course_id])
                        ->with('success', 'Course updated successfully');
    }

    public function destroy($course_id)
    {
        $course = Course::findOrFail($course_id);
        
        if ($course->video) {
            @unlink(public_path('videos/' . $course->video));
        }
        
        $course->delete();

        return redirect()->route('courses.index')
                        ->with('success', 'Course deleted successfully');
    }

    public function create()
    {
        return view('courses.create');
    }
}
