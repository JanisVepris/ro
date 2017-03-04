<?php

namespace RoBundle\Service;

use Doctrine\ORM\EntityManager;
use RoBundle\Entity\Event;
use RoBundle\Entity\Video;
use RoBundle\Entity\VideoPlaylist;

class VideoPlaylistService
{
    /** @var EntityManager */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function createPlaylistForEvent(Event $event)
    {
        $playlist = new VideoPlaylist();
        $playlist->setEvent($event);

        $this->em->persist($playlist);
        $this->em->flush($playlist);
    }

    public function savePlaylistVideos(VideoPlaylist $videoPlaylist)
    {
        $this->em->persist($videoPlaylist);
        $this->em->flush();
    }

    public function deleteVideo(Video $video)
    {
        $this->em->remove($video);
        $this->em->flush();
    }
}
