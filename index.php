<?php

if (isset($_COOKIE["email"]) && isset($_COOKIE["token"])) {
    header("location: home.php");
} else {
    header("location: login.php");
}


?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <ul>
        <li> <a href="cad_artistas.php">Artista</a></li>
        <li><a href="cad_musicas.php">Musica</a></li>
        <li><a href="cad_albuns.php">Albuns</a></li>
        <li> <a href="cadastro.php">Cadastrar</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="home.php">Home</a></li>
    </ul>
</body>
</html>