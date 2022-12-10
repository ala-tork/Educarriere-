<?php

namespace App\Controller;

use App\Entity\Score;
use App\Form\ScoreType;
use App\Repository\SectionBacRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
#[Route("/score")]
class ScoreController extends AbstractController
{
    /**
     * @Route("", name= "calculateur_score")
     */
    public function calculscore(Request $request): Response
    {
        $score = new Score();
        #$session= new Session();
        $user = $this->getUser();

        $form = $this->createForm(ScoreType::class, $score);

        $form->handleRequest($request);
        if($form->isSubmitted()){
            $section=$score->getSectionBac();
            switch ($section){
                case "Math":return $this->redirectToRoute("score_math");
                case "Informatique": return $this->redirectToRoute("score_informatique");
                break;
            }

            #dd($score->getSectionBac());

            /*
            $session->set('MG',$form->get("MG")->getData());
            $session->set('moyenne_francais',$form->get("moyenne_francais")->getData());
            $session->set('moyenne_anglais',$form->get("moyenne_anglais")->getData());
            $session->set('sectionBac',$form->get("sectionBac")->getData());
            $s=$session->get('sectionBac');
            $session->clear();
            dd($s);
        #dd($form->get('moyenne_francais')->getData());*/
        }
        return $this->render('score/score.html.twig', [
            'form'=>$form->createView(),
            'user'=>$user
        ]);
    }

    #[Route('/informatique',name:"score_informatique")]
    public function informatique(Request $request):Response
    {
        $scoreInfomatique=0;
        $scorre=0;
        $score = new Score();
        $user = $this->getUser();
        $form=$this->createForm(ScoreType::class,$score);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $score->setSectionBac("Informatique");
            $moyenne_bac=$score->getMG();
            $math=$score->getMoyenneMath();
            $fr=$score->getMoyenneFrancais();
            $an=$score->getMoyenneAnglais();
            $algo=$score->getMoyenneAlgo();
            $physique=$score->getMoyennePhysique();
            $tic=$score->getMoyenneTic();
            $bd=$score->getMoyenneBD();

            $scoreInfomatique=(($moyenne_bac*4)+($math*1.5)+($algo*0.5)+($physique*0.5)+(($tic+$bd)*0.25)+(($fr+$an)*1));
            $scorre=($scoreInfomatique+($scoreInfomatique*7)/100);
            #dd($scoreInfomatique);
        }
        return $this->render('score/scoreInformatique.html.twig', [
            'form'=>$form->createView(),
            'user'=>$user,
            'score'=>$scoreInfomatique,
            'SCORRE'=>$scorre
        ]);
    }
    #[Route('/math',name:"score_math")]
    public function math(Request $request):Response
    {
        $scoreMath=0;
        $scorre=0;
        $score = new Score();
        $user = $this->getUser();
        $form=$this->createForm(ScoreType::class,$score);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $score->setSectionBac("Math");
            $moyenne_bac=$score->getMG();
            $math=$score->getMoyenneMath();
            $fr=$score->getMoyenneFrancais();
            $an=$score->getMoyenneAnglais();
            $physique=$score->getMoyennePhysique();
            $science=$score->getMoyenneScience();

            $scoreMath=(($moyenne_bac*4)+($math*2)+($physique*1.5)+($science*0.5)+(($fr+$an)*1));
            $scorre=($scoreMath+($scoreMath*7)/100);
            #dd($scoreInfomatique);
        }
        return $this->render('score/scoreMath.html.twig', [
            'form'=>$form->createView(),
            'user'=>$user,
            'score'=>$scoreMath,
            'SCORRE'=>$scorre
        ]);
    }
}