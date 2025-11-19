<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $fillable = ['title'];

    public function teachercourses()
    {
        return $this->hasMany(teachercorse::class);
    }
}