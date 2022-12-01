<?php

namespace App\Controller;

use App\Entity\MetierA;
use App\Entity\User;

use App\Form\MetierAType;
use App\Repository\MetierARepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/metier/a')]
class MetierAController extends AbstractController
{
    #[Route('/', name: 'app_metier_a_index', methods: ['GET'])]
    public function index(MetierARepository $metierARepository): Response
    {
        return $this->render('metier_a/index.html.twig', [
            'metier_as' => $metierARepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_metier_a_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MetierARepository $metierARepository): Response
    {
        $metierA = new MetierA();
        $form = $this->createForm(MetierAType::class, $metierA);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $metierARepository->save($metierA, true);

            return $this->redirectToRoute('app_metier_a_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('metier_a/new.html.twig', [
            'metier_a' => $metierA,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_metier_a_show', methods: ['GET'])]
    public function show(MetierA $metierA): Response
    {
        return $this->render('metier_a/show.html.twig', [
            'metier_a' => $metierA,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_metier_a_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MetierA $metierA, MetierARepository $metierARepository): Response
    {
        $form = $this->createForm(MetierAType::class, $metierA);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $metierARepository->save($metierA, true);

            return $this->redirectToRoute('app_metier_a_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('metier_a/edit.html.twig', [
            'metier_a' => $metierA,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_metier_a_delete', methods: ['POST'])]
    public function delete(Request $request, MetierA $metierA, MetierARepository $metierARepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$metierA->getId(), $request->request->get('_token'))) {
            $metierARepository->remove($metierA, true);
        }

        return $this->redirectToRoute('app_metier_a_index', [], Response::HTTP_SEE_OTHER);
    }
}
