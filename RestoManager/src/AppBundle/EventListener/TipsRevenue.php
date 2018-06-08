<?php
/**
 * Created by PhpStorm.
 * User: ingridweil
 * Date: 5/29/18
 * Time: 4:14 PM
 */

namespace AppBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\TipsRevenue as DailyRevenueEntity;

class TipsRevenue
{
    public function prePersist(LifecycleEventArgs $args)
    {
        $tipsRevenue = $args->getEntity();

        if (!$tipsRevenue instanceof TipsRevenue) {
            return;
        }

        $tipAmount = $tipsRevenue->getInputRevenue();

        if ($tipAmount > 0) {
            $tipsRevenue->setInputRevenue($tipAmount);
        } else {
            echo('A tip cannot have a null value');
        }
    }
}