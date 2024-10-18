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
    // Valor total
    


    $taxaPercentual = 3.0;
if (isset($valor)) {
    // Calcula a porcentagem das vendas em relação ao valor total
    $totalComTaxa = $valor * (1 + ($taxaPercentual / 100));
    //echo "Valor com Taxa: " . number_format($totalComTaxa, 2) . "% <br>";

}

} else {
  echo "Nenhum resultado encontrado na tabela 'vendas'.";
}
?>

  <div class="row row-cols-1">
    <label for="exampleInputText1" class="form-label">Produto com Taxa</label>
    <input type="valor_taxa" name="valor_desc" class="form-control" id="exampleInputText1" value="<?= $totalComTaxa ?>">
                    
  </div>
  
</body>

</html>
