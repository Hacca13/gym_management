<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoursesManager extends Controller
{
    public function getAllCourses() {

        return view('courses');

    }
}
