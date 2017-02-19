<?php
namespace CoreBundle\Entity;

abstract class AbstractUploadableEntity implements UploadableEntityInterface
{
    const BASE_UPLOAD_DIR = 'uploads/media';
}
