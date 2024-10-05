<?php
// database.php

function conectar() {
    $dsn = 'mysql:host=localhost;dbname=seu_banco_de_dados;charset=utf8';
    $usuario = 'seu_usuario';
    $senha = 'sua_senha';

    try {
        $pdo = new PDO($dsn, $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Erro de conexão: " . $e->getMessage());
    }
}
?>
