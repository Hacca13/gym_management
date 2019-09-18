<?php

namespace App\Http\Models\SubscriptionModels;
/**
 *
 */
class SubscriptionRevenueModel extends SubscriptionModel
{

  $numberOfEntries;

  function __construct($idDatabase,$idUserDatabase,$status,$type,$numberOfEntries,$numberOfEntriesMade)
  {
    parent::__construct($idDatabase,$idUserDatabase,$status,$type);

    $this->numberOfEntries = $numberOfEntries;
    $this->numberOfEntriesMade = $numberOfEntriesMade;

  }
}


 ?>
