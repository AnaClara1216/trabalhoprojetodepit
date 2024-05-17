<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&display=swap');
        body {
            
            margin: 0;
            background-image: url(./login.jpg);    
            background-size: 100%;
        }
            .container{
                margin: 0 auto;
                background-color: gray;
                color: white;
                text-align: center;
                width: 800px;
                height: 420px;
                border-radius: 12px;
                font-family: "inter", Merienda;
            }
            .row{
                margin: 0 auto;
                width: 400px;
            }
        
    </style>
</head>
<body > 
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
<form action="insert2.php" method="post">
        <div class="container">
            <div>
                <br>
                <h1 >Fazer login</h1>
            </div>

            <br>
            <br>
            <br>
            <div class="row">

                <div class="col-md-8">
                    <div class="row row-cols-1">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail">
                    </div>
                    <br>
                </div>
                
                <div class="col-md-8">
                    <div class="row row-cols-1">
                        <input type="password" name="senha" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Senha">
                    </div>
                    <br>
                </div>
                
            </div>

            <button type="submit" class="btn btn-dark">Entrar</button>
            <a href="comanda.php" class="btn btn-dark">Entrar</a>
        </div>

    </form>
</body>
</html>