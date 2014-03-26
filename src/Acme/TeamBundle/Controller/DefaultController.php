<?php

namespace Acme\TeamBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
class DefaultController extends Controller
{
    /**
     * @Route("/", name="_team")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    public function baseAction()
    {
        return array();
    }
}
