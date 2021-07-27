<?php

namespace App\Controller;

use App\Entity\Famille;
use App\Repository\FamilleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FamilleController extends AbstractController
{
    #[Route('/famille', name: 'famille')]
    public function index(FamilleRepository $repository): Response
    {
      $familles = $repository->findAll();
        return $this->render('famille/index.html.twig', [
            'familles' => $familles
        ]);
    }

    #[Route('/famille/{id}', name: 'display_famille')]
    public function display_famille(Famille $famille) :Response
    {
      return $this->render('famille/afficherFamille.html.twig', [
        "famille" => $famille
      ]);
    }
}

