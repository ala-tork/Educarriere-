<?php

namespace App\Controller;

use App\Entity\University;
use App\Form\UniversityType;
use App\Repository\UniversityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route("/Dashbord")]
class UniversityController extends AbstractController
{
    #[Route('/university', name: 'List_universitys')]
    public function index(UniversityRepository $repository): Response
    {
        $universitys=$repository->findAll();
        #dd($universitys);
        return $this->render('university/ListUniversity.html.twig', [
            'universitys'=>$universitys
        ]);
    }
    #[Route('/Adduniversity', name: 'Add_universitys')]
    public function adduniversity(UniversityRepository $repository,Request $request): Response
    {
        $university=new University();
        $form=$this->createForm(UniversityType::class,$university);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid() ){
            #   dd($university);
            $repository->save($university,true);
            return $this->redirectToRoute("List_universitys");
        }
        return $this->render('university/UniversityForm.html.twig', [
            'form'=>$form->createView(),
            "button"=>"save"
        ]);
    }

    #[Route('/Updateuniversity/{id<\d+>}', name: 'updata_universitys')]
    public function updateuniversity(UniversityRepository $repository,Request $request,University $university): Response
    {
        $form=$this->createForm(UniversityType::class,$university);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid() ){
            #   dd($university);
            $repository->save($university,true);
            return $this->redirectToRoute("List_universitys");
        }
        return $this->render('university/UniversityForm.html.twig', [
            'form'=>$form->createView(),
            "button"=>"update"
        ]);
    }

    #[Route('/Deleteuniversity/{id<\d+>}', name: 'delete_universitys')]
    public function deleteuniversity(UniversityRepository $repository,Request $request,University $university): Response
    {

            $repository->remove($university,true);
            return $this->redirectToRoute("List_universitys");


    }
}
