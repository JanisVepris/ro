<?php
namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;
use RoBundle\Entity\Lyric;

class LyricsListItemData
{
    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $id;
    
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $title;

    /**
     * @param int $id
     * @param string $title
     */
    private function __construct($id, $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    public static function createFromEntity(Lyric $lyric)
    {
        return new static($lyric->getId(), $lyric->getTitle());
    }
}
