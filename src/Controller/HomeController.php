<?php

namespace App\Controller;

session_start();

use App\Controller\dateAuth;
use App\Controller\phoneAuth;

class HomeController extends MainController {
    public function Home($view) {
        try {
            $data = [
                'page' => $view
            ];
            return $this->view($view, $data);
        } catch (\Exception $e) {
            echo 'Error in Home method: ' . $e->getMessage();
        }
    }
    public function show($view) {
        try {
            $data = ["hello", "world"];
            return $this->view($view, $data);
        } catch (\Exception $e) {
            echo 'Error in show method: ' . $e->getMessage();
        }
    }
    public function computeTotal($name, $phone, $from, $to, $room, $cap, $payment, $datetime) {
        if(!phoneAuth::isValidPhone($phone)) {
            $_SESSION['error'] = "Invalid phone number";
            header("Location: ?page=reserve");
        }
        if(!phoneAuth::isValidPhone($from, $to)) {
            $_SESSION['error'] = "Invalid date selection";
            header("Location: ?page=reserve");
        }
    }
}