<?php

namespace App\Http\Models\SubscriptionModels;
/**
 *
 */
class SubscriptionPeriodModel extends SubscriptionModel
{

  $startDate;
  $endDate;

  function __construct($idDatabase,$idUserDatabase,$status,$type,$startDate,$endDate)
  {
    parent::__construct($idDatabase,$idUserDatabase,$status,$type);

    $this->startDate = $startDate;
    $this->endDate = $endDate;
  }
}

 ?>
