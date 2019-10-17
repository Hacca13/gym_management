<?php

namespace App\Http\Controllers;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use Illuminate\Http\Request;
use App\Http\Models\CourseModel;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Kreait\Firebase;

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

        $uploadedImage = $request->file('courseImage');

        $firebase = (new Firebase\Factory());

        $bucket = $firebase->createStorage()->getBucket();

        $name = $input['name'] . '.' . $uploadedImage->getClientOriginalExtension();

        $str = $bucket->upload(file_get_contents($uploadedImage),
            [
                'name' => $name
            ])->name();

        $documentImage =  "https://firebasestorage.googleapis.com/v0/b/fitandfight.appspot.com/o/". $str ."?alt=media";

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
        $istructor = $input['instructor'];
        $period = [
            'startDate' => $input['startDate'],
            'endDate' => $input['endDate']
        ];
        $weekly = $days;
        $userList = [];


        $coll = Firestore::collection('Courses');

        $corso = new CourseModel(
            null,
            $name,
            $documentImage,
            $istructor,
            $period,
            $weekly,
            $userList
        );
        $coll->add(CoursesManager::trasformCourseToArrayCourse($corso));

        toastr()->success('Corso inserito');
        return redirect('/corsi');

    }

}
