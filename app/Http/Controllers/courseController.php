<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class courseController extends Controller
{
    public function index()
    {
        $courses = session('courses', []); // ambil dari session

        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $courses = session('courses', []);

        $newCourse = [
            'id' => uniqid(),
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'status' => $request->status,
            'thumbnail' => null,
            'course_video' => null,
        ];

        // Simpan thumbnail jika ada
        if ($request->hasFile('photo')) {
            $filename = uniqid('photo_') . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('img'), $filename);
            $newCourse['thumbnail'] = $filename;
        }

        // Simpan video jika ada
        if ($request->hasFile('video')) {
            $filename = uniqid('video_') . '.' . $request->file('video')->getClientOriginalExtension();
            $request->file('video')->move(public_path('videos'), $filename);
            $newCourse['course_video'] = $filename;
        }

        
        $courses[] = $newCourse;

        session(['courses' => $courses]); // simpan ke session

        return redirect()->route('courses.index')->with('success', 'Course berhasil ditambahkan!');
    }

    public function show($id)
    {
        $courses = session('courses', []);
    
        $course = collect($courses)->firstWhere('id', $id);
    
        if (!$course) {
            abort(404, 'Course not found');
        }
    
        return view('courses.show', compact('course'));
    }

    public function edit($id)
    {
        $courses = session('courses', []);
        $course = collect($courses)->firstWhere('id', $id);

        return view('courses.edit', ['course' => $course]);
    }

    public function destroy($id)
    {
        $courses = session('courses', []);
        $courses = array_filter($courses, fn($course) => $course['id'] !== $id);
        session(['courses' => $courses]);

        return redirect()->route('courses.index')->with('success', 'Course dihapus.');
    }

    public function update(Request $request, $id)
    {
        $courses = session('courses', []);
        
        foreach ($courses as &$course) {
            if ($course['id'] === $id) {
                $course['title'] = $request->title;
                $course['description'] = $request->description;
                // Tambahkan update kategori/status jika perlu
                break;
            }
        }
    
        session(['courses' => $courses]);
    
        return redirect()->route('courses.index')->with('success', 'Course berhasil diupdate!');
    }
    

}
