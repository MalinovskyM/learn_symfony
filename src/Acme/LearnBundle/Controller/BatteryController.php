<?php

namespace Acme\LearnBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\LearnBundle\Entity\Battery;
use Symfony\Component\HttpFoundation\Request;


class BatteryController extends Controller
{
    public function showAction()
    {
        $em = $this->getDoctrine()->getManager();

        $battery = $em
            ->getRepository('AcmeLearnBundle:Battery')
            ->countAll();

        return $this->render('AcmeLearnBundle:Battery:show.html.twig', [
            'data' => $battery
        ]);
    }

    public function addAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('type', 'text')
            ->add('count', 'text')
            ->add('name', 'text')
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid()){

            $battery = new Battery();
            $battery->setType($form['type']->getData());
            $battery->setCount($form['count']->getData());
            $battery->setName($form['name']->getData());

            $em = $this->getDoctrine()->getManager();
            $em->persist($battery);
            $em->flush();

        }

        return $this->render('AcmeLearnBundle:Battery:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function delAction()
    {
        $em = $this->getDoctrine()->getManager();
        $em->getRepository('AcmeLearnBundle:Battery')->reset();
        $em->flush();

        return $this->redirectToRoute('show');
    }

}
