<?php
namespace App\Providers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View
{
    public static function render($template, $data = [])
    {
        $loader = new FilesystemLoader('views');
        $twig   = new Environment($loader);
        $twig->addGlobal('asset', ASSET);
        $twig->addGlobal('base', BASE);
        // $twig->addGlobal('uploads', UPLOADS);
        echo $twig->render($template . ".php", $data);
    }

    public static function redirect($url)
    {
        return header('location:' . BASE . '/' . $url);
    }
}