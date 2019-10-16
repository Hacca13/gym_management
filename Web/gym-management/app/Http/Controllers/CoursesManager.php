<?php

namespace App\Http\Controllers;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use Illuminate\Http\Request;
use App\Http\Models\CourseModel;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Kreait\Firebase\Factory;

class CoursesManager extends Controller{

    public static function theUserForWhichCourseIsRegistered($idUserDatabase){
        $courses = array();
        $allCourses = CoursesManager::getAllCourses();
        foreach ($allCourses as $course){
            foreach ($course->getUsersList() as $user) {
                if($user == $idUserDatabase){
                    array_push($courses,$course);
                }
            }
        }
        return $courses;
    }

    public static function getCoursesByInstructor($instructor){
        $courses = array();
        $collection = Firestore::collection('Courses');
        $query = $collection->where('instructor', '=' ,$instructor);
        $documents = $query->documents();
        foreach ($documents as $document){
            $course = CoursesManager::trasformArrayCourseToCourse($document->data());
            $course->setIdDatabase($document->id());
            array_push($courses,$course);
        }
        return $courses;
    }

    public static function getAllCourses() {
        $allCourses = array();
        $collection = Firestore::collection('Courses');
        $documents = $collection->documents();
        foreach ($documents as $document) {
            $course = CoursesManager::trasformArrayCourseToCourse($document->data());
            $course->setIdDatabase($document->id());
            array_push($allCourses,$course);
        }
        return $allCourses;
    }

    public static function trasformArrayCourseToCourse($arrayCourse){
        $idDatabase = data_get($arrayCourse,'idDatabase');
        $name = data_get($arrayCourse,'name');
        $image = data_get($arrayCourse,'image');
        $instructor = data_get($arrayCourse,'instructor');
        $period = data_get($arrayCourse,'period');
        $weeklyFrequency = data_get($arrayCourse,'weeklyFrequency') ;
        $usersList = data_get($arrayCourse,'usersList') ;

        $course = new CourseModel($idDatabase,$name,$image,$instructor,$period,$weeklyFrequency,$usersList);

        return $course;
    }
    public static function trasformCourseToArrayCourse($course){
        $idDatabase = $course->getIdDatabase();
        $name = $course->getName();
        $image = $course->getImage();
        $instructor = $course->getInstructor();
        $period = $course->getPeriod();
        $weeklyFrequency = $course->getWeeklyFrequency();
        $usersList = $course->getUsersList();

        $arrayCourse = array(
            'idDatabase' => $idDatabase,
            'name' => $name,
            'image' => $image,
            'instructor' => $instructor,
            'period' => $period,
            'weeklyFrequency' => $weeklyFrequency,
            'usersList' => $usersList
        );

        return $arrayCourse;
    }

    public function coursesPage() {
        $courses = CoursesManager::getAllCourses();
        return view('courses', compact('courses'));
    }

    public function addCourse(Request $request) {
        $input = $request->all();

        $days = [];

        for ($i = 0; $i<7; $i++) {
            if (isset($input['singleDay' . strval($i)])) {
                array_push($days, [
                    'day' => $input['singleDay' . strval($i)],
                    'startTime' => [
                        'hour' => $input['hourFrom' . strval($i)],
                        'minutes' => $input['minutesFrom' . strval($i)],
                    ],
                    'endTime' => [
                        'hour' => $input['hourTo' . strval($i)],
                        'minutes' => $input['minutesTo' . strval($i)],
                    ]
                ]);
            }
        }

        $name = $input['name'];
        $image = '';
        $istructor = $input['instructor'];
        $period = [
            'startDate' => $input['startDate'],
            'endDate' => $input['endDate']
        ];
        $weekly = $days;
        $userList = [];


        $coll = Firestore::collection('Courses');
        $idDatabase = $coll->add([])->id();
        $corso = new CourseModel(
            null,
            $name,
            $image,
            $istructor,
            $period,
            $weekly,
            $userList
        );
        $coll->document($idDatabase)->set(CoursesManager::trasformCourseToArrayCourse($corso));

        toastr()->success('Corso inserito');
        return redirect('/corsi');

    }

}
