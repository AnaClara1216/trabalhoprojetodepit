<?php
// ClienteController.php

class ClienteController {
    public function listar() {
        $clientes = Cliente::listar();
        include 'views/Cliente/listar.php';
    }

    public function editar($id) {
        $cliente = Cliente::buscar($id);
        include 'views/Cliente/editar.php';
    }

    public function salvar() {
        Cliente::salvar($_POST);
        header('Location: index.php?url=cliente/listar');
    }

    public function excluir($id) {
        Cliente::excluir($id);
        header('Location: index.php?url=cliente/listar');
    }
}
?>
