<?php

namespace App\Controller;

use App\Repository\FiliereRepository;
use App\Repository\UniversityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GuideOrientationUniversitaireController extends AbstractController
{
    #[Route('/GuideOrientationUniversitaire', name: 'get_GuideOrientationUniversitaire')]
    public function index(UniversityRepository $repository,FiliereRepository $filiereRepository): Response
    {
        $user = $this->getUser();
        $universitys=$repository->findAll();
        $filiers=$filiereRepository->findAll();

        return $this->render('FrontOfficeTemplate/FrontOfficeservices/guide_orientation_universitaire/GuideOrientationUniversitaire.html.twig',[
            "filiers"=>$filiers,
            'user'=>$user
        ]);
    }
}
