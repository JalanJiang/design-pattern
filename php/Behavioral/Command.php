<?php
/*
 * @Description: Command Pattern
 * @Version: v1.0
 * @Author: JalanJiang
 * @Date: 2020-12-02 15:24:18
 * @LastEditTime: 2020-12-02 15:34:06
 */
// Receiver
class Televation
{
    public function open()
    {
        echo "TV open!\n";
    }

    public function off()
    {
        echo "TV off!\n";
    }
}

// Command
abstract class Command
{
    protected Televation $TV;

    public function __construct(Televation $TV)
    {
        $this->TV = $TV;
    }
    
    public function execute(){}
}

// Open Command
class OpenCommand extends Command
{
    public function execute()
    {
        $this->TV->open();
    }
}

// Off Command
class OffCommand extends Command
{
    public function execute()
    {
        $this->TV->off();
    }
}

// Invoker
class Controller
{
    private $openCommand;

    private $offCommand;

    public function __construct($TV)
    {
        $this->openCommand = new OpenCommand($TV);
        $this->offCommand = new OffCommand($TV);
    }

    public function open()
    {
        $this->openCommand->execute();
    }

    public function off()
    {
        $this->offCommand->execute();
    }
}

$TV = new Televation();
$controller = new Controller($TV);
$controller->open();
$controller->off();
/* Output:
TV open!
TV off!
*/