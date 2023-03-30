<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Ingredient;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{

    /**
     * @var Generator
     */
    Private Generator $faker;

    public function __construct()
    {
    $this->faker = Factory::create('fr_FR');   
    }

    public function load(ObjectManager $manager): void
    {
        for ($i=1; $i < 50; $i++) { 
            $ingredient = new Ingredient();
            $ingredient->setName($this->faker->word())
                ->setPrice(mt_rand(1,100));
                // ->setCreatedAt("") Inutile car un constructure dans la classe Ingredient a été créé de manière à ce que la date se crée toute seule
            $manager->persist($ingredient);
            $manager->flush();
        }

    }
}
