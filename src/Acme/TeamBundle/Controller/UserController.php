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
    public function createAction($data)
    {
        $user = new User();
        $user->setUserName($data['userName'])
            ->setEmail($data['email'])
            ->setPassword(md5($data['password']));
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return new Response('Created user id '.$user->getId());
    }

    public function showAction($id)
    {



    }
}
