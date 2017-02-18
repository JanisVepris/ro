<?php
namespace RoBundle\Entity;

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
}