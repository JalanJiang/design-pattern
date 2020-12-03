<?php
/*
 * @Description: Observer Pattern
 * @Version: v1.0
 * @Author: JalanJiang
 * @Date: 2020-12-03 15:23:05
 * @LastEditTime: 2020-12-03 15:50:25
 */
// Subject
interface Subject
{
    public function subscribe($observer);
    public function unsubscribe($observer);   
    public function notify();
}

class Publisher implements Subject
{
    private $users;

    private $state;

    public function __construct()
    {
        $this->users = [];
    }

    public function subscribe($observer)
    {
        $this->users[] = $observer;
    }

    public function unsubscribe($observer)
    {
        $key = array_search($observer, $this->users, true);
        if ($key !== false) {
            unset($this->users[$key]);
        }
    }

    public function notify()
    {
        echo "Publisher notify...\n";
        foreach ($this->users as $user)
        {
            $user->update($this);
        }
    }

    public function productState()
    {
        $this->state = rand(0, 100);
    }

    public function getState()
    {
        return $this->state;
    }
}

// Observer
interface Observer
{
    public function update(Subject $subject);
}

class User implements Observer
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function update(Subject $subject)
    {
        echo "User {$this->name} get state {$subject->getState()}\n";
    }
}

$userA = new User("User A");
$userB = new User("User B");
$userC = new User("User C");

$publisher = new Publisher();
$publisher->subscribe($userA);
$publisher->productState();
$publisher->notify();

$publisher->subscribe($userB);
$publisher->subscribe($userC);
$publisher->productState();
$publisher->notify();

$publisher->unsubscribe($userB);
$publisher->productState();
$publisher->notify();
/* Output:
Publisher notify...
User User A get state 9
Publisher notify...
User User A get state 74
User User B get state 74
User User C get state 74
Publisher notify...
User User A get state 41
User User C get state 41
*/