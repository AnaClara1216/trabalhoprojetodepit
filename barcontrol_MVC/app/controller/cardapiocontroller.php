<?php
// CardapioController.php

class CardapioController {
    public function listar() {
        $itens = Cardapio::listar();
        include 'views/Cardapio/listar.php';
    }

    public function editar($id) {
        $item = Cardapio::buscar($id);
        include 'views/Cardapio/editar.php';
    }

    public function salvar() {
        Cardapio::salvar($_POST);
        header('Location: index.php?url=cardapio/listar');
    }

    public function excluir($id) {
        Cardapio::excluir($id);
        header('Location: index.php?url=cardapio/listar');
    }
}
?>
