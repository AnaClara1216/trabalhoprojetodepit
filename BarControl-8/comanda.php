<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Nova Comanda</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&display=swap');
        body {
            margin: 0;
            font-family: "Merienda", cursive;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .faixa {
            display: flex;
            justify-content: center;
            text-align: center;
            margin-top: 20px;
        }
        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            
        }
    </style>
</head>
<body>
    <!-- Navegação -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">BarControl</a>
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
                        <a class="nav-link" href="./estatistica/relatorio.php">Estatísticas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <main>
        <div class="container">
            <div class="faixa">
                <h1>Nova Comanda</h1>
            </div>
            <form action="insertcomanda.php" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="cliente" class="form-label">Nome do cliente</label>
                            <input type="text" name="cliente" class="form-control" id="cliente" required>
                        </div>
                        <div class="mb-3">
                            <label for="mesa" class="form-label">Número da mesa</label>
                            <input name="mesa" class="form-control" id="mesa" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="pedido" class="form-label">Descrição do pedido</label>
                            <textarea name="pedido" class="form-control" id="pedido" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="observacao" class="form-label">Observação</label>
                            <textarea name="observacao" class="form-control" id="observacao" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="valor" class="form-label">Valor</label>
                            <input type="number" name="valor" class="form-control" id="valor" step="0.01" min="0" required>
                        </div>
                        <button type="submit" class="btn btn-dark">Inserir</button>
                        <a href="dados.php" class="btn btn-primary">Ver dados</a>
                        <a href="mesas.php" class="btn btn-dark">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </main>

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
    </script>
</body>
</html>
