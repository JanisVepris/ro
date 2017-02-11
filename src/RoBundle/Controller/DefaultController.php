<?php

namespace RoBundle\Controller;

use RoBundle\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {

        $event = new Event();
        $event
            ->setTitle('test title')
            ->setEventDate(new \DateTime('NOW'));

        $em = $this->get('doctrine.orm.default_entity_manager');

        $em->persist($event);
        $em->flush();

        dump($event);die;

        return $this->render('TemplateBundle::base.html.twig');
    }
}
