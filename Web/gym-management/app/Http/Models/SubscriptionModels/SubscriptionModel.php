<?php

namespace App\Http\Models\SubscriptionModels;

/**
 *
 */
class SubscriptionModel
{

  protected $idDatabase;
  protected $idUserDatabase;
  protected $status;
  protected $type;

  function __construct($idDatabase,$idUserDatabase,$status,$type)
  {
    $this->idDatabase = $idDatabase;
    $this->idUserDatabase = $idUserDatabase;
    $this->status = $status;
    $this->type = $type;
  }
}




 ?>
