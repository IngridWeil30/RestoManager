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
 * TipsRevenueRepository
 *
 * @ORM\Table(name="tips_revenue")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TipsRevenueRepository")
 */

class TipsRevenue
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
     * @ORM\Column(name="tip_amount", type="float", nullable=true)
     */
    private $tipAmount;

    /**
     * @var float
     *
     * @ORM\Column(name="sum_tips", type="float", nullable=true)
     */
    private $sumTips;

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
     * @return TipsRevenue
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
     * Set tipAmount
     *
     * @param float $tipAmount
     *
     * @return TipsRevenue
     */
    public function setTipAmount($tipAmount)
    {
        $this->tipAmount = $tipAmount;

        return $this;
    }

    /**
     * Get tipAmount
     *
     * @return float
     */
    public function getTipAmount()
    {
        return $this->tipAmount;
    }

    /**
     * Set sumTips
     *
     * @param float $sumTips
     *
     * @return TipsRevenue
     */
    public function setSumTips($sumTips)
    {
        $this->sumTips = $sumTips;

        return $this;
    }

    /**
     * Get sumTips
     *
     * @return float
     */
    public function getSumTips()
    {
        return $this->sumTips;
    }
}
