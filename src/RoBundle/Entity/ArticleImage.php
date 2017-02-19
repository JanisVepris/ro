<?php
namespace RoBundle\Entity;

use CoreBundle\Entity\AbstractUploadableEntity;
use CoreBundle\Traits\EntityIdFieldTrait;
use CoreBundle\Entity\UploadableEntityInterface;
use CoreBundle\Traits\UploadableEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation\Uploadable;

/**
 * @ORM\Table(name="ro3_article_image")
 * @ORM\Entity()
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

    private $uploadPath = self::BASE_UPLOAD_DIR . '/ArticlePic/';

    /** @return string */
    public function getUploadPath()
    {
        return $this->uploadPath;
    }
}
