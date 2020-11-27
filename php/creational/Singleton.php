<?php
/*
 * @Description: Singleton
 * @Version: v1.0
 * @Author: JalanJiang
 * @Date: 2020-11-27 11:23:55
 * @LastEditTime: 2020-11-27 14:12:40
 */

 class Singleton 
 {
    private static $instance;

    private function __construct(){}
    
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Singleton();
        }
        
        return self::$instance;
    }

    public function showMessage()
    {
        echo "Singleton message";
    }
 }

 $instance = Singleton::getInstance();
 $instance->showMessage();