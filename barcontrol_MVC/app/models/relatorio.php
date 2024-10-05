<?php
// Relatorio.php

class Relatorio {
    public static function gerar() {
        // Implementar a lógica para gerar relatórios
        return "Relatório gerado com sucesso!";
    }

    public static function listar() {
        $pdo = conectar();
        $stmt = $pdo->query("SELECT * FROM relatorios");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
?>
