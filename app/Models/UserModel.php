<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['username', 'password', 'name', 'nisn', 'role', 'class', 'jurusan', 'birth_place', 'birth_date', 'address', 'gender'];
}
