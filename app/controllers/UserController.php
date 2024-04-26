<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function showAddForm()
    {
        $this->view('users/add');
    }

    public function importUsers()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
            $file = $_FILES['csv_file']['tmp_name'];
            $user = new User();
            $user->importFromCSV($file);
            $this->redirect('/users/import_result');
        }
    }

    public function showImportResult()
    {
        $this->view('users/import_result');
    }
}