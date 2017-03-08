<?php
namespace RoBundle\Entity;

use CoreBundle\Entity\AbstractUploadableEntity;
use CoreBundle\Traits\EntityIdFieldTrait;
use CoreBundle\Traits\UploadableEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation\Uploadable;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="ro3_gallery_image")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 * @Uploadable(
 *     pathMethod="getUploadPath",
 *     allowOverwrite=false,
 *     appendNumber=true,
 *     filenameGenerator="SHA1"
 * )
 */
class GalleryImage extends AbstractUploadableEntity
{
    use EntityIdFieldTrait;
    use UploadableEntityTrait;

    /**
     * @var UploadedFile
     * @Assert\File(
     *     mimeTypes={"image/jpeg", "image/jpg", "image/png"}
     * )
     */
    public $file;

    /** @var string */
    private $uploadPath = self::BASE_UPLOAD_DIR . '/GalleryImages/';

    /**
     * @var Gallery
     * @ORM\ManyToOne(targetEntity="RoBundle\Entity\Gallery", inversedBy="images")
     * @ORM\JoinColumn(name="gallery_id", referencedColumnName="id")
     */
    private $gallery;

    public function getUploadPath()
    {
        return $this->uploadPath;
    }

    public function getGallery()
    {
        return $this->gallery;
    }

    public function setGallery(Gallery $gallery)
    {
        $this->gallery = $gallery;

        return $this;
    }
}
