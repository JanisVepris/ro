<?php
namespace CoreBundle\Entity;

interface UploadableEntityInterface
{
    /** @return string|null */
    public function getWebPath();
}
