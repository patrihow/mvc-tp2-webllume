<?php

namespace App\Models;

abstract class CRUD extends \PDO{
    final public function __construct()
    {
        parent::__construct('mysql:host=localhost; dbname=webllume; port=3306; charset=utf8', 'root', '');
    }
}