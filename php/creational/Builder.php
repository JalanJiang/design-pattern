<?php
/*
 * @Description: Builder
 * @Version: v1.0
 * @Author: JalanJiang
 * @Date: 2020-11-27 10:38:34
 * @LastEditTime: 2020-11-27 10:58:55
 */
// Abstract Builder
abstract class Builder
{
    public function buildDrink() {}

    public function buildFood() {}

    public function getMeal() {}
}

// Build Meal A: Coffee + Chicken Burger
class MealABuilder extends Builder
{
    private $meal;

    public function __construct()
    {
        $this->meal = new Meal();
    }

    public function buildDrink()
    {
        $this->meal->setDrink("Coffee");
    }

    public function buildFood()
    {
        $this->meal->setFood("Chicken Burger");
    }

    public function getMeal()
    {
        return $this->meal;
    }
}

// Build Meal B: Cola + French fires
class MealBBuilder extends Builder
{
    private Meal $meal;

    public function __construct() 
    {
        $this->meal = new Meal();
    }

    public function buildDrink()
    {
        $this->meal->setDrink("Cola");
    }

    public function buildFood()
    {
        $this->meal->setFood("French fries");
    }

    public function getMeal()
    {
        return $this->meal;
    }
}

// Product Class
class Meal 
{
    private string $drink;
    private string $food;

    public function getDrink()
    {
        return $this->drink;
    }

    public function setDrink(string $drink)
    {
        $this->drink = $drink;
    }

    public function getFood()
    {
        return $this->food;
    }

    public function setFood(string $food)
    {
        $this->food = $food;
    }
}

// Director: Direct the build to create meal
class Waiter 
{
    private $builder;

    public function setBuilder(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function createMeal()
    {
        $this->builder->buildDrink();
        $this->builder->buildFood();
        $meal = $this->builder->getMeal();

        return $meal;
    }
}

// create director
$waiter = new Waiter();
// create builder
$mealABuilder = new MealABuilder();
// set director's builder
$waiter->setBuilder($mealABuilder);
// create meal
$meal = $waiter->createMeal();
echo "Create Meal: {$meal->getDrink()} + {$meal->getFood()}\n";
/**
Output:
Create Meal: Coffee + Chicken Burger
*/