<?php

namespace App\DataFixtures;

use App\DataFixtures\CategoryFixtures;
use App\DataFixtures\ProductFixtures;

use App\Entity\ProductCategories;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ProductCategoriesFixtures extends Fixture implements DependentFixtureInterface
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

        foreach($mapCategories as $indexProduct => $categories)
        {
            foreach($categories as $category_id)
            {
                $productCategories = new ProductCategories();
                $productCategories->setCategoryId($category_id);
                $productCategories->setProductId($this->getReference("product_$indexProduct"));
            }
    
            $manager->persist($productCategories);
        }
        

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CategoryFixtures::class,
            ProductFixtures::class
        );
    }
}
