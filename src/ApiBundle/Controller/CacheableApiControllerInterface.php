<?php
namespace ApiBundle\Controller;

use DateTime;
use Symfony\Component\HttpFoundation\Response;

interface CacheableApiControllerInterface
{
    /** @return bool */
    public function isNotModified(DateTime $lastModified);

    /** @return DateTime */
    public function getLastModifiedDate();

    /** @return Response */
    public function getLastModifiedResponse();
}
