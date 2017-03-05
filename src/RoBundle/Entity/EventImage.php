<?php
namespace RoBundle\Entity;

use CoreBundle\Entity\AbstractUploadableEntity;
use CoreBundle\Traits\EntityIdFieldTrait;
use CoreBundle\Traits\UploadableEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation\Uploadable;

/**
 * @ORM\Table(name="ro3_event_images")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 * @Uploadable(
 *     pathMethod="getUploadPath",
 *     allowOverwrite=true,
 *     appendNumber=true,
 *     filenameGenerator="ALPHANUMERIC"
 * )
 */
class EventImage extends AbstractUploadableEntity
{
    use EntityIdFieldTrait;
    use UploadableEntityTrait;

    private $uploadPath = self::BASE_UPLOAD_DIR . '/EventPic/';

    public function getUploadPath()
    {
        return $this->uploadPath;
    }
}
