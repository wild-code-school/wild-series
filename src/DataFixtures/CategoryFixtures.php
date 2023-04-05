<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORIES = [
        'Action',
        'Aventure',
        'Animation',
        'Fantastique',
        'Horreur',
    ];

    public function load(ObjectManager $manager): void
    {


        foreach (self::CATEGORIES as $gender) {
            $category = new Category();
            $category->setName($gender);
            $manager->persist($category);
            $this->addReference('category_' . $gender, $category);
        }

        $manager->flush();
    }
}
