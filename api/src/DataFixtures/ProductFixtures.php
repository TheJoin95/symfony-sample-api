<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Product;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 15; $i++)
        {
            $product = new Product();
            $product->setCode(uniqid());
            $product->setName("Product n. $i");
            $product->setDescription("A dummy product");
            // $product->setImage("");
            $manager->persist($product);
        }

        $manager->flush();
    }
}
