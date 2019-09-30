<?php

namespace App\Http\Models\SubscriptionModels;
/**
 *
 */
class SubscriptionRevenueModel extends SubscriptionModel
{
  private $numberOfEntriesMade;
  private $numberOfEntries;

  function __construct($idDatabase,$idUserDatabase,$status,$type,$numberOfEntries,$numberOfEntriesMade)
  {
    parent::__construct($idDatabase,$idUserDatabase,$status,$type);

    $this->numberOfEntries = $numberOfEntries;
    $this->numberOfEntriesMade = $numberOfEntriesMade;

  }

    /**
     * Get the value of Number Of Entries Made
     *
     * @return mixed
     */
    public function getNumberOfEntriesMade()
    {
        return $this->numberOfEntriesMade;
    }

    /**
     * Set the value of Number Of Entries Made
     *
     * @param mixed numberOfEntriesMade
     *
     * @return self
     */
    public function setNumberOfEntriesMade($numberOfEntriesMade)
    {
        $this->numberOfEntriesMade = $numberOfEntriesMade;

        return $this;
    }

    /**
     * Get the value of Number Of Entries
     *
     * @return mixed
     */
    public function getNumberOfEntries()
    {
        return $this->numberOfEntries;
    }

    /**
     * Set the value of Number Of Entries
     *
     * @param mixed numberOfEntries
     *
     * @return self
     */
    public function setNumberOfEntries($numberOfEntries)
    {
        $this->numberOfEntries = $numberOfEntries;

        return $this;
    }

}


 ?>
