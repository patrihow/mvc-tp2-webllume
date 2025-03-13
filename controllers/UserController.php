<?php
namespace App\Controllers;

use App\Models\User;
use App\Providers\Validator;
use App\Providers\View;
use App\Providers\Auth;
use App\Models\Privilege;

class UserController
{
    public function __construct()
    {
        Auth::history(); 
    }

    public function create()
    {
        $privilege = new Privilege;
        $selectPrivilege = $privilege->select(); 
        return View::render('user/create', ['privileges' => $selectPrivilege]);
    }

    public function store($data = [])
    {
        $validator = new Validator;

        $validator->field('email', $data['email'])->required()->max(70)->email();
        $validator->field('mot_de_passe', $data['mot_de_passe'])->required()->min(6)->max(100);
        $validator->field('nom', $data['nom'])->required()->min(2)->max(50);
        $validator->field('prenom', $data['prenom'])->required()->min(2)->max(50);
        $validator->field('user_privileges_id', $data['user_privileges_id'])->required();

        $privilege = new Privilege;
        $selectPrivilege = $privilege->select(); 
        
        if ($validator->isSuccess()) {
            $user = new User;
            $data['mot_de_passe'] = $user->hashPassword($data['mot_de_passe']); 
            $insert = $user->insert($data);
            if ($insert) {
                return View::redirect('user/show?id=' . $insert); 
            } else {
                return View::render('error', ['msg' => 'L\'inscription utilisateur a échoué.']);
            }
        } else {
            $errors = $validator->getErrors();
            return View::render('user/create', ['errors' => $errors, 'user' => $data, 'privileges' => $selectPrivilege]);
        }
    }

    public function show($data = [])
    {
        if (Auth::session()) {
            if (isset($_SESSION['user_id'])) {
                $user = new User;
                if ($selectId = $user->selectId($_SESSION['user_id'])) {
                    return View::render('user/show', ['user' => $selectId]);
                } else {
                    return View::render('error', ['msg' => 'L\'utilisateur n\'existe pas.']);
                }
            }
            return View::render('error', ['msg' => 'Accès restreint, veuillez vous connecter.']);
        }
    }

    public function edit($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $user = new User;
            if ($selectId = $user->selectId($data['id'])) {
                return View::render('user/edit', ['user' => $selectId]);
            } else {
                return View::render('error', ['msg' => 'Utilisateur est introuvable.']);
            }
        }
        return View::render('error', ['msg' => 'Accès restreint, veuillez vous connecter.']);
    }

    public function update($data = [], $get = [])
    {
        $get = !empty($get) ? $get : $_GET;

        if (isset($get['id']) && $get['id'] != null) {
            $validator = new Validator;

            $validator->field('email', $data['email'])->required()->max(70)->email();
            $validator->field('mot_de_passe', $data['mot_de_passe'])->required()->min(6)->max(100);
            $validator->field('nom', $data['nom'])->required()->min(2)->max(50);
            $validator->field('prenom', $data['prenom'])->required()->min(2)->max(50);

            if ($validator->isSuccess()) {
                $user = new User;

                $update = $user->update($data, $get['id']); 
                if ($update) {
                    return View::redirect('user/show?id=' . $get['id']);
                } else {
                    return View::render('error', ['msg' => 'Les modifications n\'ont pas pu être appliquées.']);
                }
            } else {
                $errors = $validator->getErrors();
                return View::render('user/edit', ['errors' => $errors, 'user' => $data]);
            }
        }
    }

    public function delete($data = [])
    {
        if (Auth::session() && Auth::privilege(1)) {
            $id = $_SESSION['user_id'];
            $user = new User;
            $delete = $user->delete($id); 
            if ($delete) {
                return View::redirect('user/create');
            } else {
                return View::render('error', ['msg' => 'La suppression du compte a échoué.']);
            }
        }
    }
}