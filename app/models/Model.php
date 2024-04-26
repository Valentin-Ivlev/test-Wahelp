<?php

namespace App\Models;

use App\Config\Database;
use PDO;

abstract class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    abstract public function createTable();
}