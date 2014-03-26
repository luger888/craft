<?php

namespace Acme\DefaultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeDefaultBundle:Default:index.html.twig');
    }
}
