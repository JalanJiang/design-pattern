<?php
/*
 * @Description: Proxy Pattern
 * @Version: v1.0
 * @Author: JalanJiang
 * @Date: 2020-12-02 11:05:49
 * @LastEditTime: 2020-12-02 11:10:19
 */
interface Subject
{
    public function request();
}

class RealSubject implements Subject
{
    public function request()
    {
        echo "Request Real Subject...\n";
    }
}

class Proxy implements Subject
{
    private RealSubject $realSubject;

    public function __construct()
    {
        $this->realSubject = new RealSubject();
    }
    
    private function beforeRequest()
    {
        echo "Before Request: Proxy do something...\n";
    }

    public function request()
    {
        $this->beforeRequest();
        $this->realSubject->request();
        $this->afterRequest();
    }

    private function afterRequest()
    {
        echo "After Request: Proxy do something...\n";
    }
}

$proxy = new Proxy();
$proxy->request();
/* Output:
Before Request: Proxy do something...
Request Real Subject...
After Request: Proxy do something...
*/