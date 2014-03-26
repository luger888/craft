<?php

namespace Acme\TeamBundle\Controller;

use Acme\TeamBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UserController extends Controller
{
    /**
     * @Route("/users", name="_user")
     * @Template()
     */
    public function indexAction()
    {

        $linkedIn = new LinkedIn('772ppoompbafq7', 'xp3Fg23uk9krTtft');


        $users = $this->getDoctrine()
            ->getRepository('AcmeTeamBundle:User')
            ->findAll();
        if (!$users) {
            throw $this->createNotFoundException(
                'No users'
            );
        }
        return array('users'=>$users);
    }

    /**
     * @Route("/user/create", name="_create")
     */
    public function createAction()
    {
        $user = new User();
        $user->setUserName('Biaort')
            ->setEmail('test@gmail.com')
            ->setPassword(md5('passsword'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return new Response('Created product id '.$user->getId());
    }

    public function showAction($id)
    {



    }
}
