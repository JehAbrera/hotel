<?php

namespace App\Controller;

session_start();

use App\Controller\dateAuth;
use App\Controller\phoneAuth;

class HomeController extends MainController
{

    private $days, $dayRate, $addChar, $subTot, $discRate, $discTot, $addTot, $total;

    public function Home($view)
    {
        try {
            $data = [
                'page' => $view
            ];
            return $this->view($view, $data);
        } catch (\Exception $e) {
            echo 'Error in Home method: ' . $e->getMessage();
        }
    }
    public function computeTotal($view, $name, $phone, $from, $to, $room, $cap, $payment, $datetime)
    {
        if (!phoneAuth::isValidPhone($phone)) {
            $_SESSION['error'] = "Invalid phone number";
            header("Location: ?page=reserve");
        }
        if (!dateAuth::isValidDate($from, $to)) {
            $_SESSION['error'] = "Invalid date selection";
            header("Location: ?page=reserve");
        }
        $arr = explode("-", $datetime);

        $this->setDays($from, $to);
        $this->setRate($room, $cap);
        $this->setAddChar($payment);
        $this->setSub();
        $this->setDiscTot();
        $this->setAddTot();
        $this->setTotal();

        $data = [
            'page' => "reserve",
            'step' => "compute",
            'name' => $name,
            'phone' => $phone,
            'from' => $from,
            'to' => $to,
            'room' => $room,
            'cap' => $cap,
            'payment' => $payment,
            'date' => $arr[0],
            'time' => $arr[1],
            'days' => $this->days,
            'sub' => $this->subTot,
            'add' => $this->addTot,
            'disc' => $this->discTot,
            'total' => $this->total,
        ];

        return $this->view($view, $data);
    }
    protected function setDays($from, $to)
    {
        $start = new \DateTime($from);
        $end = new \DateTime($to);
        $this->days = ($start->diff($end))->days;
    }
    protected function setRate($room, $cap)
    {
        switch ($cap) {
            case 'Single':
                switch ($room) {
                    case 'Suite':
                        $this->dayRate = 100.00;
                        break;
                    case 'Deluxe':
                        $this->dayRate = 300.00;
                        break;
                    case 'Luxury':
                        $this->dayRate = 500.00;
                        break;
                }
                break;
            case 'Double':
                switch ($room) {
                    case 'Suite':
                        $this->dayRate = 200.00;
                        break;
                    case 'Deluxe':
                        $this->dayRate = 500.00;
                        break;
                    case 'Luxury':
                        $this->dayRate = 800.00;
                        break;
                }
                break;
            case 'Family':
                switch ($room) {
                    case 'Suite':
                        $this->dayRate = 500.00;
                        break;
                    case 'Deluxe':
                        $this->dayRate = 750.00;
                        break;
                    case 'Luxury':
                        $this->dayRate = 1000.00;
                        break;
                }
                break;
        }
    }
    protected function setAddChar($payment)
    {
        switch ($payment) {
            case 'Cash':
                $this->addChar = 0;
                if ($this->days >= 3 && $this->days <= 5) {
                    $this->setDiscRate(0.10);
                } elseif ($this->days >= 6) {
                    $this->setDiscRate(0.15);
                } else {
                    $this->setDiscRate(0);
                }
                break;
            case 'Cheque':
                $this->addChar = 0.05;
                break;
            case 'Credit Card':
                $this->addChar = 0.1;
                break;
        }
    }
    protected function setSub()
    {
        $this->subTot = $this->dayRate * $this->days;
    }
    protected function setDiscRate($val)
    {
        $this->discRate = $val;
    }
    protected function setDiscTot()
    {
        $this->discTot = $this->subTot * $this->discRate;
    }
    protected function setAddTot()
    {
        $this->addTot = $this->subTot * $this->addChar;
    }
    protected function setTotal()
    {
        $this->total = $this->subTot + $this->addTot - $this->discTot;
    }   
}
