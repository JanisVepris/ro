<?php
namespace RoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use RoBundle\Entity\Article;
use RoBundle\Entity\Event;

class ArticleRepository extends EntityRepository
{
    /**
     * @param Event $event
     * @return Article[]
     */
    public function findAllPublishedArticlesByEvent(Event $event)
    {
        return $this
            ->createQueryBuilder('a')
            ->where('a.event = :event')
            ->andWhere('a.published = :published')
            ->orderBy('a.createdOn', 'DESC')
            ->setParameter('event', $event)
            ->setParameter('published', true)
            ->getQuery()
            ->getResult();
    }
}
