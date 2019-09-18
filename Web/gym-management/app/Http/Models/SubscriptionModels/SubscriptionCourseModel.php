<?php

namespace App\Http\Models\SubscriptionModels;

/**
 *
 */
class SubscriptionCourseModel extends SubscriptionModel
{

  $ididCourseDatabase;
  $startDate;
  $endDate;

  function __construct($idDatabase,$idUserDatabase,$status,$type,$ididCourseDatabase,$startDate,$endDate)
  {
    parent::__construct($idDatabase,$idUserDatabase,$status,$type);
    // code...

    $this->idCourseDatabase = $idCourseDatabase;
    $this->startDate = $startDate;
    $this->endDate = $endDate;

  }
}

 ?>
