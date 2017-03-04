<?php
namespace RoBundle\Service;

use Doctrine\ORM\EntityManager;
use RoBundle\Entity\Event;
use RoBundle\Entity\Lyric;
use RoBundle\Entity\Lyrics;

class LyricsService
{
    /** @var EntityManager */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function createLyrics(Event $event)
    {
        $lyrics = new Lyrics();
        $lyrics->setEvent($event);
        $event->setLyrics($lyrics);
        $this->em->persist($event);
        $this->em->flush();
    }

    public function saveLyric(Event $event, Lyric $lyric)
    {
        if (!$event->hasLyricsRelation()) {
            $this->createLyrics($event);
        }

        $lyrics = $event->getLyrics();

        $lyric->setLyrics($lyrics);
        $lyrics->addLyric($lyric);
        $this->em->persist($lyrics);
        $this->em->flush();
    }
}
