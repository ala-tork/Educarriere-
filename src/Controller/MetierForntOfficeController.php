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
    public function index(MetierARepository $repository,Request $request,$page,$nbr,$search): Response
    {
        $min=0;
        $max=0;
        $metiers=$repository->findBy([],["nom"=>"ASC"],$nbr,(($page-1)*$nbr));
        $user = $this->getUser();
        $nbmetier=$repository->count([]);
        $nbpage=ceil($nbmetier/$nbr);

        $from= $this->createForm(FiltrerMitierType::class);

        $filtre=$from->handleRequest($request);
        if($search!="all"){
            $x=$repository->SearchByName($search);
            $metiers=$x;
        }else{
            $metiers=$repository->findBy([],["nom"=>"ASC"],$nbr,(($page-1)*$nbr));
        }
        if($from->isSubmitted()){
            #dd($filtre->get("metier")->getData());
            $min=$filtre->get("Salaire_Mininale")->getData();
            $max=$filtre->get("Salaire_Maximum")->getData();
            if($min!=0 and $max!=0){
            $x=$repository->filterBySalaire($min,$max);
            $metiers=$x;
            $min=0;$max=0;
            }
            elseif ($min!=0 and $max ==0){
                $x=$repository->filterByMin($min);
                $metiers=$x;
                $min=0;
            }elseif ($min=0 and $max!=0){
                $x=$repository->filterByMax($max);
                $metiers=$x;
                $max=0;
            }
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
