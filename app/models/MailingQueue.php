<?php

namespace App\Models;

use PDO;

class MailingQueue extends Model
{
    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS mailing_queue (
            id INT AUTO_INCREMENT PRIMARY KEY,
            mailing_id INT NOT NULL,
            user_id INT NOT NULL,
            sent TINYINT(1) DEFAULT 0,
            FOREIGN KEY (mailing_id) REFERENCES mailings(id),
            FOREIGN KEY (user_id) REFERENCES users(id)
        )";
        $this->db->exec($sql);
    }

    public function addUsers($mailingId, $userIds)
    {
        $sql = "INSERT INTO mailing_queue (mailing_id, user_id) VALUES (:mailing_id, :user_id)";
        $stmt = $this->db->prepare($sql);
        foreach ($userIds as $userId) {
            $stmt->bindParam(':mailing_id', $mailingId);
            $stmt->bindParam(':user_id', $userId);
            $stmt->execute();
        }
    }

    public function getUsers($mailingId)
    {
        $sql = "SELECT mq.id, u.phone, u.name, m.text 
                FROM mailing_queue mq
                JOIN users u ON mq.user_id = u.id
                JOIN mailings m ON mq.mailing_id = m.id
                WHERE mq.sent = 0 AND mq.mailing_id = :mailing_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':mailing_id', $mailingId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function markAsSent($queueId)
    {
        $sql = "UPDATE mailing_queue SET sent = 1 WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $queueId);
        $stmt->execute();
    }
}