<?php

namespace App\Controller;

use App\Entity\MetierA;
use App\Repository\MetierARepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MetierForntOfficeController extends AbstractController
{
    #[Route('/metiers', name: 'show_metiers')]
    public function index(MetierARepository $repository): Response
    {
        $metiers=$repository->findAll();
        $user = $this->getUser();
        #dd($metiers);
        return $this->render('metier_fornt_office/Show_metier.html.twig', [
            'user'=>$user,
            'metiers'=>$metiers
        ]);
    }
}
