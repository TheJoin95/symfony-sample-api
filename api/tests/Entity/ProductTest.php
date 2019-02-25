<?php

namespace App\Tests\Entity;

use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testAdd()
    {
        $test_code = uniqid();
        $test_name = "Test category 1";
        $test_description = "Test description 1";
        $product = new Product();
        $product->setCode($test_code);
        $product->setName($test_name);
        $product->setDescription($test_description);

        $this->assertEquals($test_code, $product->getCode());
        $this->assertEquals($test_name, $product->getName());
        $this->assertEquals($test_description, $product->getDescription());
    }
}

