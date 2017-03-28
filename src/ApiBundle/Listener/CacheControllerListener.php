<?php
namespace ApiBundle\Listener;

use ApiBundle\Controller\CacheableApiControllerInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class CacheControllerListener
{
    /** @param FilterControllerEvent $event */
    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController();
        if (!is_array($controller)) {
            return;
        }
        $controllerObject = $controller[0];
        if ($controllerObject instanceof CacheableApiControllerInterface) {
            if ($controllerObject->isNotModified($controllerObject->getLastModifiedDate())) {
                $controller[1] = 'getLastModifiedResponse';
            }
            $event->setController($controller);
        }
    }
}
