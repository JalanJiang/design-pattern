<?php
/*
 * @Description: Adapater
 * @Version: v1.0
 * @Author: JalanJiang
 * @Date: 2020-11-27 16:02:24
 * @LastEditTime: 2020-11-27 16:08:45
 */
// Abstract Adapater
abstract class Target
{
    public function request(){}
}

// Adapater
class Adapater extends Target
{
    private $adapatee;

    public function __construct(Adapatee $adapatee)
    {
        $this->adapatee = $adapatee;
    }

    public function request()
    {
        return "Adapater: {$this->adapatee->specificRequest()}";
    }
}

// Adapatee
class Adapatee
{
    public function specificRequest(): string
    {
        return "Using adapatee";
    }
}


// Client
function clientCode(Target $target)
{
    echo $target->request();
}

$adapatee = new Adapatee();
$adapater = new Adapater($adapatee);
clientCode($adapater);
/**
Output:
Adapater: Using adapatee
*/