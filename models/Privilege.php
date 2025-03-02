<?php

namespace App\Models;
use App\Models\CRUD;

class Privilege extends CRUD{
    protected $table = 'UserPrivileges';
    protected $primaryKey = 'id';    
}