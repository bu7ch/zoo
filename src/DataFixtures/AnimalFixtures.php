<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $a1 = new Animal();
        $a1->setNom('Chien')
           ->setDescription('Un animal domestique')
           ->setImage('chien.jpg');
        $manager->persist($a1);

        $a2 = new Animal();
        $a2->setNom('Cochcon')
           ->setDescription("Un animal d'élevage")
           ->setImage('cochon.jpg');
        $manager->persist($a2);

        $a3 = new Animal();
        $a3->setNom('Serpent')
           ->setDescription('Un animal dangereux')
           ->setImage('serpent.jpg');
        $manager->persist($a3);

        $a4 = new Animal();
        $a4->setNom('Crocodile')
           ->setDescription('Un animal très dangereux')
           ->setImage('croco.jpg');
        $manager->persist($a4);

        $a5 = new Animal();
        $a5->setNom('Requin')
           ->setDescription('Un animal marin très dangereux ')
           ->setImage('requin.jpg');
        $manager->persist($a5);

        $manager->flush();
    }
}
