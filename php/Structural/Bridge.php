<?php
/*
 * @Description: Bridge Pattern
 * @Version: v1.0
 * @Author: JalanJiang
 * @Date: 2020-12-01 14:34:29
 * @LastEditTime: 2020-12-01 15:05:09
 */
// Shape
abstract class Shape
{
    protected string $name;
    
    protected Color $color;
    
    public function echoName()
    {
        echo "{$this->color->getColor()} {$this->name}";
    }
}

class Circle extends Shape
{
    public function __construct(Color $color)
    {
        $this->color = $color;
        $this->name = "Circle";
    }
}

class Square extends Shape
{
    public function __construct(Color $color)
    {
        $this->color = $color;
        $this->name = "Square";
    }
}

// Color
interface Color
{
    public function getColor(): string;
}

class Red implements Color
{
    public function getColor(): string
    {
        return "Red";
    }
}

class Blue implements Color
{
    public function getColor(): string
    {
        return "Blue";
    }
}

$blueColor = new Blue();
$circle = new Circle($blueColor);
$circle->echoName();
/**
Output:
Blue Circle
*/