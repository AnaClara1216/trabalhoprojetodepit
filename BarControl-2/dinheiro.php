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
<form action="insertdinheiro.php" method="post">
        <div class="container">
            <div class="faixa">
                <br>
                <h1 >Pagamento no Dinheiro</h1>
                
            </div>

            <br>
            <div class="row">


                <div class="col-md">
                <div class="row row-cols-1">
                    <label for="exampleInputEmail1" class="form-label">Nome Completo</label>
                    <input type="text" name="cliente" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <br>
                <div class="row row-cols-1">
                    <label for="exampleInputEmail1" class="form-label">Data</label>
                    <input type="text" name="data" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <br>
                <div class="row row-cols-1">
                    <label for="exampleInputText1" class="form-label">Valor</label>
                    <input type="valor" name="valor" class="form-control" id="exampleInputText1">
                </div>
                <br>
                <br>
               

            </div>
            <button type="submit" class="btn btn-dark">Pagar</button>
            <a href="insertdinheiro.php" class="btn btn-primary">Ver dados</a>
        </div>

    </form>
</body>
</html>