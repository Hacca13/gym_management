<?php

namespace App\Http\Models\SubscriptionModels;
/**
 *
 */
class SubscriptionPeriodModel extends SubscriptionModel
{

  private $startDate;
  private $endDate;

  function __construct($idDatabase,$idUserDatabase,$status,$type,$startDate,$endDate)
  {
    parent::__construct($idDatabase,$idUserDatabase,$status,$type);

    $this->startDate = $startDate;
    $this->endDate = $endDate;
  }

    /**
     * Get the value of Start Date
     *
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set the value of Start Date
     *
     * @param mixed startDate
     *
     * @return self
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get the value of End Date
     *
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set the value of End Date
     *
     * @param mixed endDate
     *
     * @return self
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

}

 ?>
