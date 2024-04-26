<?php

session_start();

require_once '../vendor/autoload.php';

use App\Config\Database;
use App\Controllers\UserController;
use App\Controllers\MailingController;

$db = Database::getInstance();
$user = new \App\Models\User();
$user->createTable();

$mailing = new \App\Models\Mailing();
$mailing->createTable();

$mailingQueue = new \App\Models\MailingQueue();
$mailingQueue->createTable();

$route = $_SERVER['REQUEST_URI'];

switch ($route) {
    case '/':
        $controller = new UserController();
        $controller->showAddForm();
        break;
    case '/users/import':
        $controller = new UserController();
        $controller->importUsers();
        break;
    case '/users/import_result':
        $controller = new UserController();
        $controller->showImportResult();
        break;
    case '/mailings/send':
        $controller = new MailingController();
        $controller->showSendForm();
        break;
    case '/mailings/process':
        $controller = new MailingController();
        $controller->sendMailing();
        break;
    case '/mailings/send_result':
        $controller = new MailingController();
        $controller->showSendResult();
        break;
    default:
        echo '404 страаница не наайденна';
        break;
}