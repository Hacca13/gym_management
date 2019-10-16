<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use App\Http\Models\SubscriptionModels\SubscriptionModel;
use App\Http\Models\SubscriptionModels\SubscriptionCourseModel;
use App\Http\Models\SubscriptionModels\SubscriptionPeriodModel;
use App\Http\Models\SubscriptionModels\SubscriptionRevenueModel;

class SubscriptionManager extends Controller
{

    public static function getAllSubscription(){
      $allSubscriptions = array();
      $collection = Firestore::collection('Subscriptions');
      $documents = $collection->documents();

      foreach ($documents as $document) {
        $subscription = SubscriptionManager::trasformArraySubscriptionToSubscription($document->data());
        $subscription->setIdDatabase($document->id());
        array_push($allSubscriptions,$subscription);
      }
      return $allSubscriptions;
    }

    public static function getSubscriptionByUser($idUserDatabase){
      $allSubscriptions = array();
      $collection = Firestore::collection('Subscriptions');
      $query = $collection->where('idUserDatabase','=',$idUserDatabase);
      $documents = $query->documents();
      foreach ($documents as $document) {
        $subscription = SubscriptionManager::trasformArraySubscriptionToSubscription($document->data());
        $subscription->setIdDatabase($document->id());
        array_push($allSubscriptions,$subscription);
      }
      return $allSubscriptions;
    }


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

    public static function trasformSubscriptionToArraySubscription($subscription){

      if($subscription->getType() == 'course'){
        $arraySubscription = array(
          'idDatabase' => $subscription->getIdDatabase(),
          'idUserDatabase' => $subscription->getIdUserDatabase(),
          'isActive' => $subscription->getIsActive(),
          'type' => $subscription->getType(),
          'idCourseDatabase' => $subscription->getIdCourseDatabase(),
          'startDate' => $subscription->getStartDate(),
          'endDate' => $subscription->getEndDate()
        );
      }
      elseif($subscription->getType() == 'period'){
        $arraySubscription = array(
          'idDatabase' => $subscription->getIdDatabase(),
          'idUserDatabase' => $subscription->getIdUserDatabase(),
          'isActive' => $subscription->getIsActive(),
          'type' => $subscription->getType(),
          'startDate' => $subscription->getStartDate(),
          'endDate' => $subscription->getEndDate()
        );
      }
      else{
        $arraySubscription = array(
          'idDatabase' => $subscription->getIdDatabase(),
          'idUserDatabase' => $subscription->getIdUserDatabase(),
          'isActive' => $subscription->getIsActive(),
          'type' => $subscription->getType(),
          'numberOfEntries' => $subscription->getNumberOfEntries(),
          'numberOfEntriesMade' => $subscription->getNumberOfEntriesMade()
        );
      }

      return $arraySubscription;
    }


}
