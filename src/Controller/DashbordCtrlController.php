<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashbordCtrlController extends AbstractController
{
    #[Route('/Dashbord', name: 'app_dashbord_ctrl')]
    public function Dashbord(): Response
    {
        return $this->redirectToRoute("app_user_index");
    }
}
