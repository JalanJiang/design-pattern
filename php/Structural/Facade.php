<?php
/*
 * @Description: Facade Pattern
 * @Version: v1.0
 * @Author: JalanJiang
 * @Date: 2020-12-01 19:11:18
 * @LastEditTime: 2020-12-01 19:20:19
 */

// Sub System Interface
interface Shape
{
    public function draw();
}

class Circle implements Shape
{
    public function draw()
    {
        echo "Drawing Circle...\n";
    }
}

class Square implements Shape
{
    public function draw()
    {
        echo "Drawing Square...\n";
    }
}

// Facade: Shape Maker
class ShapeMaker
{
    private Circle $circle;

    private Square $square;

    public function __construct()
    {
        $this->circle = new Circle();
        $this->square = new Square();
    }

    public function drawCircle()
    {
        $this->circle->draw();
    }

    public function drawSquare()
    {
        $this->square->draw();
    }
}

$shapeMaker = new ShapeMaker();
$shapeMaker->drawCircle();
$shapeMaker->drawSquare();
/* Output:
Drawing Circle...
Drawing Square...
*/