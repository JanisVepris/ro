<?php
namespace ApiBundle\DataTransfer\Api;

use JMS\Serializer\Annotation as Serializer;

class EventData
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
     * @var integer
     * @Serializer\Type("integer")
     */
    private $playlistId;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $galleryId;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    private $videoPlaylistId;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime<'Y.m.d'>")
     */
    private $eventDate;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $image;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $slug;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    private $hasLyrics;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    private $hasFacts;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    private $hasPoster;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    private $hasTeam;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    private $hasScript;

    /**
     * @param int $id
     * @param string $title
     * @param int $playlistId
     * @param int $galleryId
     * @param int $videoPlaylistId
     * @param \DateTime $eventDate
     * @param string $image
     * @param string $slug
     * @param bool $hasLyrics
     * @param bool $hasFacts
     * @param bool $hasPoster
     * @param bool $hasTeam
     * @param bool $hasScript
     */
    public function __construct(
        $id,
        $title,
        $playlistId,
        $galleryId,
        $videoPlaylistId,
        \DateTime $eventDate,
        $image,
        $slug,
        $hasLyrics,
        $hasFacts,
        $hasPoster,
        $hasTeam,
        $hasScript
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->playlistId = $playlistId;
        $this->galleryId = $galleryId;
        $this->videoPlaylistId = $videoPlaylistId;
        $this->eventDate = $eventDate;
        $this->image = $image;
        $this->slug = $slug;
        $this->hasLyrics = $hasLyrics;
        $this->hasFacts = $hasFacts;
        $this->hasPoster = $hasPoster;
        $this->hasTeam = $hasTeam;
        $this->hasScript = $hasScript;
    }
}
