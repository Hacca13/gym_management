<?php

namespace App\Http\Controllers;
use DateTime;
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

    public static function setCourseView($id,Request $request){
        $documents = $request->session()->pull('Courses');
        $request->session()->put('Courses', $documents);

        foreach ($documents as $document) {
          if($id == $document->getIdDatabase()){
            $course = $document;
          }
        }

        return view('setCourse', compact('course'));
    }

    public static function setCourse(Request $request){
      $input = $request->all();

      $timestampStartDate = strtotime($input['startDate']);
      $startDate = date("d-m-Y", $timestampStartDate);
      $timestampEndDate = strtotime($input['endDate']);
      $endDate = date("d-m-Y", $timestampEndDate);
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
      $input['instructor'] = strtolower($input['instructor']);
      $name = $input['name'];
      $instructor = $input['instructor'];
      $period = [
          'startDate' => $startDate,
          'endDate' => $endDate
      ];
      $weeklyFrequency = $days;
      $usersList = array();

      if(isset($input['courseImage'])){
        $uploadedImage = $request->file("courseImage");
        $firebase = (new Firebase\Factory());
        $bucket = $firebase->createStorage()->getBucket();
        $input['name'] = strtolower($input['name']);
        $name = $input['name'] . '.' . $uploadedImage->getClientOriginalExtension();
        $str = $bucket->upload(file_get_contents($uploadedImage),
            [
                'name' => $name
            ]);

        $external = "19/10/2100 14:48:21";
        $format = "d/m/Y H:i:s";
        $dateobj = DateTime::createFromFormat($format, $external);

        $image = $str->signedUrl($dateobj).PHP_EOL;


      }
      else{
        $image = $input['oldCourseImage'];
      }

      $corso = array(
          'name' => $name,
          'image' => $image,
          'isActive' => TRUE,
          'instructor' => $instructor,
          'period' => $period,
          'weeklyFrequency' => $weeklyFrequency,
          'usersList' => $usersList
      );

      $collection = Firestore::collection('Courses');
      $collection->document($input['idDatabase'])->set($corso);

      toastr()->success('Corso modificato con successo');
      return redirect('/admin/gestioneCorsi');
    }


    public static function searchCourses(Request $request){
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $input = $request->all();
        $input['searchInput'] = strtolower($input['searchInput']);

        if(isset($input['searchInput'])){
            $input = $input['searchInput'];
            $request->session()->put('searchInput', $input);
        }else{
            $input = $request->session()->pull('searchInput');
            $request->session()->put('searchInput', $input);
        }
        $url = substr($request->url(), 0, strlen($request->url())-24);
        $url = $url.'/admin/coursesPageSearchResults';

        $coursesResultList = CoursesManager::getCoursesDBOrCoursesSessionForSearchPage($request,$currentPage,$input);

        $itemCollection = collect($coursesResultList);
        $perPage = 6;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $coursesResultList = new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $coursesResultList->setPath($url);


        return view('coursesPageSearchResult', compact('coursesResultList'));
    }

    public static function getCoursesDBOrCoursesSessionForSearchPage($request,$currentPage,$input){
        if($currentPage == 1){
            $coursesResultList = CoursesManager::searchCoursesPartially($input);
            $request->session()->put('coursesResultList', $coursesResultList);
        }
        else{
            $coursesResultList = $request->session()->pull('coursesResultList');
            $request->session()->put('coursesResultList', $coursesResultList);
        }
        return $coursesResultList;
    }

    public static function searchCoursesPartially($input){
        $coursesResultList = array();
        $input = strtolower($input);
        $collection = Firestore::collection('Courses');
        $documents = $collection->orderBy('name')->startAt([$input])->endAt([$input.'z'])->documents();

        foreach ($documents as $document) {
            $course = CoursesManager::trasformArrayCourseToCourse($document->data());
            $course->setName(ucfirst($course->getName()));
            $course->setInstructor(ucfirst($course->getInstructor()));
            $course->setIdDatabase($document->id());
            array_push($coursesResultList,$course);
        }

        return $coursesResultList;

    }


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
        $instructor = strtolower($instructor);
        $collection = Firestore::collection('Courses');
        $query = $collection->where('instructor', '=' ,$instructor);
        $documents = $query->documents();
        foreach ($documents as $document){
            $course = CoursesManager::trasformArrayCourseToCourse($document->data());
            $course->setName(ucfirst($course->getName()));
            $course->setInstructor(ucfirst($course->getInstructor()));
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
            $course->setName(ucfirst($course->getName()));
            $course->setInstructor(ucfirst($course->getInstructor()));
            $course->setIdDatabase($document->id());

            $endDate = data_get($course->getPeriod() ,'endDate');

            if(CoursesManager::isExpired($endDate)){
                $course->setIsActive(false);
                $courseSet = CoursesManager::trasformCourseToArrayCourse($course);
                unset($courseSet['idDatabase']);
                $collection->document($document->id())->set($courseSet);
            }

            array_push($allCourses,$course);
        }

        return $allCourses;
    }

    public static function isExpired($endDate){
        $today = date("Y-m-d");
        $timestamp = strtotime($endDate);
        $endDate = date("Y-m-d", $timestamp);

        if($endDate < $today){
            return true;
        }
        else{
            return false;
        }

    }

    public static function getAllCoursesView(Request $request){
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $courses = CoursesManager::getCoursesDBOrCoursesSession($request,$currentPage);

        $itemCollection = collect($courses);
        $perPage = 6;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $courses = new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $courses->setPath($request->url());

        return view('coursesPage', compact('courses'));
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

        $timestampStartDate = strtotime($input['startDate']);
        $startDate = date("d-m-Y", $timestampStartDate);
        $timestampEndDate = strtotime($input['endDate']);
        $endDate = date("d-m-Y", $timestampEndDate);

        $uploadedImage = $request->file("courseImage");

        $firebase = (new Firebase\Factory());

        $bucket = $firebase->createStorage()->getBucket();
        $input['name'] = strtolower($input['name']);

        $name = $input['name'] . '.' . $uploadedImage->getClientOriginalExtension();

        $str = $bucket->upload(file_get_contents($uploadedImage),
            [
                'name' => $name
            ]);

        $external = "19/10/2100 14:48:21";
        $format = "d/m/Y H:i:s";
        $dateobj = DateTime::createFromFormat($format, $external);

        $image = $str->signedUrl($dateobj).PHP_EOL;

        //$image =  "https://firebasestorage.googleapis.com/v0/b/fitandfight.appspot.com/o/". $str ."?alt=media";

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
        $input['instructor'] = strtolower($input['instructor']);
        $name = $input['name'];
        $instructor = $input['instructor'];
        $period = [
            'startDate' => $startDate,
            'endDate' => $endDate
        ];
        $weeklyFrequency = $days;
        $usersList = array();


        $coll = Firestore::collection('Courses')->newDocument();

        $corso = array(
            'name' => $name,
            'image' => $image,
            'isActive' => TRUE,
            'instructor' => $instructor,
            'period' => $period,
            'weeklyFrequency' => $weeklyFrequency,
            'usersList' => $usersList
        );

        $coll->set($corso);

        toastr()->success('Corso inserito');
        return redirect('/admin/gestioneCorsi');

    }

    public function jsonCrs() {
        $courses = CoursesManager::getAllCourses();
        $arr = [];
        foreach ($courses as $crs) {
            array_push($arr, CoursesManager::trasformCourseToArrayCourse($crs));
        }
        return response()->json($arr);
    }

    public static function removeUserToCourse($idCourseDatabase,$idUserDatabase) {
      $collection = Firestore::collection('Courses');
      $documents = $collection->document($idCourseDatabase)->snapshot()->data();

      for ($i=0; $i < count($documents['usersList']) ; $i++) {
        if($documents['usersList'][$i] == $idUserDatabase){
          array_splice($documents['usersList'],$i, 1);
        }
      }

      $collection->document($idCourseDatabase)->set($documents);
    }

    public static function addUserToCourse(Request $request) {

        $input = $request->all();
        //var_dump($input);
        $courses = self::getCourseByID($input["course"]);
        $userList = $courses->getUsersList();
        array_push($userList, $input["user"]);
        $courses->setUsersList($userList);
        $corso = array(
            'idDatabase' => $courses->getIdDatabase(),
            'name' => $courses->getName(),
            'image' => $courses->getImage(),
            'isActive' => $courses->getIsActive(),
            'instructor' => $courses->getInstructor(),
            'period' => $courses->getPeriod(),
            'weeklyFrequency' => $courses->getWeeklyFrequency(),
            'usersList' => $courses->getUsersList()
        );
        $factory = (new Firebase\Factory());
        $firestore = $factory->createFirestore();
        $database = $firestore->database();
        $ref = $database->collection('Courses')->document($input["course"]);
        $ref->set($corso);
        return "/gestioneCorsi";

    }

    public static function getCourseByID($id) {
        $courses = Firestore::collection('Courses')->document($id)->snapshot();
        $arrCourse = CoursesManager::trasformArrayCourseToCourse($courses);
        return $arrCourse;
    }

    public static function pelo() {

        $factory = (new Firebase\Factory());
        $firestore = $factory->createFirestore();
        $database = $firestore->database();
        $ref = $database->collection('Courses')->document('a405eea7aabd467d95d4');
        $doc = $ref->snapshot();
        $ref->set($doc);


    }

}
