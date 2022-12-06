<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserFrontOfficeController extends AbstractController
{
    #[Route('/profil', name: 'profil')]
    public function profil(): Response
    {
        $user = $this->getUser();

        return $this->render('user_front_office/Profile.html.twig',['user'=>$user]);
    }


    #[Route('profil/update/{id}', name: 'Profil_Update')]
    public function edit(Request $request, User $user, UserRepository $userRepository): Response
    {
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);

            return $this->redirectToRoute('profil', ['user'=>$user], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user_front_office/Profile_Update.html.twig', [
            'form' => $form,
            'user' =>$user
        ]);
    }
}
