<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cardápio</title>
    <link href="snackbar.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> <!-- Inclua seu CSS -->
</head>
<style>
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
    .container {
        display: flex;
        justify-content: space-between;
    }
    .menu-section {
        margin-left: 20px; /* Adiciona espaço entre os componentes, se necessário */
    }
    </style>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">BarControl</a>
        <button class="navbar-toggler" type="button" id="navbar-toggler" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                
                <li class="nav-item"><a class="nav-link" href="#">Comanda</a></li>
                
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
                    <button class="btn btn-primary" onclick="goToOrderPage(${i})">Adicionar Pedido</button>
                `;
                tablesContainer.appendChild(tableDiv);
            }
        });

        function goToOrderPage(tableId) {
            selectedTable = tableId; // Armazena a mesa selecionada
            window.location.href = '#comanda'; // Redireciona para a seção da comanda
        }
        function updateTableStatus(tableId, status) {
            const tableDiv = document.getElementById(`table-${tableId}`);
            tableDiv.className = `table ${status}`;
            localStorage.setItem(`table-${tableId}-status`, status);
        }
    </script>
</div>



<div class="container mt-5">
    <div class="col-md-6">
        <h2>Cardápio</h2>
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="porcoes-tab" data-toggle="tab" href="#porcoes" role="tab" aria-controls="porcoes" aria-selected="true">Porções</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="bebidas-tab" data-toggle="tab" href="#bebidas" role="tab" aria-controls="bebidas" aria-selected="false">Bebidas</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <!-- Seção de Porções -->
                    <div class="tab-pane fade" id="porcoes" role="tabpanel" aria-labelledby="porcoes-tab">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div id="carouselBatata" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="../imagens/batata_frita.jpg" class="d-block w-100" alt="Batata Frita 1">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="../imagens/batata_frita2.jpg" class="d-block w-100" alt="Batata Frita 2">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselBatata" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselBatata" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6 text-left">
                                <h5 class="card-title mt-2">Porção de Batata Frita</h5>
                                <p class="card-text">Descrição: Porção crocante de batata frita.</p>
                                <p>Preço: R$ 20,00</p>
                                <input type="number" class="form-control mb-2" placeholder="Quantidade" min="1" value="1" id="quantidadeBatata">
                                <textarea class="form-control mb-2" placeholder="Observação" id="observacaoBatata"></textarea>
                                <button class="btn btn-dark" onclick="adicionarItem('Porção de Batata Frita', 20, 'quantidadeBatata', 'observacaoBatata')">Adicionar</button>
                            </div>
                        </div>
                    </div>

                    <!-- Seção de Bebidas -->
                    <div class="tab-pane fade show active" id="bebidas" role="tabpanel" aria-labelledby="bebidas-tab">
                        <div class="card mt-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="carouselRefrigerante" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="../imagens/refri.jpg" class="d-block w-100" alt="Refrigerante 1">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="../imagens/refri2.jpg" class="d-block w-100" alt="Refrigerante 2">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselRefrigerante" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselRefrigerante" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6 text-left">
                                    <h5 class="card-title mt-2">Refrigerante</h5>
                                    <p class="card-text">Descrição: Refrigerante gelado.</p>
                                    <p>Preço: R$ 5,00</p>
                                    <input type="number" class="form-control mb-2" placeholder="Quantidade" min="1" value="1" id="quantidadeRefrigerante">
                                    <textarea class="form-control mb-2" placeholder="Observação" id="observacaoRefrigerante"></textarea>
                                    <button class="btn btn-dark" onclick="adicionarItem('Refrigerante', 5, 'quantidadeRefrigerante', 'observacaoRefrigerante')">Adicionar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="carouselSuco" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="../imagens/suco_natural.jpg" class="d-block w-100" alt="Suco Natural 1">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="../imagens/suco_natural2.jpg" class="d-block w-100" alt="Suco Natural 2">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="path/to/suco3.jpg" class="d-block w-100" alt="Suco Natural 3">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselSuco" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselSuco" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6 text-left">
                                    <h5 class="card-title mt-2">Suco Natural</h5>
                                    <p class="card-text">Descrição: Suco fresco de frutas.</p>
                                    <p>Preço: R$ 8,00</p>
                                    <input type="number" class="form-control mb-2" placeholder="Quantidade" min="1" value="1" id="quantidadeSuco">
                                    <textarea class="form-control mb-2" placeholder="Observação" id="observacaoSuco"></textarea>
                                    <button class="btn btn-dark" onclick="adicionarItem('Suco Natural', 8, 'quantidadeSuco', 'observacaoSuco')">Adicionar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="col-md-6">
        <div class="menu-section flex-fill">
            <div class="card-body">
            <h2>Comanda</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mesa</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Observação</th>
                        <th>Valor Unitário</th>
                        <th>Subtotal</th>
                        <th>Ativo</th>
                    </tr>
                </thead>
                <tbody id="comandaBody">
                    <!-- Itens da comanda serão adicionados aqui -->
                </tbody>
            </table>
            
        </div>
    </div>
</div>


<script>
    function adicionarItem(nomeProduto, preco, quantidadeId, observacaoId) {
    const quantidade = document.getElementById(quantidadeId).value;
    const observacao = document.getElementById(observacaoId).value;
    const mesa = "1"; // Supondo que a mesa seja 1; você pode modificar isso conforme necessário

    const subtotal = (preco * quantidade).toFixed(2);

    const tabela = document.getElementById("comandaBody");
    const novaLinha = tabela.insertRow();

    novaLinha.innerHTML = `
        <td>${selectedTable}</td>
        <td>${nomeProduto}</td>
        <td>${quantidade}</td>
        <td>${observacao}</td>
        <td>R$ ${preco.toFixed(2)}</td>
        <td>R$ ${subtotal}</td>
       
    `;

    function updateTableStatus(tableId, status) {
            const tableDiv = document.getElementById(`table-${tableId}`);
            tableDiv.className = `table ${status}`;
            localStorage.setItem(`table-${tableId}-status`, status);
        }

    const formData = new FormData();
    formData.append('mesa', selectedTable);
    formData.append('produto', nomeProduto);
    formData.append('quantidade', quantidade);
    formData.append('observacao', observacao);
    formData.append('valor_unitario', preco);
    formData.append('subtotal', subtotal);

    fetch('menuPrincipal.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data); // Para fins de depuração
    })
    .catch(error => console.error('Erro:', error));

}

    document.getElementById('saveData').addEventListener('click', () => {
    const rows = document.querySelectorAll('#myTable tbody tr');
    const data = [];
});
</script>

<script src="path/to/jquery.js"></script>
<script src="path/to/bootstrap.bundle.js"></script>
</body>
</html>
