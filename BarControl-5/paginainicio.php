<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&display=swap');
        body{
            margin: 0;
            padding: 0;
            background-image: url(./telainicio.jpg);    
            background-size: 100%;
        }
        
        .titulo{
            position: absolute;
            top: 20%;
            left: 15%;
            color: white;
            font-size: 100px;
            font-family: "Merienda";
        }
        #butao{
            position: absolute;
            top: 70%;
            left: 15%;
            font-family: "Merienda";
            font-size: 30px;
        }
        #butao2{
            position: absolute;
            top: 70%;
            left: 30%;
            font-family: "Merienda";
            font-size: 30px;  
        } 

    </style>
</head>
<body>
    <div class="image">
    <h3 class="titulo">Bar <br>Control</h3>
        <div>
        <a id="butao" href="login.php" class="btn btn-dark">Entrar</a>
        <a id="butao2" href="criarconta.php" class="btn btn-dark">Criar conta</a>
        </div>
    
    </div>
</body>
</html>