<?php

namespace App\Controller;

use App\Model\UserModel;

class AuthControler
{

    public function register()
    {

        if (!empty($_POST['last_name']) && !empty($_POST['first_name']) && !empty($_POST['email']) && !empty($_POST['first_name']) && !empty($_POST['pass']) === !empty($_POST['pass_conf'])) {
            $usermodel = new UserModel();



            $lastname = htmlspecialchars(trim($_POST['last_name']));
            $firstname = htmlspecialchars(trim($_POST['first_name']));
            $email = htmlspecialchars(trim($_POST['email']));
            $pass = htmlspecialchars(trim($_POST['pass']));


            if (!$usermodel->userExist($email)) {

                $response = $usermodel->createUser([
                    "last_name" => $lastname,
                    "first_name" => $firstname,
                    "email" => $email,
                    "password" => password_hash($pass, PASSWORD_DEFAULT)
                ]);

                if ($response) {
                    header("location: /super-week/login");
                } else {
                    $error = "erreur lors de l'inscription";
                    require "src/View/register.php";
                };
            } else {
                $error = "Au moins un des champs est vide, ou les mots de passes de correspondent pas";
                require "src/View/register.php";
            }
        }
    }

    public function userConnect()
    {
        $usermodel = new UserModel();
        if (!empty($_POST['email']) && !empty($_POST['pass'])) {

            $email = htmlspecialchars(trim($_POST['email']));
            $pass = htmlspecialchars(trim($_POST['pass']));
            if ($usermodel->userExist($email)) {
                $userInfo = $usermodel->findOne($email);
                if (password_verify($pass, $userInfo["password"])) {

                    $_SESSION['user'] = [
                        'id' => $userInfo['id'],
                        'firstname' => $userInfo['first_name'],
                        'lastname' => $userInfo['last_name'],
                        'email' => $userInfo['email'],
                    ];
                    echo "Successfull connection !";
                }
            }
        } else {
            echo "Error";
        }
    }


    public function logFormDisplay()
    {

        if (!isset($_SESSION['user'])) {
            require "src/View/login.php";
        }
    }

    public function logout()
    {
        session_destroy();
        header("location: /super-week/login");
    }



}
