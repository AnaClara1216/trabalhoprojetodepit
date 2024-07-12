<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu do Restaurante</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
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
    <div class="menu">
    <div class="container">
        <h2>Escolha uma categoria:</h2>

        <?php
        // Array com as categorias e seus respectivos destinos
        $categorias = array(
            "porcoes" => "categorias/porcoes.php",
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

            // Se o contador for divisível por 4 (final da linha), imprime uma quebra de linha
            if ($contador % 2 == 0) {
                echo '<br>';
            }
        }
        ?>
    </div>

    <script>
        // Função JavaScript para redirecionar para outra página
        function selecionarCategoria(destino) {
            // Redireciona para o destino específico da categoria
            window.location.href = destino;
        }
    </script>
    </div>
</body>
</html>
