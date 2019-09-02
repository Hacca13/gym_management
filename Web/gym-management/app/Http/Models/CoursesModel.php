<?php

namespace App\Http\Models;

use Illuminate\Support\Arr;

/**
 *
 */
class CourseModel extends AnotherClass
{
  $idDatabase;
  $name;
  $image;
  $instructor;
  $numberOfSubscribers;
  $period;
  /*
      $period:
          $startDate;
          $endDate;
  */
  $weeklyFrequency;
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
    $this->$idDatabase = $idDatabase;
    $this->$name = $name;
    $this->$image = $image;
    $this->$instructor = $instructor;
    $this->$numberOfSubscribers = $numberOfSubscribers;
    $this->$period = Arr::add(
        [
          'startDate' => get($period, 'startDate');,
          'endDate' => get($period, 'endDate');
        ]
    );
    $localCounter=0;
    $this->$weeklyFrequency = Arr::add(
        [
          foreach ($weeklyFrequency as $day) {
            'day'.$localCounter = Arr::add(
                [
                  'startTime' = Arr::add(
                        [
                          'hour' = get($day,'startTime.hour');,
                          'minutes' = get($day,'startTime.minutes');
                        ]
                   );,
                  '$endTime' = Arr::add(
                        [
                          'hour' = get($day,'endTime.hour');,
                          'minutes' = get($day,'endTime.minutes');
                        ]
                   );
                ]
             );

            $localCounter++;
          }


        ]
    );

  }
}


 ?>
