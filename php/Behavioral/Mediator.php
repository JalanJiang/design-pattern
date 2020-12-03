<?php
/*
 * @Description: Mediator Pattern
 * @Version: v1.0
 * @Author: JalanJiang
 * @Date: 2020-12-03 10:52:47
 * @LastEditTime: 2020-12-03 11:21:03
 */
// Mediator
abstract class AbstractChatGroup
{
    protected $toUser;

    public function register(Member $toUser){}

    public function sendText(string $text){}

    public function sendImage(string $image){}
}

// ConcreteMediator
class ChatGroup extends AbstractChatGroup
{
    public function register(Member $toUser)
    {
        $this->toUser = $toUser;
    }

    public function sendText(string $text)
    {
        $this->toUser->receiveText($text);
    }

    public function sendImage(string $image)
    {
        $this->toUser->receiveImage($image);
    }
}

// Colleague
abstract class Member
{
    protected string $name;

    protected ChatGroup $chatGroup;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function sendText(string $text)
    {
        $this->chatGroup->sendText($text);
    }

    public function receiveText(string $text)
    {
        echo "{$this->name} receive text message: {$text}\n";
    }

    public function receiveImage(string $image)
    {
        echo "{$this->name} receive image message: {$image}\n";
    }

    public function setChatGroup(ChatGroup $chatGroup)
    {
        $this->chatGroup = $chatGroup;
    }
}

// ConcreteColleague
class CommonMember extends Member
{
}

class DiamondMember extends Member
{
    public function sendImage(string $image)
    {
        // $this->chatGroup->sendText($text);
        $this->chatGroup->sendImage($image);
    }
}

$diamondMember = new DiamondMember('VIP User');
$commonMember = new CommonMember('Common User');
// create chat group
$chatGroup = new ChatGroup();
// set relation
$chatGroup->register($commonMember);
$diamondMember->setChatGroup($chatGroup);
$diamondMember->sendText("Hello World!");
$diamondMember->sendImage("hello.jpg");
/* Output:
Common User receive text message: Hello World!
Common User receive image message: hello.jpg
*/