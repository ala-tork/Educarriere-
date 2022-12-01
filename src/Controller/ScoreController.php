<?php

namespace App\Controller;

use App\Entity\Score;
use App\Form\ScoreType;
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
    public function calculscore(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $score = new Score();
        $form = $this->createForm(ScoreType::class, $score);
        return $this->render('score/score.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}