<?php

namespace App\Controller;

use App\Entity\Filiere;
use App\Form\FiliereType;
use App\Repository\FiliereRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/Dashbord')]
#[Security("is_granted('ROLE_ADMIN')", statusCode:404, message:"Resource not found.")]
class FiliereController extends AbstractController
{
    #[Route('/ListFilieres', name: 'List_filiere')]
    public function index(FiliereRepository $repository): Response
    {
        $filieres=$repository->findAll();
        return $this->render('filiere/ListFilieres.html.twig',[
            'filieres'=>$filieres
            ]);
    }
    #[Route('/AddFiliere',name:'add_filiere')]
    public function addFiliere(Request $request,FiliereRepository $repository):Response
    {
        $filiere=new Filiere();
        $form=$this->createForm(FiliereType::class,$filiere);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $repository->save($filiere,true);
            return $this->redirectToRoute("List_filiere");
        }
        return $this->renderForm("filiere/FiliereForm.html.twig",[
            'form'=>$form,
            "button"=>"save"
        ]);
    }
    #[Route('/UpdateFilieres/{id<\d+>}',name:'update_filiere')]
    public function updateFiliere(Request $request,FiliereRepository $repository,Filiere $filiere):Response
    {

        $form=$this->createForm(FiliereType::class,$filiere);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $repository->save($filiere,true);
            return $this->redirectToRoute("List_filiere");
        }
        return $this->renderForm("filiere/FiliereForm.html.twig",[
            'form'=>$form,
            "button"=>"Update"
        ]);
    }
    #[Route("/delete/{id<\d+>}",name:"delete_filier")]
    public function deletefiliere(FiliereRepository $repository,Filiere $filiere):Response{
        $repository->remove($filiere,true);
        return $this->redirectToRoute('List_filiere');
    }
}
