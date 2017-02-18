<?php
namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AbstractApiController extends FOSRestController
{
    /** @var Container */
    protected $container;

    /**
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    protected function createView($data, $status = 200, $headers = [])
    {
        $view = $this->view($data, $status, $headers);

        return $this->handleView($view);
    }
}
