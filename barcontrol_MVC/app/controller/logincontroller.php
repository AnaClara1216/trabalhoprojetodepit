<?php
// LoginController.php

class LoginController {
    public function login() {
        if ($_POST) {
            if (Login::autenticar($_POST['usuario'], $_POST['senha'])) {
                header('Location: index.php?url=home');
            } else {
                $erro = 'Usuário ou senha inválidos';
            }
        }
        include 'views/Login/login.php';
    }

    public function logout() {
        Login::logout();
        header('Location: index.php?url=login');
    }
}
?>
