<?php
namespace RoBundle\Entity;

use CoreBundle\Traits\CreatedOnEntityTrait;
use CoreBundle\Traits\UpdatedOnEntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="ro3_gallery")
 * @ORM\Entity()
 */
class Gallery
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
     * @var Event
     * @ORM\OneToOne(targetEntity="RoBundle\Entity\Event", inversedBy="poster")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     */
    private $event;

    /**
     * @var ArrayCollection|GalleryImage[]
     * @ORM\OneToMany(targetEntity="RoBundle\Entity\GalleryImage", mappedBy="gallery")
     */
    private $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Gallery
     */
    public function setId($id)
    {
        $this->id = $id;

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
     * @return Gallery
     */
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * @return GalleryImage[]
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param ArrayCollection|GalleryImage[] $images
     * @return Gallery
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * @param GalleryImage $image
     * @return $this
     */
    public function addImage(GalleryImage $image)
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
        }

        return $this;
    }

    /**
     * @param GalleryImage $image
     * @return $this
     */
    public function removeImage(GalleryImage $image)
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
        }

        return $this;
    }

    public function hasImages()
    {
        return (bool) $this->images->count();
    }
}
