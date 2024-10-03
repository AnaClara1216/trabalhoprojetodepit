<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Comanda</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">BarControl</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="mesas.php">Mesas</a></li>
                    <li class="nav-item"><a class="nav-link" href="comanda.php">Comanda</a></li>
                    <li class="nav-item"><a class="nav-link" href="cardapio.php">Cardápio</a></li>
                    <li class="nav-item"><a class="nav-link" href="./estatistica/relatorio.php">Estatísticas</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Nova Comanda</h1>
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
                        <a href="dados.php" class="btn btn-primary">Ver Pedido</a>
                        <a href="mesas.php" class="btn btn-dark">Voltar</a>
                    </div>
                </div>
            </form>
        <div id="mensagem" class="mt-3"></div>
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
    </script>

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
            // Mensagem de sucesso após envio (substitua por lógica real de confirmação, se necessário)
            const mensagem = document.getElementById('mensagem');
            mensagem.innerHTML = '<div class="alert alert-success">Comanda inserida com sucesso!</div>';
            // Limpa o localStorage após enviar (opcional)
            localStorage.removeItem('produtosSelecionados');
        });
    </script>
</body>
</html>
