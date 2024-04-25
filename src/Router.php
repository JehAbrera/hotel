<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'index';
$controller = new App\Controller\HomeController();


if ($page == 'index' || $page == 'profile' || $page == 'contact' || $page == 'reserve' || $page == 'login') {
    $controller->Home($page);
}
if ($page == "compute") {
    $name = ucwords($_POST['name']);
    $phone = $_POST['contact'];
    $from = $_POST['dateFrom'];
    $to = $_POST['dateTo'];
    $room = $_POST['rType'];
    $cap = $_POST['rCap'];
    $payment = $_POST['payment'];
    $datetime = $_POST['datetime'];

    $controller->computeTotal($name, $phone, $from, $to, $room, $cap, $payment, $datetime);
}
