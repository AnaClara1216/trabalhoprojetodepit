<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Gestão do Restaurante</title>
    <style>
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
        .table-section {
            padding: 20px;
        }
        .comanda-section, .menu-section {
            padding: 20px;
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        .table {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 10px;
            padding: 20px;
            width: 200px;
            text-align: center;
            background-color: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .free { border-color: #28a745; background-color: #d5edb9; }
        .occupied { border-color: #dc3545; background-color: #fcc0bf; }
        .reserved { border-color: #ffc107; background-color: #fce8a5; }
        .categoria-btn {
            display: inline-block;
            width: 150px;
            height: 50px;
            margin: 10px;
            padding: 5px;
            font-size: 16px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .categoria-btn:hover {
            background-color: #45a049;
        }
        .container-flex {
            display: flex;
            flex-direction: row;
        }
        .flex-fill {
            flex: 1;
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
        .form-control{
            background-color: #f0f0f0;
        }
        .menu-section {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">BarControl</a>
            <button class="navbar-toggler" type="button" id="navbar-toggler" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Mesas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Comanda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Cardápio</a></li>
                    <li class="nav-item"><a class="nav-link" href="./estatistica/relatorio.php">Estatísticas</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="table-section">
        <h1>Gestão de Mesas</h1>
        <div id="tables" class="d-flex flex-wrap justify-content-center">
            <!-- Mesas serão listadas aqui -->
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tablesContainer = document.getElementById('tables');
                for (let i = 1; i <= 10; i++) {
                    const status = localStorage.getItem(`table-${i}-status`) || 'free';
                    const tableDiv = document.createElement('div');
                    tableDiv.className = `table ${status}`;
                    tableDiv.id = `table-${i}`;
                    tableDiv.innerHTML = `
                        <h2>Mesa ${i}</h2>
                        <div class="status-select">
                            <label for="status-${i}">Status:</label>
                            <select id="status-${i}" onchange="updateTableStatus(${i}, this.value)">
                                <option value="free" ${status === 'free' ? 'selected' : ''}>Livre</option>
                                <option value="occupied" ${status === 'occupied' ? 'selected' : ''}>Ocupada</option>
                                <option value="reserved" ${status === 'reserved' ? 'selected' : ''}>Reservada</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary">Adicionar</button>
                    `;
                    tablesContainer.appendChild(tableDiv);
                }
            });

            function goToOrderPage(tableId) {
            // Atualiza a mesa selecionada na comanda
            localStorage.setItem('selectedTable', tableId);
            document.getElementById('comandaMesa').innerText = `Mesa: ${tableId}`; // Exibe o número da mesa na comanda
            window.location.href = '#comanda'; // Redireciona para a seção da comanda
        }

        function updateTableStatus(tableId, status) {
            const tableDiv = document.getElementById(`table-${tableId}`);
            tableDiv.className = `table ${status}`;
            localStorage.setItem(`table-${tableId}-status`, status);
        }
        </script>
    </div>


    <div class="container-flex">
    <div class="menu-section flex-fill" style="background-color: white; border-radius: 8px; padding: 20px;">
        <h2>Escolha uma categoria:</h2>
        <div class="container">
            <?php
            // Array com as categorias e seus respectivos destinos
            $categorias = array(
                "porções" => "../categorias/porcoes.php",
                "hamburgues" => "categorias/hamburgues.php",
                "bebidas" => "categorias/bebidas.php",
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
    // Função JavaScript para redirecionar para outra página
    function selecionarCategoria(destino) {
        // Redireciona para o destino específico da categoria
        window.location.href = destino;
    }
</script>



    <div class="menu-section flex-fill" >
    <div class="container-flex">
    <div class="comanda-section flex-fill" id="comanda">
    <h2>Comanda da Mesa </h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Mesa</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Observação</th>
                    <th>Valor Unitário</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <!--<?php foreach ($_SESSION['comanda'] as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['']) ?></td>
                        <td><?= $item['produto'] ?></td>
                        <td>R$ <?= number_format($item[''], 2, ',', '.') ?></td>
                        <td>R$ <?= number_format($item[''] * $item[''], 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>-->
            </tbody>
        </table>
            <button type="submit" class="btn btn-dark">Inserir</button>
            <a href="dados.php" class="btn btn-primary">Ver Pedido</a>
            <a href="mesas.php" class="btn btn-dark">Voltar</a>
        </form>
        <div id="mensagem" class="mt-3"></div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const selectedTable = localStorage.getItem('selectedTable');
                const mesaInput = document.getElementById('mesa');
                if (selectedTable) {
                    mesaInput.value = selectedTable;
                }
            });
        </script>
    </div>

    </div>
    </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const produtosSelecionados = JSON.parse(localStorage.getItem('produtosSelecionados')) || [];
        const pedidoArea = document.getElementById('pedido');
        const valorInput = document.getElementById('valor');
        let valorTotal = 0;

        produtosSelecionados.forEach(produto => {
            pedidoArea.value += (pedidoArea.value ? ', ' : '') + produto.nome;
            valorTotal += produto.valor;
        });

        valorInput.value = valorTotal.toFixed(2);
    });

    document.getElementById('comandaForm').addEventListener('submit', function(event) {
        event.preventDefault(); 

        
        const mensagem = document.getElementById('mensagem');
        mensagem.innerHTML = '<div class="alert alert-success">Comanda inserida com sucesso!</div>';

        
        document.getElementById('pedido').value = ''; 
        document.getElementById('valor').value = '';  

        
        localStorage.removeItem('produtosSelecionados');
        
    });

    
</script>
</body>
</html>


<div class="table-section">
    <h1>Gestão de Mesas</h1>
    <div id="tables" class="d-flex flex-wrap justify-content-center">
        <!-- Mesas serão listadas aqui -->
    </div>
    <script>
        let selectedTable = null;

        document.addEventListener('DOMContentLoaded', function() {
            const tablesContainer = document.getElementById('tables');
            for (let i = 1; i <= 10; i++) {
                const status = localStorage.getItem(`table-${i}-status`) || 'free';
                const tableDiv = document.createElement('div');
                tableDiv.className = `table ${status}`;
                tableDiv.id = `table-${i}`;
                tableDiv.innerHTML = `
                    <h2>Mesa ${i}</h2>
                    <div class="status-select">
                        <label for="status-${i}">Status:</label>
                        <select id="status-${i}" onchange="updateTableStatus(${i}, this.value)">
                            <option value="free" ${status === 'free' ? 'selected' : ''}>Livre</option>
                            <option value="occupied" ${status === 'occupied' ? 'selected' : ''}>Ocupada</option>
                            <option value="reserved" ${status === 'reserved' ? 'selected' : ''}>Reservada</option>
                        </select>
                    </div>
                    <button onclick="goToOrderPage(${i})">Adicionar Pedido</button>
                `;
                tablesContainer.appendChild(tableDiv);
            }
        });

        function goToOrderPage(tableId) {
            selectedTable = tableId; // Armazena a mesa selecionada
            window.location.href = '#comanda'; // Redireciona para a seção da comanda
        }

        function adicionarItem(nomeProduto, preco, quantidadeId, observacaoId) {
            const quantidade = document.getElementById(quantidadeId).value;
            const observacao = document.getElementById(observacaoId).value;

            const subtotal = (preco * quantidade).toFixed(2);

            const tabela = document.getElementById("comandaBody");
            const novaLinha = tabela.insertRow();

            novaLinha.innerHTML = `
                <td>${selectedTable}</td> <!-- Mostra o número da mesa -->
                <td>${nomeProduto}</td>
                <td>${quantidade}</td>
                <td>${observacao}</td>
                <td>R$ ${preco.toFixed(2)}</td>
                <td>R$ ${subtotal}</td>
            `;
        }

        function updateTableStatus(tableId, status) {
            const tableDiv = document.getElementById(`table-${tableId}`);
            tableDiv.className = `table ${status}`;
            localStorage.setItem(`table-${tableId}-status`, status);
        }
    </script>
</div>

<div class="col-md-6">
    <div class="menu-section flex-fill">
        <h2>Comanda da Mesa</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Mesa</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Observação</th>
                    <th>Valor Unitário</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody id="comandaBody">
                <!-- Itens da comanda serão adicionados aqui -->
            </tbody>
        </table>
    </div>
</div>
