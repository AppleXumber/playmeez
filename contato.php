<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="arquivo/css/contato.css">
    <title>Contato</title>
</head>

<body>
    <main>
        <form method="POST" action="#" class="form-contato">

            <a href="home.php"><img src="arquivo/imagens/verde_spot_cinza.png"></a>

            <h1>Comentarios</h1>

            <label for="nome">Nome:</label>
            <input class="inputs" required type="text" name="nome" id="nome">

            <label for="email">Email:</label>
            <input class="inputs" required type="text" name="email" id="email">

            <label for="coment" id="lcoment">Comentario:</label>

            <textarea name="comentario" id="comentario" cols="45" rows="10"></textarea>

            <button type="submit" id="envia">
                <h2>Enviar</h2>
            </button>

        </form>
    </main>
</body>

</html>

<?php
include_once("arquivo/php/include/contato.php");

?>