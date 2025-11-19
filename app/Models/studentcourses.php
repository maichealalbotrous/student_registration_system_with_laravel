<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class studentcourses extends Model
{
    protected $fillable = ['student_id', 'course_id'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function teacherCourses()
    {
        return $this->belongsTo(teachercorse::class);
    }
}