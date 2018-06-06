<?php
/**
 * Created by PhpStorm.
 * User: ingridweil
 * Date: 6/6/18
 * Time: 1:13 PM
 */

namespace AppBundle\Repository;


class UserRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAllWaiters() {
        {
            $qb = $this->createQueryBuilder('p');
            return $qb->where("p.roles NOT LIKE '%ROLE_MANAGER%'")
                ->getQuery()->getResult();
        }
    }
}
