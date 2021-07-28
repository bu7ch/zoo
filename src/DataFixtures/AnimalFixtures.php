<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use App\Entity\Dispose;
use App\Entity\Famille;
use App\Entity\Personne;
use App\Entity\Continent;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $p1= new Personne();
        $p1->setNom('Richard');
        $manager->persist($p1);
        $p2= new Personne();
        $p2->setNom('Lya');
        $manager->persist($p2);
        $p3= new Personne();
        $p3->setNom('Momo');
        $manager->persist($p3);

        $continent1 = new Continent();
        $continent1->setLibelle('Europe');
        $manager->persist($continent1);
        $continent2 = new Continent();
        $continent2->setLibelle('Asie');
        $manager->persist($continent2);
        $continent3 = new Continent();
        $continent3->setLibelle('Afrique');
        $manager->persist($continent3);
        $continent4 = new Continent();
        $continent4->setLibelle('Océanie');
        $manager->persist($continent4);
        $continent5 = new Continent();
        $continent5->setLibelle('Amérique');
        $manager->persist($continent5);


        $c1 = new Famille();
        $c1->setLibelle('mammifères')
           ->setDescription("Animaux vertébrés nourrissant leurs petits ave du lait");
        $manager->persist($c1);

        $c2 = new Famille();
        $c2->setLibelle('reptiles')
           ->setDescription("Animaux vertébrés qui rampent");
        $manager->persist($c2);

        $c3 = new Famille();
        $c3->setLibelle('poissons')
           ->setDescription("Animaux invertébrés du monde aquatique");
        $manager->persist($c3);


        $a1 = new Animal();
        $a1->setNom('Chien')
           ->setDescription('Un animal domestique')
           ->setImage('chien.jpg')
           ->setPoids(10)
           ->setDangereux(false)
           ->setFamille($c1)
           ->addContinent($continent1)
           ->addContinent($continent2)
           ->addContinent($continent3)
           ->addContinent($continent4)
           ->addContinent($continent5);
        $manager->persist($a1);

        $a2 = new Animal();
        $a2->setNom('Cochcon')
           ->setDescription("Un animal d'élevage")
           ->setImage('cochon.jpg')
           ->setPoids(300)
           ->setDangereux(false)
           ->setFamille($c1)
           ->addContinent($continent1)
           ->addContinent($continent5);
        
        $manager->persist($a2);

        $a3 = new Animal();
        $a3->setNom('Serpent')
           ->setDescription('Un animal dangereux')
           ->setImage('serpent.jpg')
           ->setPoids(5)
           ->setDangereux(true)
           ->setFamille($c2)
           ->addContinent($continent2)
           ->addContinent($continent3)
           ->addContinent($continent4);
        $manager->persist($a3);

        $a4 = new Animal();
        $a4->setNom('Crocodile')
           ->setDescription('Un animal très dangereux')
           ->setImage('croco.jpg')
           ->setPoids(500)
           ->setDangereux(true)
           ->setFamille($c2)
           ->addContinent($continent3)
           ->addContinent($continent4);
        $manager->persist($a4);

        $a5 = new Animal();
        $a5->setNom('Requin')
           ->setDescription('Un animal marin très dangereux ')
           ->setImage('requin.jpg')
           ->setPoids(800)
           ->setDangereux(true)
           ->setFamille($c3)
           ->addContinent($continent4)
           ->addContinent($continent5);
        $manager->persist($a5);

        $d1= new Dispose();
        $d1->setPersonne($p1)
           ->setAnimaux($a1)
           ->setNbre(2);
        $manager->persist($d1); 

        $d2= new Dispose();
        $d2->setPersonne($p1)
           ->setAnimaux($a2)
           ->setNbre(3);
        $manager->persist($d2); 

        $d3= new Dispose();
        $d3->setPersonne($p2)
           ->setAnimaux($a3)
           ->setNbre(5);
        $manager->persist($d3); 

        $d4= new Dispose();
        $d4->setPersonne($p3)
           ->setAnimaux($a5)
           ->setNbre(10);
        $manager->persist($d4);

        $d5= new Dispose();
        $d5->setPersonne($p2)
           ->setAnimaux($a4)
           ->setNbre(20);
        $manager->persist($d5); 
        
        
        $manager->flush();
    }
}
