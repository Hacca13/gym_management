<?php

namespace App\Http\Models;

use Illuminate\Support\Arr;

/**
 *
 */
class CourseModel extends AnotherClass
{
  private $idDatabase;
  private $name;
  private $image;
  private private $instructor;
  private $numberOfSubscribers;
  private $period;
  /*
      $period:
          $startDate;
          $endDate;
  */
  private $weeklyFrequency;
  /*  array
      $weeklyFrequency:
          0:
              $day;
              $startTime:
                  $hour;
                  $minutes;
              $endTime:
                  $hour;
                  $minutes;
          1:
              $day;
              $startTime:
                  $hour;
                  $minutes;
              $endTime:
                  $hour;
                  $minutes;
  */

  function __construct($idDatabase,$name,$image,$instructor,$numberOfSubscribers,$period,$weeklyFrequency)
  {
    $this->idDatabase = $idDatabase;
    $this->name = $name;
    $this->image = $image;
    $this->instructor = $instructor;
    $this->numberOfSubscribers = $numberOfSubscribers;
    $this->period = array(

      'startDate' => data_get($period, 'startDate');,
      'endDate' => data_get($period, 'endDate')

    );


    $localCounter=0;
    $this->weeklyFrequency =  array(
      foreach ($weeklyFrequency as $day) {
          'day'.$localCounter => array(
              'startTime' => array(
                  'hour' => data_get($day,'startTime.hour') ,
                  'minutes' => data_get($day,'startTime.minutes')
              ), 
              '$endTime' => array(
                  'hour' => data_get($day,'endTime.hour') ,
                  'minutes' => data_get($day,'endTime.minutes')
              )
          );

          $localCounter++;
      }

    );

  }
}


 ?>
