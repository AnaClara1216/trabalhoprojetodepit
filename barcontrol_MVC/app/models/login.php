<?php
// Login.php

class Login {
    public static function autenticar($usuario, $senha) {
        $pdo = conectar();
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha");
        $stmt->execute(['usuario' => $usuario, 'senha' => md5($senha)]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function logout() {
        // Implementar a lógica de logout
        session_destroy();
    }
}
?>
