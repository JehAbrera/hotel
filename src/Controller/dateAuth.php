<?php

namespace App\Controller;

class dateAuth {
    public static function isValidDate($from, $to) {
        $start = new \DateTime($from);
        $end = new \DateTime($to);
        if ($start >= $end) {
            return false;
        }
        return true;
    }
}