<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Product;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $mapCategories = array(
            array($this->getReference('libri'), $this->getReference('avventura')),
            array($this->getReference('libri'), $this->getReference('fantascienza')),
            array($this->getReference('libri'), $this->getReference('storia')),
            array($this->getReference('libri'), $this->getReference('giallo')),
            array($this->getReference('libri'), $this->getReference('giallo')),
            array($this->getReference('libri'), $this->getReference('fantascienza')),
            array($this->getReference('libri'), $this->getReference('storia')),
            array($this->getReference('libri'), $this->getReference('storia')),
            array($this->getReference('libri'), $this->getReference('avventura')),
            array($this->getReference('libri'), $this->getReference('avventura')),
            array($this->getReference('abbigliamento'), $this->getReference('uomo'), $this->getReference('pantaloni')),
            array($this->getReference('abbigliamento'), $this->getReference('uomo'), $this->getReference('maglie')),
            array($this->getReference('abbigliamento'), $this->getReference('uomo'), $this->getReference('felpe')),
            array($this->getReference('abbigliamento'), $this->getReference('pantaloni')),
            array($this->getReference('abbigliamento')),
        );

        $faker = \Faker\Factory::create();
        for($i = 0; $i < 16; $i++)
        {
            $product = new Product();
            $product->setCode(uniqid());
            $product->setName($faker->sentence(4));
            $product->setDescription($faker->text);
            $product->setImage($faker->imageUrl(600, 400));
            if(isset($mapCategories[$i])) {
                foreach($mapCategories[$i] as $category)
                    $product->addCategory($category);
            }
            
            $manager->persist($product);
        }

        $manager->flush();
    }
}
