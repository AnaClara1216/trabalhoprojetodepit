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
  $id = $_GET['id'];
  
  $sql = "SELECT id, valor FROM dados where id=$id";

  //Executar o comando
  $resultado = $conn->query($sql);

  
  if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    
    // Valor total das vendas
    $valor = $row["valor"];
    var_dump($valor);
    // Valor total
    


$porcentagem = 5;
if (isset($valor)) {
    // Calcula a porcentagem das vendas em relação ao valor total
    $valor_desconto = ($valor / 100) * $porcentagem;
    echo "A porcentagem das vendas em relação ao valor total é: " . number_format($valor_desconto, 2) . "% <br>";

    $prod_com_desconto = $valor - $valor_desconto;
      //echo "Produto com desconto R$ " . number_format($prod_com_desconto, "2", ",", ".") . "<br>";
}

} else {
  echo "Nenhum resultado encontrado na tabela 'vendas'.";
}
?>
<br>
  <div class="row row-cols-1">
    <label for="exampleInputText1" class="form-label">Valor com desconto</label>
    <input type="valor_desc" name="valor_desc" class="form-control" id="exampleInputText1" value="<?= $prod_com_desconto ?>">
                    
  </div>
  
</body>

</html>
