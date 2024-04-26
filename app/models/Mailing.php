<?php

namespace App\Models;

use PDO;

class Mailing extends Model
{
    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS mailings (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(100) NOT NULL,
            text TEXT NOT NULL
        )";
        $this->db->exec($sql);
    }

    public function create($title, $text)
    {
        $sql = "INSERT INTO mailings (title, text) VALUES (:title, :text)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':text', $text);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM mailings WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}