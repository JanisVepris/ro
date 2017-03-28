<?php
namespace ApiBundle\Controller;

use DateTime;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractApiController extends FOSRestController
{
    /** @var Container */
    protected $container;

    /** @var Response */
    protected $lastModifiedResponse;

    /**
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param mixed $data
     * @param int $status
     * @param array $headers
     * @return Response
     */
    protected function createView($data, $status = 200, $headers = [])
    {
        $view = $this->view($data, $status, $headers);

        return $this->handleView($view);
    }

    /** @return Request */
    protected function getRequest()
    {
        return $this->container->get('request_stack')->getCurrentRequest();
    }

    /**
     * @param DateTime $lastModified
     * @return bool
     */
    public function isNotModified(DateTime $lastModified)
    {
        $this->lastModifiedResponse = new Response();
        $this->lastModifiedResponse->setLastModified($lastModified);
        $this->lastModifiedResponse->setPublic();

        return (bool) $this->lastModifiedResponse->isNotModified($this->getRequest());
    }

    /**
     * @return Response
     */
    public function getLastModifiedResponse()
    {
        return $this->lastModifiedResponse;
    }
}
