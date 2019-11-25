<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datetime = date("l");
        $nameDay = strtolower( $datetime);

        if($nameDay == 'monday'){
          $nameDay = 'Lunedì';
        }
        elseif ($nameDay == 'tuesday') {
          $nameDay = 'Martedí';
        }
        elseif ($nameDay == 'wednesday') {
          $nameDay = 'Mercoledí';
        }
        elseif ($nameDay == 'thursday') {
          $nameDay = 'Giovedì';
        }
        elseif ($nameDay == 'friday') {
          $nameDay = 'Venerdì';
        }
        elseif ($nameDay == 'saturday') {
          $nameDay = 'Sabato';
        }
        else {
          $nameDay = 'Domenica';
        }

        $listCoursesToday = CoursesManager::getDayCourse($nameDay);

        return view('index', compact('listCoursesToday'));

    }

}
