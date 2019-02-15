<?php
/**
 * Created by PhpStorm.
 * User: pc esprit
 * Date: 13/11/2018
 * Time: 21:04
 */

namespace Location\AgenceBundle\Controller;


use Location\AgenceBundle\Entity\Chauffeur;
use Location\AgenceBundle\Form\ChauffeurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ChauffeurController extends Controller
{
    public function addAction(Request $request){
        $Chauffeur = new Chauffeur();
        $form = $this->createForm(ChauffeurType::class,$Chauffeur);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            // echo 'suite au clic sur le bouton submit ';
            $em = $this->getDoctrine()->getManager();
            $em->persist($Chauffeur);
            $em->flush();

        }
        return $this->render('@LocationAgence/Chauffeur/add.html.twig',array(
            "Form"=>$form->createView()
        ));
    }
}