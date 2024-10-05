<?php
// index.php

require 'config/database.php';
require 'controllers/ComandaController.php';
require 'controllers/CardapioController.php';
require 'controllers/RelatorioController.php';
require 'controllers/LoginController.php';
require 'controllers/UsuarioController.php';
require 'controllers/MesaController.php';
require 'controllers/ClienteController.php';
require 'models/Comanda.php';
require 'models/Cardapio.php';
require 'models/Relatorio.php';
require 'models/Login.php';
require 'models/Usuario.php';
require 'models/Mesa.php';
require 'models/Cliente.php';

// Roteamento
$url = isset($_GET['url']) ? $_GET['url'] : 'home';
list($controller, $action) = explode('/', $url);

switch ($controller) {
    case 'comanda':
        $comandaController = new ComandaController();
        $comandaController->$action();
        break;
    case 'cardapio':
        $cardapioController = new CardapioController();
        $cardapioController->$action();
        break;
    case 'relatorio':
        $relatorioController = new RelatorioController();
        $relatorioController->$action();
        break;
    case 'login':
        $loginController = new LoginController();
        $loginController->$action();
        break;
    case 'usuario':
        $usuarioController = new UsuarioController();
        $usuarioController->$action();
        break;
    case 'mesa':
        $mesaController = new MesaController();
        $mesaController->$action();
        break;
    case 'cliente':
        $clienteController = new ClienteController();
        $clienteController->$action();
        break;
    default:
        // Página inicial ou erro
        break;
}
?>
