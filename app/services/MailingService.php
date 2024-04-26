<?php

namespace App\Services;

use App\Models\Mailing;
use App\Models\MailingQueue;
use App\Models\User;

class MailingService
{
    public function sendMailing($title, $text)
    {
        $mailing = new Mailing();
        $mailingId = $mailing->create($title, $text);

        $user = new User();
        $users = $user->getAll();
        $userIds = array_column($users, 'id');

        $mailingQueue = new MailingQueue();
        $mailingQueue->addUsers($mailingId, $userIds);

        $this->processMailing($mailingId);
    }

    private function processMailing($mailingId)
    {
        $mailingQueue = new MailingQueue();
        $users = $mailingQueue->getUsers($mailingId);

        $mailingInfo = '';

        foreach ($users as $user) {
            $queueId = $user['id'];
            $phone = $user['phone'];
            $name = $user['name'];
            $message = $user['text'];

            $mailingInfo .= $this->sendMessage($phone, $name, $message);

            $mailingQueue->markAsSent($queueId);
        }

        return $mailingInfo;
    }

    private function sendMessage($phone, $name, $message)
    {
        // реализация отправки сообщения

        return "Отправка сообщения $name ($phone): $message<br>";
    }
}