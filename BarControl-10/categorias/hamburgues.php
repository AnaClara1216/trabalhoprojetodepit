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
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
        }
        .cardapio-item .item-img {
            margin-right: 10px;
            border-radius: 5px;
        }
        .cardapio-item .item-img img {
            width: 100px; /* Tamanho da imagem pequena */
            height: auto;
            border-radius: 5px;
        }
        .cardapio-item .item-details {
            flex: 1;
        }
        .cardapio-item h3 {
            margin-top: 0;
        }
        .cardapio-item p {
            margin-bottom: 0;
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
        .botao-adicionar {
            background-color: #007bff; /* Azul */
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 10px;
            font-size: 14px;
        }
        .btncomanda{
            background-color: #4CAF50; /* Verde */
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 10px;
            font-size: 14px;
            text-decoration:none;
        }
        .descricao {
            display: none;
            margin-top: 10px;
        }
        .carousel {
            position: relative;
            width: 100%;
            max-width: 500px; /* Largura máxima do carrossel */
            margin-top: 10px;
            overflow: hidden;
            border: 1px solid #ddd;
            border-radius: 10px;
        }
        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease;
        }
        .carousel-item {
            min-width: 100%;
            box-sizing: border-box;
        }
        .carousel-item img {
            width: 100%;
            height: auto;
        }
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            color: white;
            background-color: rgba(0,0,0,0.5);
            border: none;
            user-select: none;
            transform: translateY(-50%);
        }
        .prev {
            left: 0;
        }
        .next {
            right: 0;
        }
    </style>
    <script>
        function toggleDescricao(id) {
            var descricao = document.getElementById('descricao-' + id);
            descricao.style.display = (descricao.style.display === 'none' || descricao.style.display === '') ? 'block' : 'none';
        }

        function createCarousel(carouselId) {
            let currentIndex = 0;
            const carousel = document.getElementById(carouselId);
            const slides = carousel.querySelectorAll('.carousel-item');
            const totalSlides = slides.length;

            function showSlide(index) {
                if (index >= totalSlides) {
                    currentIndex = totalSlides - 1; // Trava no último slide
                } else if (index < 0) {
                    currentIndex = 0; // Retorna ao primeiro slide
                } else {
                    currentIndex = index;
                }

                carousel.querySelector('.carousel-inner').style.transform = `translateX(-${currentIndex * 100}%)`;
            }

            function nextSlide() {
                if (currentIndex < totalSlides - 1) {
                    showSlide(currentIndex + 1);
                }
            }

            function prevSlide() {
                if (currentIndex > 0) {
                    showSlide(currentIndex - 1);
                }
            }

            carousel.querySelector('.prev').addEventListener('click', prevSlide);
            carousel.querySelector('.next').addEventListener('click', nextSlide);

            showSlide(currentIndex);
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.carousel').forEach((carousel, index) => {
                createCarousel(carousel.id);
            });
        });
    </script>

    <script>
        <script>
        const produtosSelecionados = JSON.parse(localStorage.getItem('produtosSelecionados')) || [];
        function adicionarPedido(nome, valor) {
            // Verifica se o produto já está na lista
            const produtoExistente = produtosSelecionados.find(produto => produto.nome === nome);
            if (!produtoExistente) {
                produtosSelecionados.push({ nome, valor });
                localStorage.setItem('produtosSelecionados', JSON.stringify(produtosSelecionados));
                alert(`${nome} adicionado ao pedido!`);
            } else {
                alert(`${nome} já foi adicionado ao pedido.`);
            }
        }
    </script>
    </script>
</head>
<body>
    <h1>Cardápio do Restaurante</h1>

    <?php
    
    $cardapio = array(
        "Hambúrgueres" => array(
            array(
                "nome" => "Red Hot Chili Peppers",
                "descricao" => "160g Hambúrguer de Costela,Pão Vermelho,Queijo,Bacon e Molho Chili(Levemente Apimentado)",
                "preco" => 34.00,
                "imagens" => array("../imagens/red_hot.jpeg", "../imagens/red_hot2.jpeg")
            ),
            array(
                "nome" => "Rush",
                "descricao" => "160g Hambúrguer de Costela artesanal,Pão de Brioche,Queijo,Cebola Caramelizada e Maionese especial – (Acompanha Fritas)",
                "preco" => 32.00,
                "imagens" => array("../imagens/rush.jpg", "../imagens/rush2.jpg")
            ),
            array(
                "nome" => "Ramones",
                "descricao" => "160g Carne de Costela artesanal,Pão Australiano,Onion Rings,Queijo,Bacon e Barbecue",
                "preco" => 34.00,
                "imagens" => array("../imagens/ramones1.jpg", "../imagens/ramones2.jpg")
            ),
            array(
                "nome" => "Rolling Stones",
                "descricao" => "160g Carne de Costela Artesanal,Pão Australiano,Bacon,Queijo,Cebola Caramelizada e Cheddar",
                "preco" => 36.90,
                "imagens" => array("../imagens/rolling.webp", "../imagens/rolling2.webp")
            ),
            array(
                "nome" => "Linkin Park",
                "descricao" => "160g Hambúrguer de Costela artesanal,Pão Australiano,Queijo,Tomate Seco e Creme de Gorgonzola",
                "preco" => 37.90,
                "imagens" => array("../imagens/linkin_park1.jpg", "../imagens/linkin_park2.jpg")
            )
        ),
    );

    // ID para controle dos botões de descrição e carrossel
    $id_descricao = 1;

    // Loop pelas categorias do cardápio
    foreach ($cardapio as $categoria => $itens) {
        echo '<div class="cardapio-categoria">';
        echo '<h2>' . $categoria . '</h2>';
        
        // Loop pelos itens da categoria
        foreach ($itens as $index => $item) {
            $carouselId = 'carousel-' . $id_descricao; // ID único para cada carrossel
            
            echo '<div class="cardapio-item">';
            // Exibe a imagem pequena no lado esquerdo
            echo '<div class="item-img">';
            
            echo '</div>';
            // Exibe o carrossel para imagens grandes
            if (isset($item['imagens']) && count($item['imagens']) > 0) {
                echo '<div class="item-details">';
                echo '<div class="carousel" id="' . $carouselId . '">';
                echo '<div class="carousel-inner">';
                foreach ($item['imagens'] as $imagem) {
                    echo '<div class="carousel-item">';
                    echo '<img src="' . $imagem . '" alt="' . $item['nome'] . '">';
                    echo '</div>';
                }
                echo '</div>';
                echo '<a class="prev" onclick="prevSlide()">❮</a>';
                echo '<a class="next" onclick="nextSlide()">❯</a>';
                echo '</div>';
                echo '<h3>' . $item['nome'] . '</h3>';
                echo '<p><strong>Preço: R$ ' . number_format($item['preco'], 2, ',', '.') . '</strong></p>';
                echo '<button class="botao-descricao" onclick="toggleDescricao(' . $id_descricao . ')">Ver Descrição</button>';
                echo '<div class="descricao" id="descricao-' . $id_descricao . '">' . $item['descricao'] . '</div>';
                echo '<button class="botao-adicionar" onclick="adicionarPedido(\'' . $item['nome'] . '\', ' . $item['preco'] . ')">Adicionar ao Pedido</button>';
                echo '</div>';
            } else {
                echo '<div class="item-details">';
                echo '<h3>' . $item['nome'] . '</h3>';
                echo '<p><strong>Preço: R$ ' . number_format($item['preco'], 2, ',', '.') . '</strong></p>';
                echo '<button class="botao-descricao" onclick="toggleDescricao(' . $id_descricao . ')">Ver Descrição</button>';
                echo '<div class="descricao" id="descricao-' . $id_descricao . '">' . $item['descricao'] . '</div>';
                echo '<button class="botao-adicionar" onclick="adicionarPedido(\'' . $item['nome'] . '\', ' . $item['preco'] . ')">Adicionar ao Pedido</button>';
                echo '</div>';
            }
            echo '</div>';
            $id_descricao++;
        }
        
        echo '</div>';
    }
    ?>
    <a href="../comanda.php" class="btncomanda ">Ver Comanda</a>
</body>
</html>