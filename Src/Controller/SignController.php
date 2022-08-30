<?php

namespace App\Src\Controller;

use App\Src\Model\UsersModel;

class SignController extends Controller
{
    public function index()
    {
        if (
            isset($_POST['email'])
            && !empty($_POST['email'])
            && isset($_POST['password'])
            && !empty($_POST['password'])
        ) {
            $email = trim(htmlspecialchars($_POST['email']));
            $password = trim(htmlspecialchars($_POST['password']));
            if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
                $user = new UsersModel();
                $user->setEmail($email);
                $users = $user->findByEmail();
                if (password_verify($password, $users->password)) {
                    $_SESSION['connexion'] = 'vous êtes connecté avec succès';
                    $_SESSION['email'] = $user->getEmail();

                    // $_SESSION['id'] = $user->getId();

                    header('Location:' . HEADER . 'profil');
                }
            }
        }
        $this->render("User/signIn", []);
    }
}
