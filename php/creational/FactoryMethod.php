<?php
/*
 * @Description: Factory Method Pattern
 * @Version: v1.0
 * @Author: JalanJiang
 * @Date: 2020-11-25 18:10:22
 * @LastEditTime: 2020-11-26 17:04:14
 */
// Abstract factory
abstract class Factory 
{
    public function createProduct() {}
}

class ProductFactoryA extends Factory
{
    public function createProduct()
    {
        return new ProductA();
    }
}

class ProductFactoryB extends Factory
{
    public function createProduct()
    {
        return new ProductB();
    }
}

// Abstract product
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
class ProductB extends Product
{
    public function use()
    {
        echo "Using Product B\n";
    }
}

// Create Product A
$productFactoryA = new ProductFactoryA();
$productA = $productFactoryA->createProduct();
$productA->use();
// Create Product B
$productFactoryB = new ProductFactoryB();
$productB = $productFactoryB->createProduct();
$productB->use();

/**
Output:
Using Product A
Using Product B
*/