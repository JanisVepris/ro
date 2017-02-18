<?php
namespace RoBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EventRepository  extends EntityRepository
{
    public function getEventsOrderedByDate($order = 'DESC')
    {
        return $this
            ->createQueryBuilder('e')
            ->orderBy('e.eventDate', $order)
            ->getQuery()
            ->getResult();
    }
}
