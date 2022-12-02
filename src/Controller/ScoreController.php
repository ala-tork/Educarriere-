<?php

namespace App\Controller;

use App\Entity\Score;
use App\Form\ScoreType;
use App\Repository\SectionBacRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScoreController extends AbstractController
{
    /**
     * @Route("/score", name= "calculateur_score")
     */
    public function calculscore(ManagerRegistry $doctrine,SectionBacRepository $repository,Request $request): Response
    {
        $score = new Score();
        $section=$repository->findAll();
        $user = $this->getUser();

        $form = $this->createForm(ScoreType::class, $score);
        $form->handleRequest($request);
        if($form->isSubmitted() ){
            dd($form->getData());
        }
        return $this->render('score/score.html.twig', [
            'form'=>$form->createView(),
            'section'=>$section,
            'user'=>$user
        ]);
    }

}