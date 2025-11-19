<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Teachercorse;
use App\Models\studentcourses; 
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::get();
foreach($students as $student){
   $students []= Student::with('studentcourses.teacherCourses','studentcourses.teachercourses.course')
    ->find($student['id']);
}
        
        
        return response()->json($students, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:students,username',
            'mobile' => 'required|string|max:15',
            'studentcourses' => 'required|array',
            'studentcourses.*.course' => 'required|string',
            'studentcourses.*.teacher' => 'required|string',
        ]);

        $student = Student::create([
            'username' => $request->username,
            'mobile' => $request->mobile,
        ]);

        foreach ($request->studentcourses as $studentcourse) {
            $teachername = $studentcourse['teacher'];
            $coursename = $studentcourse['course'];

            $teacher = Teacher::where('username', $teachername)->first();
            if (!$teacher) {
                $teacher = Teacher::create([
                    'username' => $teachername,
                ]);
            }

            $course = Course::where('title', $coursename)->first();
            if (!$course) {
                $course = Course::create([
                    'title' => $coursename,
                ]);
            }

            $teachercourse = Teachercorse::where('teacher_id', $teacher->id)
                ->where('course_id', $course->id)
                ->first();

            if (!$teachercourse) {
                $teachercourse = Teachercorse::create([
                    'teacher_id' => $teacher->id,
                    'course_id' => $course->id,
                ]);
            }

            $studentCourse = studentcourses::create([
                'student_id' => $student->id,
                'course_id' => $teachercourse->course_id,
            ]);
        }

        $studentCourses = studentcourses::with('student', 'teacherCourses','teachercourses.course','teachercourses.teacher')
        ->find($studentCourse['id']);
        
                return response()->json([
                    'data'=>$studentCourses,
                    'message' => 'Student and courses saved successfully']
                    , 200);
    }

     public function Update(Request $request,$id)
    {
        $request->validate([
            'studentcourses' => 'required|array',
            'studentcourses.*.course' => 'required|string',
            'studentcourses.*.teacher' => 'required|string',
        ]);

        $student = Student::find($id);

        $student->studentcourses()->delete();

        foreach ($request->studentcourses as $studentcourse) {
            $teachername = $studentcourse['teacher'];
            $coursename = $studentcourse['course'];

            $teacher = Teacher::where('username', $teachername)->first();
            if (!$teacher) {
                $teacher = Teacher::create([
                    'username' => $teachername,
                ]);
            }

            $course = Course::where('title', $coursename)->first();
            if (!$course) {
                $course = Course::create([
                    'title' => $coursename,
                ]);
            }

            $teachercourse = Teachercorse::where('teacher_id', $teacher->id)
                ->where('course_id', $course->id)
                ->first();

            if (!$teachercourse) {
                $teachercourse = Teachercorse::create([
                    'teacher_id' => $teacher->id,
                    'course_id' => $course->id,
                ]);
            }

            $studentCourse = studentcourses::create([
                'student_id' => $student->id,
                'course_id' => $teachercourse->course_id,
            ]);
        }

        $studentCourses = studentcourses::with('student', 'teacherCourses','teachercourses.course','teachercourses.teacher')
        ->find($studentCourse['id']);
        
                return response()->json([
                    'data'=>$studentCourses,
                    'message' => 'Student and courses Updated successfully']
                    , 200);
    }
}