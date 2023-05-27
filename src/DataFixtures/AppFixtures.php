<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        {
            $faker = Factory::create('fr_FR');
            $users = array();
            for ($i = 0; $i < 10; $i++) {
                $users[$i] = new User();
                $users[$i]->setUsername($faker->userName());
                $users[$i]->setFirstname($faker->firstName());
                $users[$i]->setLastname($faker->lastName());
                $users[$i]->setEmail($faker->email());
                $users[$i]->setPassword($faker->password());
                $users[$i]->setDescription($faker->text(50));
                $manager->persist($users[$i]);
            }
            $manager->flush();
        }
    }
}
