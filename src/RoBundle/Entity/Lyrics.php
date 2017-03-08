<?php
namespace RoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="ro3_lyrics")
 * @ORM\Entity()
 */
class Lyrics
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
     * @var ArrayCollection|Lyric[]
     * @ORM\OneToMany(targetEntity="RoBundle\Entity\Lyric", mappedBy="lyrics", cascade={"persist", "remove"})
     */
    private $lyricList;

    public function __construct()
    {
        $this->lyricList = new ArrayCollection();
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
     * @return Lyrics
     */
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }

    public function getLyricList()
    {
        return $this->lyricList;
    }

    /**
     * @param Lyric[] $lyricList
     * @return Lyrics
     */
    public function setLyricList($lyricList)
    {
        $this->lyricList = $lyricList;

        return $this;
    }

    public function addLyric(Lyric $lyric)
    {
        if (!$this->lyricList->contains($lyric)) {
            $this->lyricList->add($lyric);
            $lyric->setLyrics($this);
        }

        return $this;
    }

    public function removeLyric(Lyric $lyric)
    {
        if ($this->lyricList->contains($lyric)) {
            $this->lyricList->removeElement($lyric);
        }

        return $this;
    }
}
