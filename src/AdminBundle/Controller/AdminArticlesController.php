<?php
namespace AdminBundle\Controller;

use RoBundle\Entity\Event;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/** @Route("/event/{eventId}/articles", service="admin.controller.articles_controller") */
class AdminArticlesController extends AbstractAdminController
{
    /**
     * @Route("/list", name="admin_articles_list")
     * @Template
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function listAction(Event $event)
    {
        return [
            'event' => $event,
        ];
    }
}
