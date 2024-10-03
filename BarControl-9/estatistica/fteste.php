<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cardápio</title>
    <style>
        body {
            background-color: #f4f4f4;
            padding: 20px;
        }
        .cardapio-categoria {
            margin-bottom: 20px;
        }
        .cardapio-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
        }
        .item-img {
            margin-right: 10px;
        }
        .item-img img {
            width: 100px; /* Tamanho da imagem pequena */
            height: auto;
            border-radius: 5px;
        }
        .item-details {
            flex: 1;
        }
        .botao-descricao {
            background-color: #4CAF50; /* Verde */
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 4px;
        }
        .botao-adicionar {
            background-color: #007bff; /* Azul */
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 10px;
        }
        .descricao {
            display: none;
            margin-top: 10px;
        }
        .carousel {
            width: 100%;
            max-width: 300px; /* Largura máxima do carrossel */
            margin-top: 10px;
        }
        .carousel-item img {
            width: 100%;
            height: auto;
        }

        .carousel-control-prev, .carousel-control-next{
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: 30px;
            height: 50px;
            
            background-color: rgba(0,0,0,0.5);
            border: none;
            user-select: none;
            transform: translateY(-50%); 
        }
    </style>
    <script>
        const produtosSelecionados = [];

        function toggleDescricao(id) {
            const descricao = document.getElementById('descricao-' + id);
            descricao.style.display = (descricao.style.display === 'none' || descricao.style.display === '') ? 'block' : 'none';
        }

        function adicionarPedido(nome, valor) {
            produtosSelecionados.push({ nome, valor });
            localStorage.setItem('produtosSelecionados', JSON.stringify(produtosSelecionados));
            alert(`${nome} adicionado ao pedido!`);
        }
    </script>
</head>
<body>
    <h1>Cardápio do Restaurante</h1>

    <?php
    // Exemplo de dados do cardápio por categorias
    $cardapio = array(
        "Bebidas" => array(
            array(
                "nome" => "Refrigerante Lata",
                "descricao" => "Lata de refrigerante (350ml). Escolha entre Coca-Cola, Guaraná, Fanta ou Sprite.",
                "preco" => 9.50,
                "imagens" => array("../imagens/refri3.jpg", "../imagens/refri.jpg")
            ),
            array(
                "nome" => "Refrigerante Garrafa",
                "descricao" => "Escolha entre Coca-Cola, Guaraná, Fanta ou Sprite.",
                "preco" => 12.00,
                "imagens" => array("../imagens/refri_garrafa.webp", "../imagens/refri_garrafa2.webp")
            ),
            array(
                "nome" => "Suco Lata",
                "descricao" => "Suco Del Vale de maracujá, manga, uva, pêssego e goiaba.",
                "preco" => 9.00,
                "imagens" => array("../imagens/suco.webp", "../imagens/suco2.webp")
            ),
            array(
                "nome" => "Suco Natural",
                "descricao" => "Suco natural de laranja, limão, abacaxi, acerola e maracujá (300ml).",
                "preco" => 14.00,
                "imagens" => array("../imagens/suco_natural2.jpg", "../imagens/suco_natural.jpg") 
            ),
            array(
                "nome" => "Água",
                "descricao" => "Sem gás e Com gás",
                "preco" => 7.00,
                "imagens" => array("../imagens/agua.webp", "../imagens/agua2.webp")
            ),
            array(
                "nome" => "H2O",
                "descricao" => "Garrafa de (500ml)",
                "preco" => 12.50,
                "imagens" => array("../imagens/h2o.jpg", "../imagens/h2o2.jpg")
            ),
            array(
                "nome" => "Energético Red Bull",
                "descricao" => "Escolha entre tropical, melancia, pitaya, cereja e frutas silvestres, morango e pêsego.",
                "preco" => 17.90,
                "imagens" => array("../imagens/redbull.webp", "../imagens/redbull2.webp") 
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
            echo '<div class="item-img">';

            // Exibe o carrossel para imagens
            if (isset($item['imagens']) && count($item['imagens']) > 0) {
                echo '<div id="carousel-' . $id_descricao . '" class="carousel slide" data-ride="carousel">';
                echo '<div class="carousel-inner">';
                foreach ($item['imagens'] as $index => $imagem) {
                    $activeClass = ($index === 0) ? 'active' : ''; // Define a primeira imagem como ativa
                    echo '<div class="carousel-item ' . $activeClass . '">';
                    echo '<img src="' . $imagem . '" alt="' . $item['nome'] . '">';
                    echo '</div>';
                }
                echo '</div>';
                echo '<button class="carousel-control-prev" type="button" data-bs-target="#carousel-' . $id_descricao . '" data-bs-slide="prev">';
                echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
                echo '<span class="visually-hidden">Previous</span>';
                echo '</button>';
                echo '<button class="carousel-control-next" type="button" data-bs-target="#carousel-' . $id_descricao . '" data-bs-slide="next">';
                echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
                echo '<span class="visually-hidden">Next</span>';
                echo '</button>';
                echo '</div>'; // Fecha o carrossel
            }

            echo '</div>'; // Fecha a div do item-img
            echo '<div class="item-details">';
            echo '<h3>' . $item['nome'] . '</h3>';
            echo '<p><strong>Preço: R$ ' . number_format($item['preco'], 2, ',', '.') . '</strong></p>';
            echo '<button class="botao-descricao" onclick="toggleDescricao(' . $id_descricao . ')">Ver Descrição</button>';
            echo '<div class="descricao" id="descricao-' . $id_descricao . '">' . $item['descricao'] . '</div>';
            echo '<br>';
            echo '<button class="botao-adicionar" onclick="adicionarPedido(\'' . $item['nome'] . '\', ' . $item['preco'] . ')">Adicionar ao Pedido</button>';
            echo '</div>'; // Fecha a div do item-details
            echo '</div>'; // Fecha a div do cardapio-item
            $id_descricao++;
        }
        
        echo '</div>'; // Fecha a div da cardapio-categoria
    }
    ?>

    <a href="formulario.php" class="btn btn-success mt-4">Ver Comanda</a>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
