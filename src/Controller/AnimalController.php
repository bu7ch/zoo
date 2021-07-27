<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Repository\AnimalRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnimalController extends AbstractController
{
    #[Route('/', name: 'animaux')]
    public function index(AnimalRepository $repository): Response
    {
      $animaux = $repository->findAll();
        return $this->render('animal/index.html.twig',[
          "animaux" => $animaux
        ]);
    }

    #[Route('/animal/{id}', name: 'display_animal')]
    public function animal(AnimalRepository $repository, $id): Response
    {
      $animal = $repository->find($id);
      return $this->render('animal/animal.html.twig', [
        "animal" => $animal
      ]);
    }
}
