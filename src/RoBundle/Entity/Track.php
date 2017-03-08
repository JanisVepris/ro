<?php
namespace RoBundle\Entity;

use CoreBundle\Entity\AbstractUploadableEntity;
use CoreBundle\Traits\CreatedOnEntityTrait;
use CoreBundle\Traits\EntityIdFieldTrait;
use CoreBundle\Traits\UploadableEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation\Uploadable;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="ro3_playlist_tracks")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 * @Uploadable(
 *     pathMethod="getUploadPath",
 *     allowOverwrite=false,
 *     appendNumber=true,
 *     filenameGenerator="SHA1"
 * )
 */
class Track extends AbstractUploadableEntity
{
    use EntityIdFieldTrait;
    use UploadableEntityTrait;
    use CreatedOnEntityTrait;

    /**
     * @var UploadedFile
     * @Assert\File(
     *     mimeTypes={"audio/mpeg"}
     * )
     */
    public $file;

    /** @var string */
    private $uploadPath = self::BASE_UPLOAD_DIR . '/Audio/';

    /**
     * @var string
     * @ORM\Column(name="title", type="string")
     */
    private $title;

    /**
     * @var Playlist
     * @ORM\ManyToOne(targetEntity="RoBundle\Entity\Playlist", inversedBy="tracks")
     * @ORM\JoinColumn(name="playlist_id", referencedColumnName="id")
     */
    private $playlist;

    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Track
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getPlaylist()
    {
        return $this->playlist;
    }

    /**
     * @param Playlist $playlist
     * @return Track
     */
    public function setPlaylist($playlist)
    {
        $this->playlist = $playlist;

        return $this;
    }

    public function getUploadPath()
    {
        return $this->uploadPath;
    }
}
