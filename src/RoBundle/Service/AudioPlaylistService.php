<?php
namespace RoBundle\Service;

use Doctrine\ORM\EntityManager;
use RoBundle\Entity\Event;
use RoBundle\Entity\Playlist;
use RoBundle\Entity\Track;
use Stof\DoctrineExtensionsBundle\Uploadable\UploadableManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AudioPlaylistService
{
    /** @var EntityManager */
    private $em;

    /** @var UploadableManager */
    private $uploadableManager;

    public function __construct(EntityManager $em, UploadableManager $uploadableManager)
    {
        $this->em = $em;
        $this->uploadableManager = $uploadableManager;
    }

    public function createPlaylist(Event $event)
    {
        $playlist = new Playlist();

        $playlist->setEvent($event);
        $event->setPlaylist($playlist);
        $this->em->persist($playlist);
        $this->em->persist($event);
        $this->em->flush();
    }

    public function addTrack(Event $event, Track $track)
    {
        if ($track->getFile() instanceof UploadedFile) {
            $this->uploadableManager->markEntityToUpload(
                $track,
                $track->getFile()
            );
        }

        if (!$event->hasPlaylistRelation()) {
            $this->createPlaylist($event);
        }

        $playlist = $event->getPlaylist();
        $playlist->addTrack($track);
        $track->setPlaylist($playlist);

        $this->em->persist($playlist);
        $this->em->flush();
    }

    public function deleteTrack(Track $track)
    {
        $this->em->remove($track);
        $this->em->flush();
    }
}
