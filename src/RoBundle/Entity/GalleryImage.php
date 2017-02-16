<?php
namespace RoBundle\Entity;

use CoreBundle\Traits\CreatedOnEntityTrait;
use CoreBundle\Traits\UpdatedOnEntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="gallery_image")
 * @ORM\Entity()
 */
class GalleryImage
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
     * @ORM\Column(name="url", type="string")
     */
    private $url;

    /**
     * @var Event
     * @ORM\ManyToOne(targetEntity="RoBundle\Entity\Gallery", inversedBy="images")
     * @ORM\JoinColumn(name="gallery_id", referencedColumnName="id")
     */
    private $gallery;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return GalleryImage
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return GalleryImage
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return Event
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * @param Event $gallery
     * @return GalleryImage
     */
    public function setGallery($gallery)
    {
        $this->gallery = $gallery;

        return $this;
    }
}
