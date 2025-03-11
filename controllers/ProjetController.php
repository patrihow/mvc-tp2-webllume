<?php
namespace App\Controllers;

use App\Models\Projet;
use App\Models\User;
use App\Providers\Validator;
use App\Providers\View;

class ProjetController
{
    public function index()
    {
        $projets = $this->getAllProjets();
        $user    = new User;

        foreach ($projets as $key => $oneProjet) {
            $prenomUser                    = $user->selectId($oneProjet['user_id']);
            $projets[$key]['prenomUser  '] = $prenomUser['prenom'];
        }

        return View::render('projet/index', ['projets' => $projets]);
    }

    private function getAllProjets()
    {
        $projetModel = new Projet();
        $sql         = "SELECT p.*, c.nom_categorie
                FROM projet p
                JOIN categorie c ON p.categorie_id = c.id";
        return $projetModel->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create()
    {
        $get = ! empty($_GET) ? $_GET : [];

        if (isset($get['id']) && $get['id'] != null) {
            $user = new User;
            if ($selectId = $user->selectId($get['id'])) {
                return View::render('projet/create', ['user' => $selectId]);
            } else {
                return View::render('error', ['msg' => 'Utilisateur introuvable']);
            }
        } else {
            return View::render('error', ['msg' => 'Veuillez vous inscrire avant d\'accéder.']);
        }
    }

    public function store($data = [])
    {
        $validator = new Validator;

        $validator->field('titre', $data['titre'])->required()->max(150);
        $validator->field('description', $data['description'])->required();
        $validator->field('annee_creation', $data['annee_creation'])->required()->number();
        $validator->field('lien_site', $data['lien_site'])->required()->max(255); // Cambiado a texto

        $get      = ! empty($_GET) ? $_GET : [];
        $user     = new User;
        $selectId = $user->selectId($get['id']);

        if ($validator->isSuccess()) {
            $data['user_id']      = $get['id'];
            $data['categorie_id'] = $data['categorie_id'];

            $projet     = new Projet;
            $insertData = $projet->insert($data);
            if ($insertData) {
                return View::redirect('user/show?id=' . $get['id']);
            } else {
                return View::render('error', ['msg' => 'Envoi du projet échoué']);
            }
        } else {
            $errors = $validator->getErrors();
            return View::render('projet/create', ['errors' => $errors, 'projet' => $data, 'user' => $selectId]);
        }
    }

    public function show()
    {
        $get = ! empty($_GET) ? $_GET : [];

        if (isset($get['id']) && $get['id'] != null) {
            $projet = new Projet;
            $user   = new User;
            if ($selectId = $user->selectId($get['id'])) {
                $projets = $projet->selectAllById($get['id'], 'user_id', 'id', 'DESC');
                return View::render('projet/show', ['user' => $selectId, 'projets' => $projets]);
            } else {
                return View::render('error', ['msg' => 'Utilisateur non trouvé']);
            }
        } else {
            return View::render('error', ['msg' => 'Veuillez vous inscrire avant d\'accéder.']);
        }
    }

    public function edit($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $projet = new Projet;
            if ($selectProjet = $projet->selectId($data['id'])) {
                $user       = new User;
                $selectUser = $user->selectId($selectProjet['user_id']);
                return View::render('projet/edit', ['projet' => $selectProjet, 'user' => $selectUser]);
            } else {
                return View::render('error', ['msg' => 'Projet non trouvé.']);
            }
        }
        return View::render('error', ['msg' => 'Veuillez vous inscrire avant d\'accéder.']);
    }

    public function update($data = [], $get = [])
    {
        $get = ! empty($get) ? $get : [];

        if (isset($get['id']) && $get['id'] != null) {
            $validator = new Validator;
            $validator->field('titre', $data['titre'])->required()->max(150);
            $validator->field('description', $data['description'])->required();
            $validator->field('annee_creation', $data['annee_creation'])->required()->number();
            $validator->field('lien_site', $data['lien_site'])->required()->max(255); // Cambiado a texto

            $user       = new User;
            $selectUser = $user->selectId($data['user_id']);

            if ($validator->isSuccess()) {
                $projet = new Projet;
                $update = $projet->update($data, $get['id']);
                if ($update) {
                    return View::redirect('projet/show?id=' . $data['user_id']);
                } else {
                    return View::render('error', ['msg' => 'Désolé, les modifications n\'ont pas pu être appliquées.']);
                }
            } else {
                $errors = $validator->getErrors();
                return View::render('projet/edit', ['errors' => $errors, 'projet' => $data, 'user' => $selectUser]);
            }
        }
    }

    public function delete($data = [])
    {
        $projet     = new Projet;
        $delete     = $projet->delete($data['id']);
        $user       = new User;
        $selectUser = $user->selectId($data['user_id']);
        if ($delete) {
            return View::redirect('projet/show?id=' . $data['user_id'], ['user' => $selectUser]);
        } else {
            return View::render('error', ['msg' => 'Le projet n\'a pas pu être supprimé.']);
        }
    }
}
