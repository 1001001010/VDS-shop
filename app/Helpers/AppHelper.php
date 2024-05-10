<?php

namespace App\Helpers;

class AppHelper
{
    private static $instance;

    private function __construct() {}

    public static function instance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function generate_password($length = 10)
    {
        $chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP1234567890';
        $chars = str_shuffle($chars);
        $password = substr($chars, 0, $length);
        return $password;
    }
}