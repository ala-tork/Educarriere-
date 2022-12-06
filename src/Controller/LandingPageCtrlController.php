<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LandingPageCtrlController extends AbstractController
{
    #[Route('/', name: 'app_landing_page_ctrl')]
    public function index(): Response
    {
        $user = $this->getUser();
        #dd($user);
        return $this->render('FrontOfficeTemplate/BaseForntOfficeTemplate.html.twig',['user'=>$user]);
    }

}
