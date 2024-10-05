<?php
// RelatorioController.php

class RelatorioController {
    public function gerar() {
        $relatorio = Relatorio::gerar();
        include 'views/Relatorio/gerar.php';
    }

    public function listar() {
        $relatorios = Relatorio::listar();
        include 'views/Relatorio/listar.php';
    }
}
?>
