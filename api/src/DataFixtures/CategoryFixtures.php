<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Category;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories_name = array(
            'Libri',
            'Avventura',
            'Fantascienza',
            'Storia',
            'Giallo',
            'Abbigliamento',
            'Uomo',
            'Pantaloni',
            'Maglie',
            'Felpe'
        );
        foreach($categories_name as $category_name)
        {
            $category = new Category();
            $category->setName($category_name);
            $manager->persist($category);

            $this->addReference(strtolower($category_name), $category);
        }

        $manager->flush();
    }
}
