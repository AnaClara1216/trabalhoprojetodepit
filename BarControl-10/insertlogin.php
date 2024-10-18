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
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if (empty($email) || empty($senha)) :
        ?>
            <div class="alert alert-warning" role="alert">
                Dados não podem ficar vazios!
            </div>
        <?php
        else :
            //Criar o comando
            $sql = "INSERT INTO login VALUES(NULL, '$email', '$senha')";

            //Executar o comando
            $resultado = $conn->query($sql);
        ?>

            <?php if ($resultado) : header("Location: mesas.php");
                exit;?>
                
            <?php endif; ?>
        <?php endif; ?>
</body>
</html>