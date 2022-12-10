<?php

namespace App\Controller;

use App\Entity\ScoreUniversity;
use App\Form\ScoreUniversityType;
use App\Repository\ScoreUniversityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/Dashbord')]
class ScoreUniversityController extends AbstractController
{
    #[Route('/scoreuniversity', name: 'app_score_university')]
    public function index(ScoreUniversityRepository $repository): Response
    {
        $list=$repository->findAll();
        return $this->render('score_university/listScoreUniversity.html.twig', [
            'list'=>$list
        ]);
    }
    #[Route('/AddScoreUniversity',name:'add_score_university')]
    public function addScoreuniversity (Request $request,ScoreUniversityRepository $repository ): Response{
        $score=new ScoreUniversity();
        $form=$this->createForm(ScoreUniversityType::class,$score);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $repository->save($score,true);
            return $this->redirectToRoute('app_score_university');
        }
        return $this->render('score_university/ScoreUniversityForm.html.twig',
         ['form'=> $form->createView(),
         'button'=>"save"
         ]);
    }
    #[Route('/UpdateScoreUniversity/{id<\d+>}',name:'update_score_university')]
    public function UpdateScoreuniversity (ScoreUniversityRepository $repository,ScoreUniversity $score,Request $request): Response{

        $form=$this->createForm(ScoreUniversityType::class,$score);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $repository->save($score,true);
            return $this->redirectToRoute('app_score_university');
        }
        return $this->render('score_university/ScoreUniversityForm.html.twig',
            ['form'=> $form->createView(),
                'button'=>"save"
            ]);
    }

    #[Route('/DeleteScoreUniversity/{id<\d+>}',name:'delete_score_university')]
    public function DeleteScoreuniversity (ScoreUniversityRepository $repository,ScoreUniversity $score): Response{

            $repository->remove($score,true);
            return $this->redirectToRoute('app_score_university');

    }

}
