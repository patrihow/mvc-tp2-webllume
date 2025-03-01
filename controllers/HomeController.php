<?php

namespace App\Controllers;

// use App\Models\ExampleModel;
// use App\Providers\Views;

// include('models/ExampleModel.php');

class HomeController{
    public function index(){
        include('views/home.php');
    //     $model = new ExampleModel;
    //     //$data = "Peter";
    //     $data = $model->getData();
    //    include('views/home.php');
    // return View::render('home', ['name' => 'Peter']);
    echo "Bienvenue sur la page d'accueil !";

}

public function about(){
    echo "Hello about";
    }
}


?>