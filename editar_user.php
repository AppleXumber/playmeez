<?php
include_once("arquivo/php/valida.php");
include("arquivo/php/conexao.php");

$emailCookie = $_COOKIE["email"];
$dados = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT * FROM usuario WHERE email_usuario='$emailCookie'"));

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
            <a href="home.php"><img src="arquivo/imagens/verde_spot_cinza.png" alt=""> </a>
            <h1>Alterar</h1>

            <label for="user">Nome do Usuario</label>
            <input class="forms-input" value="<?= $dados["nome_usuario"] ?>" required type="text" name="user" id="user">

            <label for="email" id="lemail">Email</label>
            <input class="forms-input" value="<?= $dados["email_usuario"]?>" required type="email" name="email" id="email">

            <button type="submit" id="cadastro">
                <h2>Cadastrar</h2>
            </button>
            
        </form>
        <div class="home-edit">
            <a href="home.php">Home</a>
        </div>

    </main>
</body>
</html>

<?php
    include_once("arquivo/php/include/editar_cadastro.php");
    
?>