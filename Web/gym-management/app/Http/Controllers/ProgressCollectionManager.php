<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Firevel\Firestore\Facades\Firestore;
use App\Http\Models\ProgressCollectionModel;

class ProgressCollectionManager extends Controller
{

  public static function getProgressCollectionByUserId($idUserDatabase){
    $allProgressCollection = array();
    $collection = Firestore::collection('ProgressCollection');
    $query = $collection->where('idUserDatabase','=',$idUserDatabase);
    $documents = $query->documents();
    foreach ($documents as $document) {
      $progressCollection = ProgressCollectionManager::trasformArrayProgressCollectionToProgressCollection($document->data());
      $progressCollection->setIdDatabase($document->id());
      array_push($allProgressCollection,$progressCollection);
    }
    return $allProgressCollection;
  }

    public static function getAllProgressCollection(){
      $allProgressCollection = array();
      $collection = Firestore::collection('ProgressCollection');
      $documents = $collection->documents();

      foreach ($documents as $document) {
        $progressCollection = ProgressCollectionManager::trasformArrayProgressCollectionToProgressCollection($document->data());
        $progressCollection->setIdDatabase($document->id());
        array_push($allProgressCollection,$progressCollection);
      }
      return $allProgressCollection;
    }

    public static function trasformArrayProgressCollectionToProgressCollection($arrayProgressCollection){
      $idDatabase = data_get($arrayProgressCollection,'idDatabase');
      $idUserDatabase = data_get($arrayProgressCollection,'idUserDatabase');
      $progress = data_get($arrayProgressCollection,'progress');

      $ProgressCollection = new ProgressCollectionModel($idDatabase,$idUserDatabase,$progress);

      return $ProgressCollection;
    }
    public static function trasformProgressCollectionToArrayProgressCollection($progressCollection){
      $idDatabase = $progressCollection->getIdDatabase();
      $idUserDatabase = $progressCollection->getIdUserDatabase();
      $progress = $progressCollection->getProgress();

      $arrayProgressCollection = array(
        'idDatabase' => $idDatabase,
        'idUserDatabase' => $idUserDatabase,
        'progress' => $progress
      );

      return $arrayProgressCollection;
    }
}
