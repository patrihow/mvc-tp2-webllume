<?php
namespace App\Models;

use App\Models\CRUD;

class Projet extends CRUD
{
    protected $table      = 'projet';
    protected $primaryKey = 'id';
    protected $fillable   = ['titre', 'description', 'annee_creation', 'lien_site', 'image', 'user_id', 'categorie_id'];

}
