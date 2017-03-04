<?php
namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;
use RoBundle\Entity\Lyric;

class LyricData
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
     * @var string
     * @Serializer\Type("string")
     */
    private $content;

    /**
     * @param int $id
     * @param string $title
     * @param string $content
     */
    private function __construct($id, $title, $content)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }

    public static function createFromEntity(Lyric $lyric)
    {
        return new static($lyric->getId(), $lyric->getTitle(), $lyric->getContent());
    }
}
