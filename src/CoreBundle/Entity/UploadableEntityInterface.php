<?php
namespace CoreBundle\Entity;

interface UploadableEntityInterface
{
    /** @return string|null */
    public function getWebPath();

    /** @return string */
    public function getUploadPath();

    public function setAsFixture();
}
