<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Gestão de Mesas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        #tables {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
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

        .table button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .table button:hover {
            background-color: #0056b3;
        }

        .faixa{
            text-align: center;
            margin-top: 20px;

        }

        #botao{
            width: 80%;
            
        }
    </style>
</head>
<body>
    <h1>Gestão de Mesas</h1>
    <div id="tables">
        <!-- Mesas serão listadas aqui -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tablesContainer = document.getElementById('tables');

            // Simulação de mesas
            for (let i = 1; i <= 10; i++) {
                const tableDiv = document.createElement('div');
                tableDiv.className = 'table';
                tableDiv.id = `table-${i}`;
                tableDiv.innerHTML = `
                    <h2>Mesa ${i}</h2>
                    <button onclick="goToOrderPage(${i})">Adicionar Pedido</button>
                `;
                tablesContainer.appendChild(tableDiv);
            }
        });

        function goToOrderPage(tableId) {
            // Redireciona para a página de pedidos com o ID da mesa como parâmetro
            window.location.href = `comanda.php?table=${tableId}`;
        }
    </script>
    <br>
    <div class="faixa">
        <a id="botao" href="paginainicio.php" class="btn btn-dark">Inicio</a>
    </div>
</body>
</html>
