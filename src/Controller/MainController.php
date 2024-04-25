<?php

namespace App\Controller;

class MainController {
    protected function view($view, $data = []) {
        try {
            extract($data);
            $filePath = __DIR__ . "/../View/$view.php";
            if (!file_exists($filePath)) {
                throw new \Exception("View file not found: $filePath");
            }
            include $filePath;
        } catch (\Exception $e) {
            throw new \Exception('Error in view method: ' . $e->getMessage());
        }
    }
}