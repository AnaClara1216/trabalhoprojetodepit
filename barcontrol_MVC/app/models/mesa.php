<?php
// Mesa.php

class Mesa {
    public static function listar() {
        $pdo = conectar();
        $stmt = $pdo->query("SELECT * FROM mesas");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function buscar($id) {
        $pdo = conectar();
        $stmt = $pdo->prepare("SELECT * FROM mesas WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function salvar($data) {
        $pdo = conectar();
        if (isset($data['id'])) {
            $stmt = $pdo->prepare("UPDATE mesas SET numero = :numero WHERE id = :id");
            $stmt->execute(['numero' => $data['numero'], 'id' => $data['id']]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO mesas (numero) VALUES (:numero)");
            $stmt->execute(['numero' => $data['numero']]);
        }
    }

    public static function excluir($id) {
        $pdo = conectar();
        $stmt = $pdo->prepare("DELETE FROM mesas WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
?>
