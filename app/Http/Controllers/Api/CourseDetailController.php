<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseDetail;
use Illuminate\Http\JsonResponse;

class CourseDetailController extends Controller
{

    public function index(): JsonResponse
    {
        $details = CourseDetail::with(['user', 'course'])->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Data fetched successfully',
            'data' => $details
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'is_enrolled' => 'nullable|boolean',
            'is_completed' => 'nullable|boolean',
        ]);

        $detail = CourseDetail::create([
            'user_id' => $validated['user_id'],
            'course_id' => $validated['course_id'],
            'is_enrolled' => $validated['is_enrolled'] ?? false,
            'is_completed' => $validated['is_completed'] ?? false,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Course detail created successfully',
            'data' => $detail
        ], 201);
    }


    public function show($id): JsonResponse
    {
        $detail = CourseDetail::with(['user', 'course'])->findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => $detail
        ]);
    }


    public function update(Request $request, $id): JsonResponse
    {
        $detail = CourseDetail::findOrFail($id);

        $validated = $request->validate([
            'is_enrolled' => 'nullable|boolean',
            'is_completed' => 'nullable|boolean',
        ]);

        $detail->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Course detail updated successfully',
            'data' => $detail
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $detail = CourseDetail::findOrFail($id);
        $detail->delete();

        return response()->json([
            'success' => true,
            'message' => 'Course detail deleted successfully'
        ]);
    }
}
