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
 * @ORM\Table(name="ro3_article_image")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 * @Uploadable(
 *     pathMethod="getUploadPath",
 *     allowOverwrite=true,
 *     appendNumber=true,
 *     filenameGenerator="ALPHANUMERIC"
 * )
 */
class ArticleImage extends AbstractUploadableEntity
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

    private $uploadPath = self::BASE_UPLOAD_DIR . '/ArticlePic/';

    /** @return string */
    public function getUploadPath()
    {
        return $this->uploadPath;
    }
}
