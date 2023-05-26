<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollmentIndexRequest;
use App\Models\Enrollment;
use App\Services\EnrollmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    protected EnrollmentService $enrollmentService;

    public function __construct(EnrollmentService $enrollmentService)
    {
        $this->enrollmentService = $enrollmentService;
    }

    public function index(EnrollmentIndexRequest $request): JsonResponse
    {
        // Maybe use DTO
        $enrollments = $this->enrollmentService->getAllEnrollmentsFiltered($request->validated());

        return response()->json($enrollments);
    }

    //could be same pattern as above using custom requests and services, but will keep like this to use less time
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:in_progress,complete',
        ]);

        $enrollment = Enrollment::create($request->only(['course_id', 'user_id', 'status']));

        return $enrollment;
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'status' => 'required|in:1,2',
        ]);

        $enrollment->update($request->only('status'));

        return $enrollment;
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return response()->noContent();
    }
}
