<?php
namespace RoBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EventRepository  extends EntityRepository
{
    /**
     * @param string $order
     * @return array
     */
    public function getEventsOrderedByDate($order = 'DESC')
    {
        return $this
            ->createQueryBuilder('e')
            ->orderBy('e.eventDate', $order)
            ->getQuery()
            ->getResult();
    }
}
