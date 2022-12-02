<?php

namespace App\Controller;

use App\Entity\SectionBac;
use App\Form\SectionBacType;
use App\Repository\SectionBacRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/Dashbord')]
class SectionBacController extends AbstractController
{
    #[Route('/ListSectionBac', name: 'List_SectionBac')]
    public function index(SectionBacRepository $repository): Response
    {
        $SectionBac=$repository->findAll();
        return $this->render('SectionBac/ListSectionBac.html.twig',[
            'SectionBac'=>$SectionBac
            ]);
    }
    #[Route('/AddSectionBac',name:'add_SectionBac')]
    public function addSectionBac(Request $request,SectionBacRepository $repository):Response
    {
        $SectionBac=new SectionBac();
        $form=$this->createForm(SectionBacType::class,$SectionBac);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $repository->save($SectionBac,true);
            return $this->redirectToRoute("List_SectionBac");
        }
        return $this->renderForm("SectionBac/SectionBacForm.html.twig",[
            'form'=>$form,
            "button"=>"save"
        ]);
    }
    #[Route('/UpdateSectionBac/{id<\d+>}',name:'update_SectionBac')]
    public function updateSectionBac(Request $request,SectionBacRepository $repository,SectionBac $SectionBac):Response
    {

        $form=$this->createForm(SectionBacType::class,$SectionBac);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $repository->save($SectionBac,true);
            return $this->redirectToRoute("List_SectionBac");
        }
        return $this->renderForm("SectionBac/SectionBacForm.html.twig",[
            'form'=>$form,
            "button"=>"Update"
        ]);
    }
    #[Route("/delete/{id<\d+>}",name:"delete_SectionBac")]
    public function deleteSectionBac(SectionBacRepository $repository,SectionBac $SectionBac):Response{
        $repository->remove($SectionBac,true);
        return $this->redirectToRoute('List_SectionBac');
    }
}
