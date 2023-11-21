<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin')->only(['index', 'create', 'store', 'edit', 'update', 'getDeleteCourseModal', 'deleteCourse']);
    }

    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'course_img_url' => 'sometimes|url', // Validation for the new column
        ]);

        Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'course_img_url' => $request->course_img_url, // Add the new column
        ]);

        return redirect()->route('courses.index')->with('success', 'Course added successfully');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);

        if (request()->ajax()) {
            return view('admin.courses.edit-modal', compact('course'));
        }

        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'course_img_url' => 'sometimes|url', // Validation for the new column
            // Add other validation rules as needed
        ]);

        $course = Course::findOrFail($id);
        $course->update([
            'name' => $request->name,
            'description' => $request->description,
            'course_img_url' => $request->course_img_url, // Add the new column
            // Add other fields as needed
        ]);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully');
    }

    public function getDeleteCourseModal($id)
    {
        $course = Course::findOrFail($id);
        return view('layouts.modal.delete-course-modal', compact('course'));
    }

    public function deleteCourse($id)
    {
        // Find the course by ID and delete
        Course::findOrFail($id)->delete();

        // Redirect to a success page or back to the course list with a success message
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
    }

    public function confirmDeleteCourseModal($id)
    {
        $course = Course::findOrFail($id);
        return view('modal.delete-course-modal', compact('course'));
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return response()->json(['success' => true]);
    }

    public function getCourses()
    {
        $courses = Course::all();
        return response()->json($courses);
    }

    public function getCarouselCourses()
{
    $courses = DB::table('courses')->take(6)->get();

    return response()->json($courses);
}
}
