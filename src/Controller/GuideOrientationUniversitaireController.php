<?php

namespace App\Controller;

use App\Entity\Filiere;
use App\Entity\Governorats;
use App\Entity\University;
use App\Form\GuideFiltreType;
use App\Repository\FiliereRepository;
use App\Repository\GovernoratsRepository;
use App\Repository\ScoreUniversityRepository;
use App\Repository\UniversityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GuideOrientationUniversitaireController extends AbstractController
{
    #[Route('/GuideOrientationUniversitaire', name: 'get_GuideOrientationUniversitaire')]
    public function index(UniversityRepository $repository,FiliereRepository $filiereRepository,Request $request,GovernoratsRepository $grep): Response
    {
        $user = $this->getUser();
        $ville=new Governorats();
        $universitys=new University();
        $sp= new Filiere();
        $filiers=$filiereRepository->findAll();
        $filtre=$this->createForm(GuideFiltreType::class);
        #dd($filiers);
        $filtre->handleRequest($request);
        if($filtre->isSubmitted()){
            #$ville=$filtre->get("ville")->getData();
            #$universitys=$filtre->get("university")->getData();
            $sp=$filtre->get("Filiere")->getData();
            if($sp!=null){
                #$v=$ville->getName();
                #$u=$universitys->getUniversityName();
                $s=$sp->getFiliereName();
                $filiers=$filiereRepository->findBy(["FiliereName"=>$s]);

                #dd($x);
                #dd($ville->getName(),$universitys->getUniversityName(),$sp->getFiliereName());
            }

        }
        return $this->render('FrontOfficeTemplate/FrontOfficeservices/guide_orientation_universitaire/GuideOrientationUniversitaire.html.twig',[
            "filiers"=>$filiers,
            'user'=>$user,
            'filtre'=> $filtre->createView()
        ]);
    }
    #[Route('/GuideOrientationUniversitaire1', name: 'get_GuideOrientationUniversitaire1')]
    public function index1(Request $request,ScoreUniversityRepository $repository): Response
    {

        $user = $this->getUser();
        $filtre=$this->createForm(GuideFiltreType::class);
        $sc=$repository->findAll();
        $filtre->handleRequest($request);
        return $this->render('FrontOfficeTemplate/FrontOfficeservices/guide_orientation_universitaire/GuideOrientationUniversitaire1.html.twig',[
            "sc"=>$sc,
            'user'=>$user,
            'filtre'=> $filtre->createView()
        ]);
    }
}
