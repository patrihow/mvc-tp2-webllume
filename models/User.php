<?php
namespace App\Models;

use App\Models\CRUD;

class User extends CRUD
{
    protected $table = 'user';
    
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'nom', 
        'prenom', 
        'email', 
        'mot_de_passe', 
        'biographie', 
        'photo_profil', 
        'user_privileges_id'
    ];

    public function hashPassword($password, $cost = 10)
    {
        $options = [
            'cost' => $cost,
        ];

        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public function checkUser ($email, $password)
    {
        $user = $this->unique('email', $email);
        if ($user) {
            
            if (password_verify($password, $user['mot_de_passe'])) {
                session_regenerate_id();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['nom']; 
                $_SESSION['privilege_id'] = $user['user_privileges_id'];
                $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
                return true;
            } else {
                return false;
            }
        } else {
            return false; 
        }
    }
}