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
use Illuminate\Pagination\LengthAwarePaginator;

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

    public static function getAllCoursesView(Request $request){
      $currentPage = LengthAwarePaginator::resolveCurrentPage();
      $courses = CoursesManager::getCoursesDBOrCoursesSession($request,$currentPage);

      $itemCollection = collect($courses);
      $perPage = 1;
      $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
      $courses = new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
      $courses->setPath($request->url());

      return view('courses', compact('courses'));
    }

    public static function getCoursesDBOrCoursesSession(Request $request,$currentPage){
      if($currentPage == 1){
        $documents = CoursesManager::getAllCourses();
        $request->session()->put('Courses', $documents);

      }
      else{
        $documents = $request->session()->pull('Courses');
        $request->session()->put('Courses', $documents);
      }
      return $documents;

    }

    public static function trasformArrayCourseToCourse($arrayCourse){
        $idDatabase = data_get($arrayCourse,'idDatabase');
        $name = data_get($arrayCourse,'name');
        $image = data_get($arrayCourse,'image');
        $isActive = data_get($arrayCourse,'isActive');
        $instructor = data_get($arrayCourse,'instructor');
        $period = data_get($arrayCourse,'period');
        $weeklyFrequency = data_get($arrayCourse,'weeklyFrequency') ;
        $usersList = data_get($arrayCourse,'usersList') ;

        $course = new CourseModel($idDatabase,$name,$image,$isActive,$instructor,$period,$weeklyFrequency,$usersList);

        return $course;
    }
    public static function trasformCourseToArrayCourse($course){
        $idDatabase = $course->getIdDatabase();
        $name = $course->getName();
        $image = $course->getImage();
        $isActive = $course->getIsActive();
        $instructor = $course->getInstructor();
        $period = $course->getPeriod();
        $weeklyFrequency = $course->getWeeklyFrequency();
        $usersList = $course->getUsersList();

        $arrayCourse = array(
            'idDatabase' => $idDatabase,
            'name' => $name,
            'image' => $image,
            'isActive' => $isActive,
            'instructor' => $instructor,
            'period' => $period,
            'weeklyFrequency' => $weeklyFrequency,
            'usersList' => $usersList
        );

        return $arrayCourse;
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

        $image =  "https://firebasestorage.googleapis.com/v0/b/fitandfight.appspot.com/o/". $str ."?alt=media";

        $days = array();

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
        $instructor = $input['instructor'];
        $period = [
            'startDate' => $input['startDate'],
            'endDate' => $input['endDate']
        ];
        $weeklyFrequency = $days;
        $usersList = array();


        $coll = Firestore::collection('Courses');

        $corso = array(
            'name' => $name,
            'image' => $image,
            'isActive' => TRUE,
            'instructor' => $instructor,
            'period' => $period,
            'weeklyFrequency' => $weeklyFrequency,
            'usersList' => $usersList
        );

        $coll->add($corso);

        toastr()->success('Corso inserito');
        return redirect('/gestioneCorsi');

    }

}
