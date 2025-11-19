<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = ['username', 'mobile'];

    public function studentcourses()
    {
        return $this->hasMany(studentcourses::class);
    }
}