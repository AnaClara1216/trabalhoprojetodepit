<?php
// Comanda.php

class Comanda {
    public static function listar() {
        $pdo = conectar();
        $stmt = $pdo->query("SELECT * FROM comandas");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function buscar($id) {
        $pdo = conectar();
        $stmt = $pdo->prepare("SELECT * FROM comandas WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function salvar($data) {
        $pdo = conectar();
        if (isset($data['id'])) {
            $stmt = $pdo->prepare("UPDATE comandas SET campo1 = :campo1 WHERE id = :id");
            $stmt->execute(['campo1' => $data['campo1'], 'id' => $data['id']]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO comandas (campo1) VALUES (:campo1)");
            $stmt->execute(['campo1' => $data['campo1']]);
        }
    }

    public static function excluir($id) {
        $pdo = conectar();
        $stmt = $pdo->prepare("DELETE FROM comandas WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
?>
