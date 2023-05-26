<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    public function getAll()
    {
        return Course::all();
    }
}
