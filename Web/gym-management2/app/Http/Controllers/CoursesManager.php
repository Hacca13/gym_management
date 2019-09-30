<?php

namespace App\Http\Controllers;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use Illuminate\Http\Request;

class CoursesManager extends Controller
{
    public function getAllCourses() {

        $data = [

        ];

        return view('courses');

    }
}
