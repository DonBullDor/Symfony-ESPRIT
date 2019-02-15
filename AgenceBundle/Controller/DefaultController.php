<?php

namespace Location\AgenceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LocationAgenceBundle:Default:index.html.twig');
    }
}
