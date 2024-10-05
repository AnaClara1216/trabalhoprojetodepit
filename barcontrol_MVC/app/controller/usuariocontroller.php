<?php
// UsuarioController.php

class UsuarioController {
    public function listar() {
        $usuarios = Usuario::listar();
        include 'views/Usuario/listar.php';
    }

    public function editar($id) {
        $usuario = Usuario::buscar($id);
        include 'views/Usuario/editar.php';
    }

    public function salvar() {
        Usuario::salvar($_POST);
        header('Location: index.php?url=usuario/listar');
    }

    public function excluir($id) {
        Usuario::excluir($id);
        header('Location: index.php?url=usuario/listar');
    }
}
?>
