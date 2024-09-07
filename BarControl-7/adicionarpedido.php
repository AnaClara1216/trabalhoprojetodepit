<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <style type="text/css">
        
        body{
            margin: 0;
            
        }
        .faixa{
            
            text-align: center;
        }
    </style>
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
    }else if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $pedido = $_POST['pedido'];
        $valor = $_POST['valor'];

        //Criar o comando
        $sql = "UPDATE `dados` SET `pedido`='{$pedido}',`valor`='{$valor}' WHERE `id` = '$id'";
        $resultadoUpdate = $conn->query($sql);
        
    }

    ?>
    <div class="container">
    <h1 class="text-center"> Dados da Comanda</h1>
    <?php if($resultadoSelect) :?>
    <?php foreach ($resultadoSelect as $r) : ?>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            
                <div class="row">
                    <div class="row row-cols-1">
                        <label for="exampleInputText1" class="form-label">ID</label>
                        <input type="text" name="id" class="form-control" id="exampleInputText1" value="<?= $r['id'] ?>" disabled>
                        <input type="hidden" name="id" value="<?= $r['id']?>">
                        
                    </div>
                </div>
                <br>
                <div class="row row-cols-1">
                    <label for="exampleInputText1" class="form-label">Descrição do pedido</label>
                    <input type="text" name="pedido" class="form-control" id="exampleInputText1" value="<?= $r['pedido'] ?>">
                </div>
                <br>
                <div class="row row-cols-1">
                    <label for="exampleInputText1" class="form-label">Valor</label>
                    <input type="valor" name="valor" class="form-control" id="exampleInputText1" value="<?= $r['valor'] ?>">
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Atualizar</button>
                <a href="dados.php" class="btn btn-primary">Ver dados</a>
            </div>

        </form>
    <?php endforeach; ?>
    <?php elseif(isset($resultadoUpdate)):?>
        <?php if ($resultadoUpdate):?>
            <a href="mesas.php" class="btn btn-success">Início</a>
            <div class="alert alert-success" role="alert">
                Atualizados com Sucesso!
            </div>
            <a href="dados.php" class="btn btn-primary">Ver dados</a>
        <?php else:?>
            <div class="alert alert-error" role="alert">
                Erro ao atualizar
            </div>
            <?php endif;?>
    <?php endif;?>
</body>
</html>