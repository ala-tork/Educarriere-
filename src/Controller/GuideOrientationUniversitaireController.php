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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function PHPUnit\Framework\isEmpty;

class GuideOrientationUniversitaireController extends AbstractController
{


    #[Route('/GuideOrientationUniversitaire', name: 'get_GuideOrientationUniversitaire')]
    #[Security("is_granted('ROLE_USER')", statusCode:404, message:"Resource not found.")]
    public function index(UniversityRepository $repository,FiliereRepository $filiereRepository,Request $request,GovernoratsRepository $grep): Response
    {
        $user = $this->getUser();
        $sp= new Filiere();
        $filiers=$filiereRepository->findAll();
        $filtre=$this->createForm(GuideFiltreType::class);
        $filtre->handleRequest($request);
        if($filtre->isSubmitted()){
            #dd($filtre->get("Filiere")->getData());
            $sp=$filtre->get("Filiere")->getData();
            if(($filtre->get('best')->getData())==true){
                $result=$user->getScore()->getResult();
                $filiers=$filiereRepository->Mybest($result);
            }
            if(($sp!=null) and (($filtre->get('best')->getData())==true)){
                $sp=$sp["0"];
                $s=$sp->getFiliereName();
                $result=$user->getScore()->getResult();
                $filiers=$filiereRepository->Filtrer($result,$s);
                #dd($x);
                #dd($ville->getName(),$universitys->getUniversityName(),$sp->getFiliereName());
            }
            if(($sp!=null) and (($filtre->get('best')->getData())==false)){
                $sp=$sp["0"];
                $s=$sp->getFiliereName();
                $sId=$sp->getId();

                $filiers=$filiereRepository->findBy(["id"=>$sId]);
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
