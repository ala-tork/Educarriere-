<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashbordCtrlController extends AbstractController
{
    #[Route('/Dashbord', name: 'app_dashbord_ctrl')]
    #[Security("is_granted('ROLE_ADMIN')", statusCode:404, message:"Resource not found.")]
    public function Dashbord(): Response
    {
        return $this->redirectToRoute("app_user_index");
    }
}
