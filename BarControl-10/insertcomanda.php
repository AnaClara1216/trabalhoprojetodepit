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

        $conn = mysqli_connect(hostname: $servidor, username: $usuario, password: $senha, database: $dbname); $res_dest = 
        "SELECT * FROM ".$_SESSION['hub']."_projeto ORDER BY PAGINA, MODULO, OPERACAO"; $result_dest = mysqli_query(mysql: $conn, query: $res_dest);
        mysqli_close(mysql: $conn);

        // Receber dados JSON da requisição
$data = json_decode(file_get_contents('php://input'), true);
$itens = $data['itens'];

foreach ($itens as $item) {
    $mesa = $item['mesa'];
    $produto = $item['produto'];
    $quantidade = $item['quantidade'];
    $observacao = $item['observacao'];
    $valor_unitario = $item['valor_unitario'];
    $subtotal = $item['subtotal'];

    // Criar o comando
    $sql = "INSERT INTO comanda (mesa, produto, quantidade, observacao, valor_unitario, subtotal) 
    VALUES ('$mesa', '$produto', $quantidade, '$observacao', $valor_unitario, $subtotal)";

    // Executar o comando
    $resultado = $conn->query($sql);
    
    if (!$stmt->execute()) {
        echo json_encode(['success' => false, 'message' => 'Erro ao inserir: ' . $stmt->error]);
        exit;
    }
}

$stmt->close();
$conn->close();

echo json_encode(['success' => true]);
?>
