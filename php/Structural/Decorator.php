<?php
/*
 * @Description: Decorator Pattern
 * @Version: v1.0
 * @Author: JalanJiang
 * @Date: 2020-12-01 16:29:26
 * @LastEditTime: 2020-12-01 16:50:40
 */
// Component
interface Transform
{
    public function move();
}

// ConcreteComponent
class Car implements Transform
{
    public function move()
    {
        echo "Car Moving...\n";
    }
}

// Decorator
abstract class Changer implements Transform
{
    protected Transform $transform;

    public function __construct(Transform $transform)
    {
        $this->transform = $transform;
    }

    public function move()
    {
        $this->transform->move();
    }
}

// ConcreteDecorator
class Robot extends Changer
{
    public function speak()
    {
        echo "Robot Speaking...\n";
    }
}

class Airplane extends Changer
{
    public function fly()
    {
        echo "Airplane Flying...\n";
    }
}

// New car
$car = new Car();
// New Decorator and decorate the car
$robot = new Robot($car);
$robot->move();
$robot->speak();
/*
Output:
Car Moving...
Robot Speaking...
*/