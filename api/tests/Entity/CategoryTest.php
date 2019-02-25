<?php

namespace App\Tests\Entity;

use App\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    public function testAdd()
    {
        $test_name = "Test category 1";
        $category = new Category();
        $category->setName($test_name);

        $this->assertEquals($test_name, $category->getName());
    }
}

