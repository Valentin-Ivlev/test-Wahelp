<?php

namespace App\Models;

use PDO;

class User extends Model
{
    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            phone VARCHAR(20) NOT NULL,
            name VARCHAR(100) NOT NULL
        )";
        $this->db->exec($sql);
    }

    public function importFromCSV($file)
    {
        $handle = fopen($file, 'r');
        while (($data = fgetcsv($handle)) !== false) {
            $phone = trim($data[0]);
            $name = trim($data[1]);
            $this->create($phone, $name);
        }
        fclose($handle);
    }

    public function create($phone, $name)
    {
        $sql = "INSERT INTO users (phone, name) VALUES (:phone, :name)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}