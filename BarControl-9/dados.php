<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>Document</title>
</head>
<body>
  <?php
  //Dados de conexão
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "criarconta";

  //Conectar ao banco de dados
  try {
    $conn = new mysqli($hostname, $username, $password, $database);
  } catch (Exception $e) {
    die("Erro ao conectar: " . $e->getMessage());
  }

  //Criar o comando
  $sql = "SELECT * FROM dados";

  //Executar o comando
  $resultado = $conn->query($sql);

  ?>
  <div class="container">
    <div class="border p-3">
      <h1 class="text-center">Dados da Comanda</h1>

      <a href="comanda.php" class="btn btn-dark">Voltar</a>

      <table class="table table-success table-striped-colunms table-bordered">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Cliente</th>
            <th scope="col">Mesa</th>
            <th scope="col">Pedido</th>
            <th scope="col">Observação</th>
            <th scope="col">Valor</th>
            <th scope="col" class="text-center" colspan="2">Ações</th>
            <th scope="col" class="text-center" colspan="3">Forma de Pagamento</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($resultado as $linha) {

          ?>
            <tr>
              <th scope="row"><?= $linha['id']; ?></th>
              <td><?= $linha['cliente'] ?></td>
              <td><?= $linha['mesa'] ?></td>
              <td><?= $linha['pedido'] ?></td>
              <td><?= $linha['observacao'] ?></td>
              <td><?= $linha['valor'] ?></td>
              <td class="text-center"><a href="adicionarpedido.php?id=<?= $linha['id'] ?>" class="btn btn-warning padding"><i class="bi bi-plus-circle"></i></a></td>
              <td class="text-center"><a href="excluirpedido.php?id=<?= $linha['id'] ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
              <td class="text-center"><a href="dinheiro.php?id=<?= $linha['id'] ?>" class="btn btn-dark">Dinheiro<i class=""></i></a></td>
              <td class="text-center"><a href="pix.php?id=<?= $linha['id'] ?>" class="btn btn-dark">PIX<i class=""></i></a></td>
              <td class="text-center"><a href="cartao.php?id=<?= $linha['id'] ?>" class="btn btn-dark">Cartão<i class=""></i></a></td>
            </tr>
          <?php
          }
          unset($_POST, $resultado, $resultadoInsert);
          $conn->close();
          ?>

        </tbody>
      </table>
    </div>
  </div>
</body>

</html>