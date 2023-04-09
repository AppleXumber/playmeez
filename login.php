<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="arquivo/css/login_cadastro.css">
    <title>Login</title>
</head>

<body>
    <main>

        <form method="POST" action="#" class="form-cad_login">
            <img src="arquivo/imagens/verde_spot_cinza.png" alt="Logo"> 
            <h1>Login</h1>

                <label for="email">Email</label> 
                <input class="forms-input" required type="text" name="email" id="email">

                <label for="senha" id="lsenha">Senha</label> 
                <input class="forms-input" required type="password" name="senha" id="senha">

                <button type="submit" id="envia"><h2>Entrar</h2></button>
                <a href="cadastro.php">Ainda não é cadastrado?</a>
        </form>

    </main>
</body>
</html>

<?php
    include_once("arquivo/php/include/login.php");

?>