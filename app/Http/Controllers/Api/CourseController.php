<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseDetail;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{

    public function index(): JsonResponse
    {
        $courses = Course::with('details')->get();

        return response()->json([
            'success' => true,
            'message' => 'Data fetched successfully',
            'data' => $courses
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'category' => 'nullable|string|max:100',
                'status' => 'nullable|in:active,inactive',
                'video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg|max:102400', // 100MB max
                'user_id' => 'required|exists:users,user_id'
            ]);

            $courseData = [
                'title' => trim($validated['title'], '"'),
                'description' => trim($validated['description'], '"'), 
                'category' => $validated['category'] ? trim($validated['category'], '"') : null,
                'status' => $validated['status'] ?? 'active',
                'user_id' => $validated['user_id'], // <-- tambahkan ini
            ];

            if ($request->hasFile('video')) {
                $file = $request->file('video');
                $filename = uniqid('video_') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('videos'), $filename);
                $courseData['video'] = $filename;
            }


            $course = Course::create($courseData);
            $course->refresh();


            CourseDetail::create([
                'user_id' => $validated['user_id'],
                'course_id' => $course->course_id,
                'is_enrolled' => true,
                'is_completed' => false,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Course created successfully',
                'data' => $course
            ], 201);

        } catch (\Exception $e) {
            if (isset($filename)) {
                @unlink(public_path('videos/' . $filename));
            }

            return response()->json([
                'success' => false,
                'message' => 'Course creation failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($course_id): JsonResponse
    {
        $course = Course::with('details')->findOrFail($course_id);
        
        return response()->json([
            'success' => true,
            'data' => $course
        ]);
    }


    public function update(Request $request, $course_id): JsonResponse
    {
        try {
            $course = Course::findOrFail($course_id);

            $validated = $request->validate([
                'title' => 'sometimes|required|string|max:255',
                'description' => 'sometimes|required|string',
                'category' => 'nullable|string|max:100',
                'status' => 'nullable|in:active,inactive',
                'video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg|max:102400'
            ]);

            $updateData = [];

            // Handle text fields
            if (isset($validated['title'])) {
                $updateData['title'] = trim($validated['title'], '"');
            }
            if (isset($validated['description'])) {
                $updateData['description'] = trim($validated['description'], '"');
            }
            if (isset($validated['category'])) {
                $updateData['category'] = trim($validated['category'], '"');
            }
            if (isset($validated['status'])) {
                $updateData['status'] = $validated['status'];
            }

            // Handle video upload
            if ($request->hasFile('video')) {
                // Delete old video if exists
                if ($course->video) {
                    $oldVideoPath = public_path('videos/' . $course->video);
                    if (file_exists($oldVideoPath)) {
                        @unlink($oldVideoPath);
                    }
                }
                
                $file = $request->file('video');
                $filename = uniqid('video_') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('videos'), $filename);
                $updateData['video'] = $filename;
            }

            $course->update($updateData);
            $course->refresh();

            return response()->json([
                'success' => true,
                'message' => 'Course updated successfully',
                'data' => $course
            ]);

        } catch (\Exception $e) {
            // Delete uploaded video if there was an error
            if (isset($filename)) {
                @unlink(public_path('videos/' . $filename));
            }

            return response()->json([
                'success' => false,
                'message' => 'Course update failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($course_id): JsonResponse
    {
        try {
            $course = Course::findOrFail($course_id);
            

            CourseDetail::where('course_id', $course_id)->delete();
            

            if ($course->video) {
                $videoPath = public_path('videos/' . $course->video);
                if (file_exists($videoPath)) {
                    @unlink($videoPath);
                }
            }
            

            $course->delete();

            return response()->json([
                'success' => true,
                'message' => 'Course deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Course deletion failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
