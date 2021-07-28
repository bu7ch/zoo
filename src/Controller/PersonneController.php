<?php

namespace App\Controller;

use App\Repository\DisposeRepository;
use App\Repository\PersonneRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Personne;

class PersonneController extends AbstractController
{
    #[Route('/personne', name: 'personne')]
    public function index(PersonneRepository $repository, DisposeRepository $d_repository): Response
    {
      $personnes = $repository->findAll();
      foreach ($personnes as $person){
         $person->dispose = $d_repository->findBy(array('personne'=> $person->getId()));
      }
  
        return $this->render('personne/index.html.twig', [
            'personnes' => $personnes,
        ]);
    }
}
