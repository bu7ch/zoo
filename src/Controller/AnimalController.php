<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Repository\AnimalRepository;
use App\Repository\DisposeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnimalController extends AbstractController
{
    #[Route('/', name: 'animaux')]
    public function index(AnimalRepository $repository, DisposeRepository $d_repository): Response
    {
      $animaux = $repository->findAll();
        foreach ($animaux as $animal) {
          $animal->dispose = $d_repository->findBy(array('animaux'=> $animal->getId()));
        }
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
