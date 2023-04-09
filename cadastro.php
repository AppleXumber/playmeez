<?php
include("arquivo/php/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="arquivo/css/login_cadastro.css">
    <title>Cadastro</title>
</head>

<body>
    <main>
        <form action="#" method="post" class="form-cad_login">
            <img src="arquivo/imagens/verde_spot_cinza.png" alt=""> 
            <h1>Cadastrar</h1>

            <!-- <div> -->
                <label for="user">Nome do Usuario</label>
                <input class="forms-input" required type="text" name="user" id="user">
            <!-- </div> -->

            <!-- <div> -->
                <label for="email" id="lemail">Email</label>
                <input class="forms-input" required type="email" name="email" id="email">
            <!-- </div> -->

            <!-- <div> -->
                <label for="senha" id="lsenha">Senha</label> 
                <input class="forms-input" required type="password" name="senha" id="senha">
            <!-- </div> -->

            <button type="submit" id="cadastro">
                <h2>Cadastrar</h2>
            </button>

            <a href="login.php">Já é cadastrado?</a>
            
        </form>


    </main>
</body>
</html>
<?php
    include_once("arquivo/php/include/cadastro.php");
    
?>