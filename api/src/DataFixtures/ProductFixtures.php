<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Product;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i < 16; $i++)
        {
            $product = new Product();
            $product->setCode(uniqid());
            $product->setName($faker->sentence(4));
            $product->setDescription($faker->text);
            $product->setImage($faker->imageUrl(600, 400));
            $manager->persist($product);

            $this->addReference("product_$i", $product);
        }

        $manager->flush();
    }
}
