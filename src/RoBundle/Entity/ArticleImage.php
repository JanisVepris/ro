<?php
namespace RoBundle\Entity;

use CoreBundle\Traits\EntityIdFieldTrait;
use CoreBundle\Entity\UploadableEntityInterface;
use CoreBundle\Traits\UploadableEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation\Uploadable;

/**
 * @ORM\Table(name="ro3_article_image")
 * @ORM\Entity()
 * @Uploadable(
 *     path="web/uploads/media/ArticlePic/",
 *     allowOverwrite=true,
 *     appendNumber=true,
 *     filenameGenerator="ALPHANUMERIC"
 * )
 */
class ArticleImage implements UploadableEntityInterface
{
    use EntityIdFieldTrait;
    use UploadableEntityTrait;
}
