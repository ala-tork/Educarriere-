<?php

namespace App\Controller;

use App\Entity\Governorats;
use App\Form\GovernoratsType;
use App\Repository\GovernoratsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/Dashbord')]
#[Security("is_granted('ROLE_ADMIN')", statusCode:404, message:"Resource not found.")]
class GouvernoratsController extends AbstractController
{
    #[Route('/listGovernorats', name: 'list_gouvernorats')]
    public function index(GovernoratsRepository $repository): Response
    {
        $governorats=$repository->findAll();
        return $this->render('gouvernorats/Governorats.html.twig', [
            'govs'=>$governorats
        ]);
    }
    #[Route('/addGouvernorats',name: 'Add_Gov')]
    public function AddGov(GovernoratsRepository $repository,Request $request):Response{
        $gov=new Governorats();
        $form=$this->createForm(GovernoratsType::class,$gov);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $repository->save($gov,true);
            return $this->redirectToRoute('list_gouvernorats');
        }

        return $this->render('gouvernorats/addGov.html.twig',[
            'form'=>$form->createView(),
            'button'=>"Save"
        ]);
    }
    #[Route('/Update/{id<\d+>}',name:'update_gouvernorat')]
    public function updateGov(Governorats $governorats,Request $request,GovernoratsRepository $repository):Response{
        $form=$this->createForm(GovernoratsType::class,$governorats);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $repository->save($governorats,true);
           return $this->redirectToRoute('list_gouvernorats');
        }
        return $this->render('gouvernorats/addGov.html.twig',[
            'form'=>$form->createView(),
            'button'=>"Update"
        ]);
    }
    #[Route('/delete/{id<\d+>}',name:'delete_gouvernorat')]
    public function deletegov(Governorats $governorats,Request $request,GovernoratsRepository $repository):Response{
            $repository->remove($governorats,true);
            return $this->redirectToRoute('list_gouvernorats');
    }
}
