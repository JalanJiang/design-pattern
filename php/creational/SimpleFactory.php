<?php
/*
 * @Description: Simple Factory Pattern
 * @Version: v1.0
 * @Author: JalanJiang
 * @Date: 2020-11-25 17:25:14
 * @LastEditTime: 2020-11-25 17:38:36
 */

// Product Class
abstract class Product 
{
    public function use() {}
}

// Product A
class ProductA extends Product 
{
    public function use() 
    {
        echo "Using Product A\n";
    }
}

// Product B
class ProductB extends Product {
    public function use()
    {
        echo "Using Product B\n";
    }
}

// Factory Class
class Factory {
    // The static function to create product
    public static function createProduct(string $name)
    {
        switch($name) {
            case 'a':
                return new ProductA();
            case 'b':
                return new ProductB();  
        }
    }
}

$productA = Factory::createProduct('a');
$productA->use();
$productB = Factory::createProduct('b');
$productB->use();
/**
Output:
Using Product A
Using Product B
*/