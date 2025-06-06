<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseDetail;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $details = CourseDetail::with(['user', 'course'])->get();
        return view('course-details.index', compact('details'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the request including course_id
            $validated = $request->validate([
                'course_id' => 'required|exists:courses,course_id'  // Ensure course exists
            ]);

            // Check for existing enrollment
            $exists = CourseDetail::where('user_id', Auth::user()->user_id)
                                ->where('course_id', $validated['course_id'])
                                ->exists();

            if ($exists) {
                return back()->withErrors(['error' => 'You are already enrolled in this course.']);
            }

            // Create course detail with validated data
            $courseDetail = CourseDetail::create([
                'user_id' => Auth::user()->user_id,
                'course_id' => $validated['course_id'],
                'is_enrolled' => true,
                'is_completed' => false
            ]);

            return redirect()->route('courses.show', ['course' => $validated['course_id']])
                            ->with('success', 'Successfully enrolled in course!');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to enroll: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $detail = CourseDetail::where('user_id', Auth::user()->user_id)
                                ->where('id', $id)
                                ->firstOrFail();

            $validated = $request->validate([
                'is_enrolled' => 'nullable|boolean',
                'is_completed' => 'nullable|boolean',
            ]);

            $detail->update($validated);

            return redirect()->route('courses.show', $detail->course_id)
                           ->with('success', 'Course progress updated!');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update progress: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $detail = CourseDetail::where('user_id', Auth::user()->user_id)
                                ->where('id', $id)
                                ->firstOrFail();

            $detail->delete();

            return redirect()->route('courses.index')
                           ->with('success', 'Successfully unenrolled from course.');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to unenroll: ' . $e->getMessage()]);
        }
    }
}
