<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Privilege;
use App\Providers\View;
use App\Providers\Validator;

class UserController {
    public function create() {
        $privilege = new Privilege;
        $selectPrivilege = $privilege->select();
        return View::render('user/create', ['privileges' => $selectPrivilege]);
    }

    public function store($data = []) {
        $validator = new Validator;

        // Corrección de las validaciones
        $validator->field('name', $data['name'])->required()->min(2)->max(50);
        $validator->field('username', $data['username'])->required()->unique('User ')->email()->min(2)->max(50);
        $validator->field('password', $data['password'])->required()->min(6)->max(20);
        $validator->field('email', $data['email'])->required()->email()->max(100);

        // Validación manual para privilege_id
        if (!isset($data['privilege_id']) || !is_numeric($data['privilege_id'])) {
            $errors['privilege_id'] = "Le champ privilège doit être un entier.";
        }

        if ($validator->isSuccess() && empty($errors)) {
            $user = new User;
            $data['password'] = $user->hashPassword($data['password']);
            $insert = $user->insert($data);
            if ($insert) {
                return View::redirect('login');
            } else {
                return View::render('error', ['msg' => 'Error al registrar el usuario.']);
            }
        } else {
            $errors = array_merge($errors, $validator->getErrors());
            $privilege = new Privilege;
            $privileges = $privilege->select();
            return View::render('user/create', ['errors' => $errors, 'user' => $data, 'privileges' => $privileges]);
        }
    }
}