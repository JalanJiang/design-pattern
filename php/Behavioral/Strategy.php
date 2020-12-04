<?php
/*
 * @Description: Strategy Pattern
 * @Version: v1.0
 * @Author: JalanJiang
 * @Date: 2020-12-04 18:01:55
 * @LastEditTime: 2020-12-04 18:12:55
 */
// Duck
class Duck
{
    protected $flyBehavior;

    protected $quackBehavior;

    public function __construct($flyBehavior, $quackBehavior)
    {
        $this->flyBehavior = $flyBehavior;
        $this->quackBehavior = $quackBehavior;
    }

    public function fly()
    {
        $this->flyBehavior->fly();
    }

    public function quack()
    {
        $this->quackBehavior->quack();
    }
}

// Fly
interface FlyBehavior
{
    public function fly();
}

class FlyWithWings implements FlyBehavior
{
    public function fly()
    {
        echo "Can fly!\n";
    }
}

class FlyNoWay implements FlyBehavior
{
    public function fly()
    {
        echo "Can't fly!\n";
    }
}

// Quack
interface QuackBehavior
{
    public function quack();
}

class DuckQuack implements QuackBehavior
{
    public function quack()
    {
        echo "Gua Gua!\n";
    }
}

class DuckSqueak implements QuackBehavior
{
    public function quack()
    {
        echo "Zhi Zhi!\n";
    }
}

// Can't fly
$flyNoWay = new FlyNoWay();
// Squeak
$squeak = new DuckSqueak();
// new duck
$yellowDuck = new Duck($flyNoWay, $squeak);
$yellowDuck->fly();
$yellowDuck->quack();
/* Output:
Can't fly!
Zhi Zhi!
*/