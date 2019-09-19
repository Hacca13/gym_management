private <?php

namespace App\Http\Models\SubscriptionModels;

/**
 *
 */
class SubscriptionCourseModel extends SubscriptionModel
{

  private $ididCourseDatabase;
  private $startDate;
  private $endDate;

  function __construct($idDatabase,$idUserDatabase,$status,$type,$ididCourseDatabase,$startDate,$endDate)
  {
    parent::__construct($idDatabase,$idUserDatabase,$status,$type);
    // code...

    $this->idCourseDatabase = $idCourseDatabase;
    $this->startDate = $startDate;
    $this->endDate = $endDate;

  }

    /**
     * Get the value of Idid Course Database
     *
     * @return mixed
     */
    public function getIdidCourseDatabase()
    {
        return $this->ididCourseDatabase;
    }

    /**
     * Set the value of Idid Course Database
     *
     * @param mixed ididCourseDatabase
     *
     * @return self
     */
    public function setIdidCourseDatabase($ididCourseDatabase)
    {
        $this->ididCourseDatabase = $ididCourseDatabase;

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
