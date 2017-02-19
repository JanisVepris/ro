<?php
namespace RoBundle\Entity;

use CoreBundle\Traits\EntityIdFieldTrait;
use CoreBundle\Entity\UploadableEntityInterface;
use CoreBundle\Traits\UploadableEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Mapping\Annotation\Uploadable;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="ro3_event_images")
 * @ORM\Entity()
 * @Uploadable(
 *     path="web/uploads/media/EventPic/",
 *     allowOverwrite=true,
 *     appendNumber=true,
 *     filenameGenerator="ALPHANUMERIC"
 * )
 */
class EventImage implements UploadableEntityInterface
{
    use EntityIdFieldTrait;
    use UploadableEntityTrait;
}
