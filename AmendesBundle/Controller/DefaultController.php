<?php

namespace AmendesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AmendesBundle:Default:index.html.twig');
    }
}
