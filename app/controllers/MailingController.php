<?php

namespace App\Controllers;

use App\Services\MailingService;

class MailingController extends Controller
{
    public function showSendForm()
    {
        $this->view('mailings/send');
    }

    public function sendMailing()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $text = $_POST['text'];

            $mailingService = new MailingService();
            $mailingInfo = $mailingService->sendMailing($title, $text);

            $_SESSION['mailing_info'] = $mailingInfo;

            $this->redirect('/mailings/send_result');
        }
    }

    public function showSendResult()
    {
        $this->view('mailings/send_result');
    }
}