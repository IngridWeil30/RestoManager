<?php
/**
 * Created by PhpStorm.
 * User: ingridweil
 * Date: 6/7/18
 * Time: 6:02 PM
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * DailyRevenue
 *
 * @ORM\Table(name="daily_revenue")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DailyRevenue")
 */

class DailyRevenue
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="input_revenue", type="float", nullable=true)
     */
    private $inputRevenue;

    /**
     * @var float
     *
     * @ORM\Column(name="final_revenue", type="float", nullable=true)
     */
    private $finalRevenue;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return DailyRevenue
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set inputRevenue
     *
     * @param float $inputRevenue
     *
     * @return DailyRevenue
     */
    public function setInputRevenue($inputRevenue)
    {
        $this->inputRevenue = $inputRevenue;

        return $this;
    }

    /**
     * Get inputRevenue
     *
     * @return float
     */
    public function getInputRevenue()
    {
        return $this->inputRevenue;
    }

    /**
     * Set finalRevenue
     *
     * @param float $finalRevenue
     *
     * @return DailyRevenue
     */
    public function setFinalRevenue($finalRevenue)
    {
        $this->finalRevenue = $finalRevenue;

        return $this;
    }

    /**
     * Get finalRevenue
     *
     * @return float
     */
    public function getFinalRevenue()
    {
        return $this->finalRevenue;
    }
}
