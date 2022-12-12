<?php

namespace App\Controller;

use App\Entity\MetierA;
use App\Form\FiltrerMitierType;
use App\Repository\MetierARepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MetierForntOfficeController extends AbstractController
{
    #[Route('/metiers/{page?1}/{nbr?4}/{search?all}', name: 'show_metiers')]
    public function index(MetierARepository $repository,Request $request,$search,$page,$nbr): Response
    {
        $metiers=$repository->findBy([],["nom"=>"ASC"],$nbr,(($page-1)*$nbr));
        $user = $this->getUser();
        $nbmetier=$repository->count([]);
        $nbpage=ceil($nbmetier/$nbr);

        $from= $this->createForm(FiltrerMitierType::class);
        #dd($metiers);
        $filtre=$from->handleRequest($request);
        if($search!="all"){
            $x=$repository->SearchByName($search);
            $metiers=$x;
        }
        if($from->isSubmitted()){
            #dd($filtre->get("metier")->getData());
            $x=$repository->SearchByName($filtre->get("metier")->getData());
            $metiers=$x;
        }
        return $this->render('metier_fornt_office/Show_metier.html.twig', [
            'user'=>$user,
            'metiers'=>$metiers,
            'form'=>$from->createView(),
            'isPaginated'=>true,
            'nbrpage'=>$nbpage,
            'page'=>$page,
            'nbr'=>$nbr
        ]);
    }
}
