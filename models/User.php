<?php

namespace App\Models;
use App\Models\CRUD;

class User extends CRUD{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'prenom', 'email', 'mot_de_passe', 'biographie', 'photo_profil', 'user_privileges_id'];
}