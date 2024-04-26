<?php

namespace App\Controllers;

abstract class Controller
{
    protected function view($view, $data = [])
    {
        extract($data);
        include __DIR__ . "/../views/$view.php";
    }

    protected function redirect($url)
    {
        header("Location: $url");
        exit();
    }
}