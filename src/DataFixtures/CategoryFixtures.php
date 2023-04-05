<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

    $categories = ['Horreur', 'Humour', 'animé', 'Action', 'Thriller'];

        foreach ($categories as $gender){
        $category = new Category();
        $category->setName($gender);
        $manager->persist($category);
        }

        $manager->flush();
    }
}
