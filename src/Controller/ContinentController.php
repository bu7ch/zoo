<?php

namespace App\Controller;

use App\Entity\Continent;
use App\Repository\ContinentRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContinentController extends AbstractController
{
    #[Route('/continent', name: 'continent')]
    public function index(ContinentRepository $repository): Response
    {
      $continents = $repository->findAll();
        return $this->render('continent/index.html.twig', [
            'continents' => $continents,
        ]);
    }
    #[Route('/continent/{id}', name: 'display_continent')]
    public function afficherContinent(Continent $continent)
    {
      return $this->render('continent/afficherContinent.html.twig',[
        'continent' => $continent,
      ]);
    }
}
