<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&display=swap');
        body{
            margin: 0;
            font-family: "Merienda";
        }
        .faixa{
            display: flex;
            justify-content: space-between;
            text-align: center;
            margin-top: 20px;
        }
        .cor{
            color: black;
            text-decoration: none;
        }
    </style>
<body>
    <form action="insertcomanda.php" method="post">
        <div class="container">
        <div class="faixa">
        <div><h1>Nova Comanda</h1></div>
        <div><a class="cor" href="cardapio.php"><h1>Cardápio</h1></a></div>
    </div>

            <br>
            <div class="row">


                <div class="col-md">
                <div class="row row-cols-1">
                    <label for="exampleInputEmail1" class="form-label">Nome do cliente</label>
                    <input type="text" name="cliente" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <br>
                <div class="row row-cols-1">
                    <label for="mesa" class="form-label">Número da mesa</label>
                    <input  name="mesa" class="form-control" id="mesa" readonly>
                </div>
                <br>
                <div class="row row-cols-1">
                    <label for="exampleInputText1" class="form-label">Descrição do pedido</label>
                    <input type="text" name="pedido" class="form-control" id="exampleInputText1">
                </div>
                <br>
                <div class="row row-cols-1">
                    <label for="exampleInputText1" class="form-label">Observação</label>
                    <input type="text" name="observacao" class="form-control" id="exampleInputText1">
                </div>
                <br>
                <div class="row row-cols-1">
                    <label for="exampleInputText1" class="form-label">Valor</label>
                    <input type="valor" name="valor" class="form-control" id="exampleInputText1">
                </div>
                <br>
                <br>
               
                
            </div>
            <button type="submit" class="btn btn-dark">Inserir</button>
            <a href="dados.php" class="btn btn-primary">Ver dados</a>
            <a href="mesas.php" class="btn btn-dark">Voltar</a>
        </div>
        
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const tableId = urlParams.get('table');

            const mesaInput = document.getElementById('mesa');
            mesaInput.value = tableId;
        });
    </script>
</body>
</html>