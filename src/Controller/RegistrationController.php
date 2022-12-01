<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register',methods:['GET','POST'])]
    public function register(Request $request, UserRepository $userRepository,UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $passwordHasher->hashPassword($user,$form->get('plainPassword')->getData())
            );
            $userRepository->save($user, true);
            return $this->redirectToRoute('app_login');
        }else{
            return $this->renderForm('registration/register.html.twig', [
                'registrationForm' => $form,
            ]);
        }


    }
}
