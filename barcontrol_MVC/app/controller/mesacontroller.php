<?php
// MesaController.php

class MesaController {
    public function listar() {
        $mesas = Mesa::listar();
        include 'views/Mesa/listar.php';
    }

    public function editar($id) {
        $mesa = Mesa::buscar($id);
        include 'views/Mesa/editar.php';
    }

    public function salvar() {
        Mesa::salvar($_POST);
        header('Location: index.php?url=mesa/listar');
    }

    public function excluir($id) {
        Mesa::excluir($id);
        header('Location: index.php?url=mesa/listar');
    }
}
?>
