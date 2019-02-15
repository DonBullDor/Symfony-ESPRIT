<?php
/**
 * Created by PhpStorm.
 * User: pc esprit
 * Date: 13/11/2018
 * Time: 21:26
 */

namespace Location\AgenceBundle\Controller;


use Location\AgenceBundle\Entity\Car;
use Location\AgenceBundle\Form\CarType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CarController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $cars = $em->getRepository("LocationAgenceBundle:Car")
            ->findAll();
        return $this->render('@LocationAgence/Car/list.html.twig',array(
        "cars"=>$cars
        ));
    }
    public function louerAction(Request $request){
        $immatricule = $request->get('immatricule');
        $em = $this->getDoctrine()->getManager();
        $Car = $em->getRepository("LocationAgenceBundle:Car")
            ->find($immatricule);
        $form = $this->createForm(CarType::class,$Car);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            // echo 'suite au clic sur le bouton submit ';

            $em->persist($Car);
            $em->flush();

        }
        return $this->render('@LocationAgence/Car/louer.html.twig',array(
            "Form"=>$form->createView(),
            "car"=>$Car
        ));
    }
}