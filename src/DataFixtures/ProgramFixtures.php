<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public const CATEGORIES = [
        'category_Action',
        'category_Aventure',
        'category_Animation',
        'category_Fantastique',
        'category_Horreur',
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORIES as $category) {
            for ($i = 0; $i < 5; $i++) {
                $program = new Program();
                $program->setTitle('number' . $i);
                $program->setSynopsis('Synopsis for the program number ' . $i . ' of ' . $category);
                $program->setCategory($this->getReference($category));
                $manager->persist($program);
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}