<?php

namespace App\Http\Models\SubscriptionModels;

/**
 *
 */
class SubscriptionCourseModel extends SubscriptionModel
{

  private $idCourseDatabase;
  private $startDate;
  private $endDate;

  function __construct($idDatabase,$idUserDatabase,$status,$type,$idCourseDatabase,$startDate,$endDate)
  {
    parent::__construct($idDatabase,$idUserDatabase,$status,$type);
    // code...

    $this->idCourseDatabase = $idCourseDatabase;
    $this->startDate = $startDate;
    $this->endDate = $endDate;

  }

    /**
     * Get the value of id Course Database
     *
     * @return mixed
     */
    public function getIdCourseDatabase()
    {
        return $this->idCourseDatabase;
    }

    /**
     * Set the value of id Course Database
     *
     * @param mixed idCourseDatabase
     *
     * @return self
     */
    public function setIdCourseDatabase($idCourseDatabase)
    {
        $this->idCourseDatabase = $idCourseDatabase;

        return $this;
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
