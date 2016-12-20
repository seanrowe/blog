<?php

class UserService
{
    private static $instance = null;
    private function __construct() {}

    public static function instanceOf(): UserService
    {
        if (null === self::$instance) {
            self::$instance = new UserService();
        }

        return self::$instance;
    }

    public function login($username, $password): boolean
    {

    }

    public function isLoggedIn(): boolean
    {

    }
}