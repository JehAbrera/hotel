<?php

namespace App\Controller;

class phoneAuth {
    public static function isValidPhone($phone) {
        $justNums = preg_replace("/[^0-9]/", '', $phone);

        if (!preg_match("/^09[0-9]{9}$/", $justNums)) {
            return false;
        }
        return true;
    }
}