<?php

require "app/model/Users.php";
require "app/helpers/Authentication.php";

class AuthController
{
    public function view_login()
    {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $username = $_POST["username"];
            $password = $_POST["password"];

            if (empty($username) || empty($password)) {
                $_SESSION['flash'] = ["message" => "Input tidak boleh ada yang kosong.", "status" => 500];
                header("Location: /auth/login");
                exit;
            }

            $userModel = new User();
            $user = $userModel->whereFirst(["username" => $username]);;
            if (!empty($user['password']) && Authentication::verify($password, $user["password"])) {
                $_SESSION["is_login"] = true;
                $_SESSION["users"] = [
                    "id" => $user["id"],
                    "name" => $user["name"],
                    "username" => $user["username"]
                ];

                session_regenerate_id(true);

                $_SESSION['flash'] = ["message" => "Berhasil Masuk.", "status" => 200];
                header("Location: /dashboard");
                exit;
            } else {
                $_SESSION['flash'] = ["message" => "Username atau Password Salah.", "status" => 500];
                header("Location: /auth/login");
                exit;
            }
        }
        if (isset($_SESSION["is_login"]) && $_SESSION["is_login"] === true) {
            header("Location: /dashboard");
            exit;
        }
        require 'views/login.php';
    }

    public function logout()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            session_unset();
            session_destroy();
            header("Location: /");
            exit;
        } else {
            echo $_SERVER["REQUEST_METHOD"] . " -> THIS PAGE REQUIRED METHOD POST";
        }
    }
}
