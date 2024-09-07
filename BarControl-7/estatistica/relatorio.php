<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>Document</title>
  <!-- Inclua o Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&display=swap');
   body {
      margin: 0;
      font-family: "Merienda", cursive;
    }
    .navbar {
       margin-bottom: 20px;
    }
    .navbar-brand {
        font-weight: bold;
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
                    <li class="nav-item">
                        <a class="nav-link" href="..//mesas.php">Mesas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../comanda.php">Comanda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../cardapio.php">Cardápio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="relatorio.php">Estatísticas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

  <?php
  // Dados de conexão
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "criarconta";

  // Conectar ao banco de dados
  $conn = new mysqli($hostname, $username, $password, $database);

  // Verificar a conexão
  if ($conn->connect_error) {
      die("Conexão falhou: " . $conn->connect_error);
  }

  // Processar o envio do formulário
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $cliente = $_POST['cliente'];
      $mesa = $_POST['mesa'];
      $pedido = $_POST['pedido'];
      $observacao = $_POST['observacao'];
      $valor = $_POST['valor'];

      $sql = "INSERT INTO dados (cliente, mesa, pedido, observacao, valor) VALUES (?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ssssd", $cliente, $mesa, $pedido, $observacao, $valor);

      if ($stmt->execute()) {
          echo "<div class='alert alert-success' role='alert'>Registro adicionado com sucesso!</div>";
      } else {
          echo "<div class='alert alert-danger' role='alert'>Erro ao adicionar registro: " . $stmt->error . "</div>";
      }

      $stmt->close();
  }

  // Calcular estatísticas
  $sql = "SELECT SUM(valor) AS total_valor, COUNT(*) AS total_pedidos FROM dados";
  $resultado = $conn->query($sql);
  $estatisticas = $resultado->fetch_assoc();
  ?>

<div class="container mt-4">
      <h2>Estatísticas</h2>
      <div class="row">
          <div class="col-md-6">
              <div class="card text-white bg-primary mb-3">
                  <div class="card-header">Total Valor</div>
                  <div class="card-body">
                      <h5 class="card-title">R$ <?= number_format($estatisticas['total_valor'], 2, ',', '.') ?></h5>
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="card text-white bg-success mb-3">
                  <div class="card-header">Total Pedidos</div>
                  <div class="card-body">
                      <h5 class="card-title"><?= $estatisticas['total_pedidos'] ?></h5>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="container mt-4">
      
      <div class="row">
          <div class="col-md-12">
              <div class="card mb-3">
                  <div class="card-header">Gráfico de Estatísticas</div>
                  <div class="card-body">
                      <canvas id="estatisticasChart"></canvas>
                  </div>
              </div>
          </div>
      </div>
  </div>

  

  <script>
    // Dados para o gráfico
    const ctx = document.getElementById('estatisticasChart').getContext('2d');
    const estatisticasChart = new Chart(ctx, {
        type: 'bar', // Tipo de gráfico: 'bar', 'line', 'pie', etc.
        data: {
            labels: ['Total Valor', 'Total Pedidos'],
            datasets: [{
                label: 'Estatísticas',
                data: [<?= $estatisticas['total_valor'] ?>, <?= $estatisticas['total_pedidos'] ?>],
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
  </script>
</body>

</html>
