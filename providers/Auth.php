<?php
namespace App\Providers;

use App\Providers\View;

class Auth
{
    public static function session()
    {
        if (isset($_SESSION['fingerPrint']) && $_SESSION['fingerPrint'] == md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'])) {
            return true; 
        } else {
            return View::redirect('login'); 
        }
    }

    public static function privilege($id)
    {
        if (isset($_SESSION['user_privileges_id']) && $_SESSION['user_privileges_id'] == $id) {
            return true; 
        } else {
            return View::redirect('user/show'); 
        }
    }

    public static function history()
    {   
        if (isset($_SESSION['fingerPrint'])) {
            if (!isset($_SESSION['history'])) {
                $_SESSION['history'] = []; 
            }
            $_SESSION['history'][] = $_SERVER['REQUEST_URI'];
        }
    }
}