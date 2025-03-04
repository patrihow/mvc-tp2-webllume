<?php
namespace App\Providers;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class View {
    static public function render($template, $data = []){
        $loader = new FilesystemLoader('views');
        $twig = new Environment($loader);
        $twig->addGlobal('assets', ASSET);
        $twig->addGlobal('base', BASE);
        echo $twig->render($template.".php", $data);
    }

    static public function redirect($url){
        return header('location:'.BASE.'/'.$url);
    }
}