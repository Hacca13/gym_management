<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\SubscriptionModels\SubscriptionModel;
use App\Http\Models\SubscriptionModels\SubscriptionCourseModel;
use App\Http\Models\SubscriptionModels\SubscriptionPeriodModel;
use App\Http\Models\SubscriptionModels\SubscriptionRevenueModel;

class SubscriptionManager extends Controller
{





    public static function trasformArraySubscriptionToSubscription($arraySubscription){
      $idDatabase = data_get($arraySubscription,'idDatabase');
      $idUserDatabase = data_get($arraySubscription,'idUserDatabase');
      $isActive = data_get($arraySubscription,'isActive');
      $type = data_get($arraySubscription,'type');

      if($type == 'course'){
        $idCourseDatabase = data_get($arraySubscription,'idCourseDatabase');
        $startDate = data_get($arraySubscription,'startDate');
        $endDate = data_get($arraySubscription,'endDate');

        $subscription = new SubscriptionCourseModel($idDatabase,$idUserDatabase,$isActive,$type,$idCourseDatabase,$startDate,$endDate);
      }
      elseif($type == 'period'){
        $startDate = data_get($arraySubscription,'startDate');
        $endDate = data_get($arraySubscription,'endDate');

        $subscription = new SubscriptionPeriodModel($idDatabase,$idUserDatabase,$isActive,$type,$startDate,$endDate);
      }
      else{
        $numberOfEntries =  data_get($arraySubscription,'numberOfEntries');
        $numberOfEntriesMade =  data_get($arraySubscription,'numberOfEntriesMade');

        $subscription = new SubscriptionRevenueModel($idDatabase,$idUserDatabase,$isActive,$type,$numberOfEntries,$numberOfEntriesMade);
      }

      return $subscription;
    }

    public static function trasformSubscriptionToArraySubscription($Subscription){

    }


}
