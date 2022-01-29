<?php

namespace App\DataFixtures;

use App\Entity\Document;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class DocumentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('FR_fr');
        $states = [
            Document::STATE_DRAFT,
            Document::STATE_PUBLISHED,
            Document::STATE_REVIEWED
        ];

        for ($i = 0; $i < 100; $i++) {
            shuffle($states);
            $document = (new Document())
                ->setName($faker->sentence())
                ->setStatus($states[0])
                ->setDescription($faker->text());
            $manager->persist($document);
        }

        $manager->flush();
    }
}
