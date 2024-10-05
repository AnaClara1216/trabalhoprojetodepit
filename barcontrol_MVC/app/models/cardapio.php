<?php
// Cardapio.php

class Cardapio {
    public static function listar() {
        $pdo = conectar();
        $stmt = $pdo->query("SELECT * FROM cardapio");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function buscar($id) {
        $pdo = conectar();
        $stmt = $pdo->prepare("SELECT * FROM cardapio WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function salvar($data) {
        $pdo = conectar();
        if (isset($data['id'])) {
            $stmt = $pdo->prepare("UPDATE cardapio SET nome = :nome, preco = :preco WHERE id = :id");
            $stmt->execute(['nome' => $data['nome'], 'preco' => $data['preco'], 'id' => $data['id']]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO cardapio (nome, preco) VALUES (:nome, :preco)");
            $stmt->execute(['nome' => $data['nome'], 'preco' => $data['preco']]);
        }
    }

    public static function excluir($id) {
        $pdo = conectar();
        $stmt = $pdo->prepare("DELETE FROM cardapio WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
?>
