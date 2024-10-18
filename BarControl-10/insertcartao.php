<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        //Recebendo variáveis do formulário
        $cliente = $_POST['cliente'];
        $data = $_POST['data'];
        $valor = $_POST['valor'];
        $valor_desc = $_POST['valor_desc'];
        $cred_deb = $_POST['cred_deb'];

        if (empty($cliente) || empty($data) || empty($valor) || empty($valor_desc) || empty($cred_deb)) :
        ?>
            <div class="alert alert-warning" role="alert">
                Dados não podem ficar vazios!
            </div>
        <?php
        else :
            //Criar o comando
            $sql = "INSERT INTO cartao VALUES(NULL, '$cliente', '$data', '$valor', '$valor_desc', '$cred_deb')";

            //Executar o comando
            $resultado = $conn->query($sql);
        ?>

            <?php if ($resultado) : ?>
                <div class="alert alert-success" role="alert">
                    Dado inserido com sucesso!
                </div>
            <?php else : ?>
                <div class="alert alert-danger" role="alert">
                    Erro ao inserir o dado!
                </div>
            <?php endif; ?>
        <?php endif; ?>
</body>
</html>