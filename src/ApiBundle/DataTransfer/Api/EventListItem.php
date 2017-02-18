<?php
namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;
use RoBundle\Entity\Event;

class EventListItem
{
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $title;

    /**
     * @var string
     * @Serializer\Exclude()
     */
    private $slug;

    /**
     * @param int $id
     * @param string $title
     * @param string $slug
     */
    public function __construct($id, $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    public static function createFromEntity(Event $event)
    {
        return new static($event->getId(), $event->getTitle());
    }
}
