<?php
/**
 * Created by PhpStorm.
 * User: ingridweil
 * Date: 5/29/18
 * Time: 4:14 PM
 */

namespace AppBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\DailyRevenue as DailyRevenueEntity;

class DailyRevenue
{
    public function prePersist(LifecycleEventArgs $args)
    {
        $dailyRevenue = $args->getEntity();

        if (!$dailyRevenue instanceof DailyRevenueEntity) {
            return;
        }

        $inputRevenue = $dailyRevenue->getInputRevenue();
        //$date = $dailyRevenue->getDate();

       // if ($inputRevenue > 0 ) {
            $dailyRevenue->setInputRevenue($inputRevenue);
            $hello = $dailyRevenue->getInputRevenue();
            //var_dump($inputRevenue);
//        } else {
//                $dailyRevenue->setInputRevenue(0);
//            }
        }
}