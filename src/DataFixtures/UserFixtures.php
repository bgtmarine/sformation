<?php

namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for($i=0; $i<=30; $i++):
            $user = new User();
            $user->setnom($faker->firstName());
            $user->setprenom($faker->lastName());
            $user->setage($faker->numberBetween(18,99));
            $user->settelephone($faker->randomElement(['0636252415']));
            $user->setEmail($faker->email());
            $user->setadresse($faker->address());
            $user->setRoles($faker->randomElement([['ROLE_USER'],['ROLE_ADMIN']]));
            $user->setPassword($faker->password());
            

            
            $manager->persist($user);
        endfor;

        $manager->flush();
    }
}
