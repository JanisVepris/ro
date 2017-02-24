<?php
namespace RoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="ro3_video_playlist")
 * @ORM\Entity()
 */
class VideoPlaylist
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
     * @var ArrayCollection|Video[]
     * @ORM\OneToMany(
     *     targetEntity="RoBundle\Entity\Video",
     *     mappedBy="videoPlaylist",
     *     cascade={"persist", "remove"},
     *     orphanRemoval=true
     * )
     */
    private $videos;

    public function __construct()
    {
        $this->videos = new ArrayCollection();
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
     * @return VideoPlaylist
     */
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }

    public function getVideos()
    {
        return $this->videos;
    }

    /**
     * @param ArrayCollection|Video[] $videos
     * @return VideoPlaylist
     */
    public function setVideos($videos)
    {
        $this->videos = $videos;

        return $this;
    }

    public function addVideo(Video $video)
    {
        if (!$this->videos->contains($video)) {
            $this->videos->add($video);
            $video->setVideoPlaylist($this);
        }
    }

    public function removeVideo(Video $video)
    {
        if ($this->videos->contains($video)) {
            $this->videos->removeElement($video);
        }
    }
}
