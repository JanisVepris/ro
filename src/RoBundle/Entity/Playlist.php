<?php
namespace RoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="ro3_playlist")
 * @ORM\Entity()
 */
class Playlist
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Event
     * @ORM\OneToOne(targetEntity="RoBundle\Entity\Event", inversedBy="poster")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     */
    private $event;

    /**
     * @var ArrayCollection|Track[]
     * @ORM\OneToMany(targetEntity="RoBundle\Entity\Track", mappedBy="playlist", cascade={"persist", "remove"})
     */
    private $tracks;

    public function __construct()
    {
        $this->tracks = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param Event $event
     * @return Playlist
     */
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }

    public function getTracks()
    {
        return $this->tracks;
    }

    /**
     * @param ArrayCollection|Track[] $tracks
     * @return Playlist
     */
    public function setTracks($tracks)
    {
        $this->tracks = $tracks;

        return $this;
    }

    public function addTrack(Track $track)
    {
        if (!$this->tracks->contains($track)) {
            $this->tracks->add($track);
        }

        return $this;
    }

    public function removeTrack(Track $track)
    {
        if ($this->tracks->contains($track)) {
            $this->tracks->removeElement($track);
        }

        return $this;
    }
}
