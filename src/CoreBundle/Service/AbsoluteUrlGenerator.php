<?php
namespace CoreBundle\Service;

use Symfony\Component\Routing\RequestContext;

class AbsoluteUrlGenerator
{
    /** @var RequestContext */
    private $requestContext;

    public function __construct(RequestContext $requestContext)
    {
        $this->requestContext = $requestContext;
    }

    /**
     * @param string $relativeUrl
     * @return string
     */
    public function generateAbsoluteUrlFromRelative($relativeUrl)
    {
        return sprintf(
            '%s://%s/%s',
            $this->requestContext->getScheme(),
            $this->requestContext->getHost(),
            $this->removeLeadingSlash($relativeUrl)
        );
    }

    private function removeLeadingSlash($url)
    {
        return preg_replace('/^\//', '', $url, 1);
    }
}
