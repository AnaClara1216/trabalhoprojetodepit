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
        "Hambúrgueres" => array(
            array(
                "nome" => "Red Hot Chili Peppers",
                "descricao" => "160g Hambúrguer de Costela,Pão Vermelho,Queijo,Bacon e Molho Chili(Levemente Apimentado)",
                "preco" => 34.00,
                "imagem" => "../imagens/red_hot.jpeg"
            ),
            array(
                "nome" => "Rush",
                "descricao" => "160g Hambúrguer de Costela artesanal,Pão de Brioche,Queijo,Cebola Caramelizada e Maionese especial – (Acompanha Fritas)",
                "preco" => 32.00,
                "imagem" => "../imagens/rush.jpg"
            ),
            array(
                "nome" => "Ramones",
                "descricao" => "160g Carne de Costela artesanal,Pão Australiano,Onion Rings,Queijo,Bacon e Barbecue",
                "preco" => 34.00,
                "imagem" => "../imagens/ramones.jpg"
            ),
            array(
                "nome" => "Rolling Stones",
                "descricao" => "160g Carne de Costela Artesanal,Pão Australiano,Bacon,Queijo,Cebola Caramelizada e Cheddar",
                "preco" => 36.90,
                "imagem" => "../imagens/rolling.webp"
            ),
            array(
                "nome" => "Linkin Park",
                "descricao" => "160g Hambúrguer de Costela artesanal,Pão Australiano,Queijo,Tomate Seco e Creme de Gorgonzola",
                "preco" => 37.90,
                "imagem" => "../imagens/linkin_park.jpg"
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

