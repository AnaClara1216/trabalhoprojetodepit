<?php
// ComandaController.php

class ComandaController {
    public function listar() {
        $comandas = Comanda::listar();
        include 'views/Comanda/listar.php';
    }

    public function editar($id) {
        $comanda = Comanda::buscar($id);
        include 'views/Comanda/editar.php';
    }

    public function salvar() {
        Comanda::salvar($_POST);
        header('Location: index.php?url=comanda/listar');
    }

    public function excluir($id) {
        Comanda::excluir($id);
        header('Location: index.php?url=comanda/listar');
    }
}
?>
