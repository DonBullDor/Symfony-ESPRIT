<?php
/**
 * Created by PhpStorm.
 * User: pc esprit
 * Date: 15/11/2018
 * Time: 11:26
 */

namespace AmendesBundle\Controller;


use AmendesBundle\Entity\Amende;
use AmendesBundle\Form\AmendeType;
use AmendesBundle\Form\RechercheType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AmendeController extends Controller
{
    public function addAction(Request $request){
        $Amende = new Amende();
        $form = $this->createForm(AmendeType::class,$Amende);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($Amende);
            $em->flush();
        }
        return $this->render('@Amendes/Amende/add.html.twig',
            array(
                "Form"=>$form->createView()
            ));
    }
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $amendes = $em->getRepository("AmendesBundle:Amende")
            ->findAll();
        return $this->render('@Amendes/Amende/list.html.twig',array(
            'amendes'=>$amendes
        ));
    }
    public function searchAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $amendes = $em->getRepository("AmendesBundle:Amende")
            ->findAll();
        $Amende = new Amende();
        $form = $this->createForm(RechercheType::class,$Amende);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $criteria = $request
                ->get('amendesbundle_searchAmende');
            $amendes= $em->getRepository("AmendesBundle:Amende")
                ->findBy(array(
                    'payee'=>$criteria
                ));
        }
        return $this->render('@Amendes/Amende/search.html.twig',array(
            "Form"=>$form->createView(),
            'amendes'=>$amendes
        ));
    }
    public function updateAction(){
        $em = $this->getDoctrine()->getManager();
        $amendes = $em->getRepository("AmendesBundle:Amende")
            ->findByPayee();
        if($amendes){
        foreach($amendes as $amende){

            $montant = $amende->getMontant() * 0.3;
            echo $montant;
            $amende->setPenalite($montant);
            //$em->persist($amende);
            $em->flush();
        }
        }
        return $this->redirectToRoute('listAmendes');
    }
}