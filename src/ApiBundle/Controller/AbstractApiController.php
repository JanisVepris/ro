<?php
namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class AbstractApiController extends FOSRestController
{
    protected function createView($data, $status = 200, $headers = [])
    {
        $view = $this->view($data, $status, $headers);

        return $this->handleView($view);
    }
}
