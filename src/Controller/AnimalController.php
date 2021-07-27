<?php

namespace App\Controller;

use App\Entity\Animal;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnimalController extends AbstractController
{
    #[Route('/', name: 'animaux')]
    public function index(): Response
    {
      $repository = $this->getDoctrine()->getRepository(Animal::class);
      $animaux = $repository->findAll();
        return $this->render('animal/index.html.twig',[
          "animaux" => $animaux
        ]);
    }
}
