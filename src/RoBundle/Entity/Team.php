<?php
namespace RoBundle\Entity;

use CoreBundle\Traits\CreatedOnEntityTrait;
use CoreBundle\Traits\UpdatedOnEntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="ro3_team")
 * @ORM\Entity()
 */
class Team
{
    use CreatedOnEntityTrait;
    use UpdatedOnEntityTrait;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var Event
     * @ORM\OneToOne(targetEntity="RoBundle\Entity\Event", inversedBy="poster")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     */
    private $event;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Team
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param Event $event
     * @return Team
     */
    public function setEvent(Event $event)
    {
        $this->event = $event;

        return $this;
    }
}
