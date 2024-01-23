<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Formation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class FormationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($j=0; $j < 5; $j++):
            $category =new Category();
            $category->setTitre($faker->randomElement(['informatique', 'bureautique', 'sécurité','anglais','management','médiation']))
            ->setDescription($faker->sentence());
            $manager->persist($category);

        endfor;


        for($i=0; $i<=30; $i++):
            $formation = new Formation();
            $formation->setTitre($faker->words(3,true));
            $formation->setResume($faker->sentence());
            $formation->setDescription($faker->paragraph());
            $formation->setDuree($faker->numberBetween(0, 365));
            $formation->setNiveau($faker->randomElement(['débutant', 'intermediare', 'expert']));
            $formation->setLieu($faker->randomElement(['presentiel', 'distanciel']));
            $formation->setCategory($faker->nomberBetween(1,6));
            $manager->persist($formation);
        endfor;

        $manager->flush();
    }
}
