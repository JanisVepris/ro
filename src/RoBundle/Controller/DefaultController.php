<?php
namespace RoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route(
     *     name="homepage",
     *     path="/"
     * )
     * @Route(
     *     name="homepage_all",
     *     path="/{catch_all}",
     *     requirements={"catch_all": "[\s\S]+"}
     * )
     */
    public function indexAction()
    {
        return $this->render('TemplateBundle::base.html.twig');
    }
}
