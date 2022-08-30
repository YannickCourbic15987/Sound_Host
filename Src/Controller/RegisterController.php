<?php

namespace App\Src\Controller;

use App\Src\Model\UsersModel;

class RegisterController extends Controller
{
    public function index()
    {

        if (
            isset($_POST['firstname'])
            && !empty($_POST['firstname'])
            && isset($_POST['lastname'])
            && !empty($_POST['lastname'])
            && isset($_POST['email'])
            && !empty($_POST['email'])
            && isset($_POST['password'])
            && !empty($_POST['password'])
            && isset($_POST['password_confirm'])
            && !empty($_POST['password_confirm'])
        ) {
            $firstname = trim(htmlspecialchars($_POST['firstname']));
            $lastname = trim(htmlspecialchars($_POST['lastname']));
            $email = trim(htmlspecialchars($_POST['email']));
            $password = trim(htmlspecialchars($_POST['password']));
            $password_confirm = trim(htmlspecialchars($_POST['password_confirm']));

            if ($password === $password_confirm) {

                if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
                    $values = [];
                    $user = new UsersModel();
                    $users = $user->findAll();
                    foreach ($users as $champ => $value) {
                        $values[] = $value->email;
                    }
                    if (in_array($email, $values)) {
                    } else {
                        // echo "ok";
                        if (preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $password)) {
                            $user->setFirstname($firstname)
                                ->setLastname($lastname)
                                ->setEmail($email)
                                ->setPassword(password_hash($password, PASSWORD_ARGON2I));
                            $user->setRole('user');
                            $user->create();


                            $_SESSION['success'] = "Vous vous êtes inscrit avec succès.";

                            header('Location:' . HEADER . "register");
                        }
                    }
                }
            }
        }

        $this->render("User/register", []);
    }
}
