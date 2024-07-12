<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .cardapio-categoria {
            margin-bottom: 20px;
        }
        .cardapio-item {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
        }
        .cardapio-item h3 {
            margin-top: 0;
        }
        .cardapio-item p {
            margin-bottom: 0;
        }
        .cardapio-item img {
            float: left;
            margin-right: 10px;
            border-radius: 5px;
        }
        .botao-descricao {
            background-color: #4CAF50; /* Verde */
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 4px;
        }
        .descricao {
            display: none;
            margin-top: 10px;
        }
    </style>
    <script>
        function toggleDescricao(id) {
            var descricao = document.getElementById('descricao-' + id);
            if (descricao.style.display === 'none') {
                descricao.style.display = 'block';
            } else {
                descricao.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <h1>Cardápio do Restaurante</h1>

    <?php
    // Exemplo de dados do cardápio por categorias
    $cardapio = array(
        "Sobremesas" => array(
            array(
                "nome" => "Petit Gâteau",
                "descricao" => "Uma sobremesa composta de um pequeno bolo de chocolate com casca e recheio cremoso servido geralmente acompanhado de sorvete.",
                "preco" => 17.00,
                "imagem" => "../imagens/petit_gateau.webp"
            ),
            array(
                "nome" => "Brownie Bavária",
                "descricao" => "Brownie de chocolate com creme Bavária e um sorvete de creme e por cima castanhas.",
                "preco" => 18.00,
                "imagem" => "../imagens/brownie.jpg"
            ),
            array(
                "nome" => "Sorvete de Creme com Calda de Chocolate",
                "descricao" => "Vem em uma taça o sorvete de creme com calda de chocolate por cima.",
                "preco" => 16.00,
                "imagem" => "../imagens/sorvete.jpg"
            ),
            array(
                "nome" => "Torta de Sorvete com Calda de Chocolate (500g)",
                "descricao" => "Um pedaço de torta de sorvete com calda de chocolate por cima. ",
                "preco" => 17.00,
                "imagem" => "../imagens/torta.jpeg"
            ),
            array(
                "nome" => "Creme Brûlée",
                "descricao" => "Ele é delicioso porque é leve, tem um toque de baunilha e fica com uma tentadora casquinha crocante por cima.",
                "preco" => 16.00,
                "imagem" => "../imagens/creme_brulee.avif"
            )
        ),
        
    );
    

    // ID para controle dos botões de descrição
    $id_descricao = 1;

    // Loop pelas categorias do cardápio
    foreach ($cardapio as $categoria => $itens) {
        echo '<div class="cardapio-categoria">';
        echo '<h2>' . $categoria . '</h2>';
        
        // Loop pelos itens da categoria
        foreach ($itens as $item) {
            echo '<div class="cardapio-item">';
            echo '<img src="' . $item['imagem'] . '" alt="' . $item['nome'] . '" width="100" height="100">';
            echo '<h3>' . $item['nome'] . '</h3>';
            echo '<p><strong>Preço: R$ ' . number_format($item['preco'], 2, ',', '.') . '</strong></p>';
            echo '<button class="botao-descricao" onclick="toggleDescricao(' . $id_descricao . ')">Ver Descrição</button>';
            echo '<div class="descricao" id="descricao-' . $id_descricao . '">' . $item['descricao'] . '</div>';
            echo '</div>';
            $id_descricao++;
        }
        
        echo '</div>';
    }
    ?>
    


</body>
</html>
