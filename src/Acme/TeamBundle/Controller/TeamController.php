<?php

namespace Acme\TeamBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Acme\TeamBundle\Entity\Team;

class TeamController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('AcmeTeamBundle:Team:index.html.twig');
    }
    /**
     * @Route("/create")
     * @Template()
     */
    public function createAction(Request $request)
    {

        $team = new Team();
        $form = $this->createFormBuilder($team)
            ->add('name', 'text')
            ->add('save', 'submit')
            ->getForm();
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($team);
            $em->flush();

            return $this->render('AcmeTeamBundle:Team:create.html.twig', array('message'=>array('type'=>'success', 'body'=>'Your team is created!')));
        }
        return $this->render('AcmeTeamBundle:Team:create.html.twig', array(
            'form' => $form->createView()));

    }

    /**
     * @Route("/update")
     * @Template()
     */
    public function updateAction()
    {
    }

}
