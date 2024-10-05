<?php
// Cliente.php

class Cliente {
    public static function listar() {
        $pdo = conectar();
        $stmt = $pdo->query("SELECT * FROM clientes");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function buscar($id) {
        $pdo = conectar();
        $stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function salvar($data) {
        $pdo = conectar();
        if (isset($data['id'])) {
            $stmt = $pdo->prepare("UPDATE clientes SET nome = :nome WHERE id = :id");
            $stmt->execute(['nome' => $data['nome'], 'id' => $data['id']]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO clientes (nome) VALUES (:nome)");
            $stmt->execute(['nome' => $data['nome']]);
        }
    }

    public static function excluir($id) {
        $pdo = conectar();
        $stmt = $pdo->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
?>
