<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
    $resultadoSelect = 0;
    $resultadoUpdate;

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
    if (isset($_GET['id'])) {
        //Criar o comando
        $sql = "SELECT * FROM dados where id = {$_GET['id']}";

        //Executar o comando
        $resultadoSelect = $conn->query($sql);
    }
    ?>

<form action="insertcartao.php" method="post">
        <div class="container">
            <div class="faixa">
                <br>
                <h1 >Pagamento no Cartão</h1>
                <?php if($resultadoSelect) :?>
    <?php foreach ($resultadoSelect as $r) : ?>
            </div>

            <br>
            <div class="row">


                <div class="col-md">
                <div class="row row-cols-1">
                    <label for="exampleInputEmail1" class="form-label">Nome Completo</label>
                    <input type="text" name="cliente" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $r['cliente'] ?>">
                </div>
                <br>
                <div class="row row-cols-1">
                    <label for="data">Data:</label>
                    <input type="date" id="data" name="data" required>
                    <br><br>
                </div>
                <br>
                <div class="row row-cols-1">
                    <label for="exampleInputText1" class="form-label">Valor</label>
                    <input type="valor" name="valor" class="form-control" id="exampleInputText1" value="<?= $r['valor'] ?>">
                    
                </div>
                
                <?php
                include_once "conexao.php";
                ?>
                <br>

                <div class="row row-cols-1">
                    <select name="cred_deb">
                        <option value="escolha"></option>
                        <option value="credito">Crédito</option>
                        <option value="debito">Débito</option>
                    </select>
                </div>
                <br>

            </div>
            <button type="submit" class="btn btn-dark">Pagar</button>
            <a href="dados.php" class="btn btn-primary">Ver dados</a>
        </div>

    </form>
    <?php endforeach; ?>
    <?php endif;?>
    
</body>
</html>