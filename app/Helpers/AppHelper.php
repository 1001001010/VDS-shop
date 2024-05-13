<?php

namespace App\Helpers;

use Carbon\Carbon;

class AppHelper {
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

    public function get_future($term) {
        $date = Carbon::now();
        $futureDate = ($term === 'hour') ? $date->addHours(1) : $date->addMonths(1);
        $formattedFutureDate = $futureDate->format('Y-m-d H:i:s');
        return $formattedFutureDate;
    }
}