<?php
namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;
use RoBundle\Entity\Event;

class EventListItemData
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
     * @Serializer\Type("string")
     */
    private $slug;

    /**
     * @param int $id
     * @param string $title
     * @param string $slug
     */
    private function __construct($id, $title, $slug)
    {
        $this->id = $id;
        $this->title = $title;
        $this->slug = $slug;
    }

    public static function createFromEntity(Event $event)
    {
        return new static($event->getId(), $event->getTitle(), $event->getSlug());
    }
}
