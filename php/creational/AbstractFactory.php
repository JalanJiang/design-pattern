<?php
/*
 * @Description: Abstract Factory
 * @Version: v1.0
 * @Author: JalanJiang
 * @Date: 2020-11-26 17:34:40
 * @LastEditTime: 2020-11-26 17:45:46
 */

// Factories
// Abstract Factory
abstract class Factory
{
    public function createProductA() {}
    public function createProductB() {}
}

// Factory 1 create Product A1 and Product B1
class Factory1 
{
    public function createProductA()
    {
        return new ProductA1();
    }

    public function createProductB()
    {
        return new ProductB1();
    }
}

// Factory 2 create Product A2 and Product B2
class Factory2
{
    public function createProductA()
    {
        return ProductA2();
    }

    public function createProductB()
    {
        return new ProductB2();
    }
}

// Products
// Product A Family 
abstract class ProductA
{
    public function use() {}
}

// Product A1
class ProductA1 extends ProductA 
{
    public function use() 
    {
        echo "Using Product A1 which from Product A Family\n";
    }
}

// Product A2
class ProductA2 extends ProductA 
{
    public function use()
    {
        echo "Using Product A2 which from Product A Family\n";
    }
}

// Product B Family
abstract class ProductB 
{
    public function use() {}
}

// Product B1
class ProductB1 extends ProductB 
{
    public function use()
    {
        echo "Using Product B1 which from Product B Family\n";
    }
}

// Product B2
class ProductB2 extends ProductB
{
    public function use()
    {
        echo "Using Product B2 which from Product B family\n";
    }
}

// Create Product A1 and Product B1
$factory1 = new Factory1();
$productA1 = $factory1->createProductA();
$productA1->use();
$productB1 = $factory1->createProductB();
$productB1->use();

/**
Output:
Using Product A1 which from Product A Family
Using Product B1 which from Product B Family
 * /