<?php
namespace App\Controllers;

use App\Models\User;
use App\Providers\Validator;
use App\Providers\View;

class UserController
{
    public function create()
    {
        return View::render('user/create');
    }

    public function store($data = [])
    {
        $validator = new Validator;

        $validator->field('nom', $data['nom'])->required()->max(50)->nom();
        $validator->field('prenom', $data['prenom'])->required()->max(50)->prenom();
        $validator->field('email', $data['email'])->required()->max(70)->email();
        $validator->field('motDePasse', $data['motDePasse'])->required()->min(8)->max(15);
        $validator->field('biographie', $data['biographie'])->max(100)->biographie();

        if ($validator->isSuccess()) {
            $user = new User;

            $data['mot_de_passe'] = password_hash($data['motDePasse'], PASSWORD_DEFAULT);
            unset($data['motDePasse']); 

            $insert = $user->insert($data);
            if ($insert) {
                return View::redirect('user/show?id=' . $insert);
            } else {
                return View::render('error', ['msg' => 'Utilisateur non enregistré.']);
            }
        } else {
            $errors = $validator->getErrors();
            return View::render('user/create', ['errors' => $errors, 'user' => $data]);
        }
    }

    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $user = new User;
            if ($selectId = $user->selectId($data['id'])) {
                return View::render('user/show', ['user' => $selectId]);
            } else {
                return View::render('error', ['msg' => 'Utilisateur introuvable.']);
            }
        }
        return View::render('error', ['msg' => 'Veuillez vous inscrire avant']);
    }

    public function edit($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $user = new User;
            if ($selectId = $user->selectId($data['id'])) {
                return View::render('user/edit', ['user' => $selectId]);
            } else {
                return View::render('error', ['msg' => 'L\'utilisateur n\'est pas trouvé.']);
            }
        }
        return View::render('error', ['msg' => 'Veuillez vous inscrire avant']);
    }

    public function update($data = [], $get = [])
    {
        $get = !empty($get) ? $get : $_GET;

        if (isset($get['id']) && $get['id'] != null) {
            $validator = new Validator;
            $validator->field('nom', $data['nom'])->required()->max(50)->nom();
            $validator->field('prenom', $data['prenom'])->required()->max(50)->prenom();
            $validator->field('email', $data['email'])->required()->max(70)->email();
            $validator->field('motDePasse', $data['motDePasse'])->optional()->min(8)->max(15); 
            $validator->field('biographie', $data['biographie'])->max(100)->biographie();

            if ($validator->isSuccess()) {
                $user = new User;

                
                if (!empty($data['motDePasse'])) {
                    $data['mot_de_passe'] = password_hash($data['motDePasse'], PASSWORD_DEFAULT);
                }
                unset($data['motDePasse']); 

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
        $id = $data['id'];
        $user = new User;
        $delete = $user->delete($id);
        if ($delete) {
            return View::redirect('user/create');
        } else {
            return View::render('error', ['msg' => 'Le compte n\'a pas pu être supprimé, veuillez réessayer plus tard.']);
        }
    }
}