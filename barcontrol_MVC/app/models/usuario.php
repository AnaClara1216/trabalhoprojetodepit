<?php
// Usuario.php

class Usuario {
    public static function listar() {
        $pdo = conectar();
        $stmt = $pdo->query("SELECT * FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function buscar($id) {
        $pdo = conectar();
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function salvar($data) {
        $pdo = conectar();
        if (isset($data['id'])) {
            $stmt = $pdo->prepare("UPDATE usuarios SET nome = :nome, usuario = :usuario WHERE id = :id");
            $stmt->execute(['nome' => $data['nome'], 'usuario' => $data['usuario'], 'id' => $data['id']]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO usuarios (nome, usuario, senha) VALUES (:nome, :usuario, :senha)");
            $stmt->execute(['nome' => $data['nome'], 'usuario' => $data['usuario'], 'senha' => md5($data['senha'])]);
        }
    }

    public static function excluir($id) {
        $pdo = conectar();
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
?>
