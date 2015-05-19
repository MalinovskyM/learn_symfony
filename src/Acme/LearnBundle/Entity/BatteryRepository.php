<?php

namespace Acme\LearnBundle\Entity;
use Doctrine\ORM\EntityRepository;

class BatteryRepository extends EntityRepository
{
    public function countAll()
    {
        return $this->createQueryBuilder('b')
            ->select('b.type, count(b.id) AS num')
            ->groupBy('b.type')
            ->getQuery()
            ->getResult();
    }

    public function reset()
    {
        return $this->createQueryBuilder('b')
            ->delete()
            ->getQuery()
            ->getResult();
    }
}
