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
     * @var boolean
     * @Serializer\Type("boolean")
     */
    private $isDisabled;

    /**
     * @param int $id
     * @param string $title
     * @param string $slug
     * @param boolean $isDisabled
     */
    private function __construct($id, $title, $slug, $isDisabled)
    {
        $this->id = $id;
        $this->title = $title;
        $this->slug = $slug;
        $this->isDisabled = $isDisabled;
    }

    public static function createFromEntity(Event $event)
    {
        return new static($event->getId(), $event->getTitle(), $event->getSlug(), $event->isDisabled());
    }
}
