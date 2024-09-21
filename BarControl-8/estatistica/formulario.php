<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Menu do Restaurante</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&display=swap');
        body {
            margin: 0;
            font-family: "Merienda", cursive;
            background-color: #f0f0f0;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .menu {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .container {
            text-align: center;
        }
        .categoria-btn {
            display: inline-block;
            width: 150px;
            height: 50px;
            margin: 10px;
            padding: 5px;
            font-size: 16px;
            text-align: center;
            background-color: #4CAF50; /* Cor de fundo verde */
            color: white; /* Cor do texto branco */
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .categoria-btn:hover {
            background-color: #45a049; /* Cor de fundo verde mais escura no hover */
        }
    </style>
</head>
<body>
    <!-- Navegação -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Restaurante</a>
            <button class="navbar-toggler" type="button" id="navbar-toggler" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="mesas.php">Mesas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="comanda.php">Comanda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cardapio.php">Cardápio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="estatisticas.php">Estatísticas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="menu">
        <div class="container">
            <h2>Escolha uma categoria:</h2>
            <?php
            // Array com as categorias e seus respectivos destinos
            $categorias = array(
                "porções" => "categorias/porcoes.php",
                "hamburgues" => "categorias/hamburgues.php",
                // "lanches" => "pagina_lanches.php",
                "bebidas" => "categorias/bebidas.php",
                // "cerveja" => "pagina_cerveja.php",
                "sobremesas" => "categorias/sobremesas.php",
            );

            // Contador para controlar o número de botões por linha
            $contador = 0;

            // Percorre o array de categorias
            foreach ($categorias as $categoria => $destino) {
                // Imprime o botão da categoria
                echo '<button class="categoria-btn" onclick="selecionarCategoria(\'' . $destino . '\')">' . ucfirst($categoria) . '</button>';

                // Incrementa o contador
                $contador++;

                // Se o contador for divisível por 2 (final da linha), imprime uma quebra de linha
                if ($contador % 2 == 0) {
                    echo '<br>';
                }
            }
            ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggler = document.getElementById('navbar-toggler');
            const collapse = document.getElementById('navbarNav');

            toggler.addEventListener('click', function() {
                if (collapse.classList.contains('show')) {
                    collapse.classList.remove('show');
                    collapse.classList.add('collapse');
                } else {
                    collapse.classList.remove('collapse');
                    collapse.classList.add('show');
                }
            });
        });

        // Função JavaScript para redirecionar para outra página
        function selecionarCategoria(destino) {
            // Redireciona para o destino específico da categoria
            window.location.href = destino;
        }
    </script>
</body>
</html>

