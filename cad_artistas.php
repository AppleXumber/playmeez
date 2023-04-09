<?php
include_once("arquivo/php/valida.php");

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de artistas</title>
    <link rel="stylesheet" href="arquivo/css/style.css">

</head>

<body id="cad_artistas">
    <style>
        #input {
            display: none;
        }
    </style>
    <main>
        <form enctype="multipart/form-data" action="#" method="post">
            <input type="text" value="musica" name="acao" id="input">
           <a href="home.php"> <img src="arquivo/imagens/verde_spot_cinza.png" alt=""></a>
            <h1>Cadastrar Artista</h1>

            <div id="header">
                <p>
                    <label for="artista">Artista</label>
                </p>

              <p> <input required id="artista" name="artista" type="text" id="artista"></p> 
            </div>

            <div id="main">
                <p>
                    <label for="imagem" id="limagem">Imagem</label>
                </p>
                <p>
                    <label for="imagem" id="sel" id="sel"> Selecionar um arquivo</label>
                </p>
                <input required id="imagem" name="imagem" type="file">
            </div>

            <div id="footer">
                <button type="submit" id="cadastro">
                    <h2>Cadastrar Artista</h2>
                    <span>Recomenda-se imagens com maior qualidade</span>
                </button>
            </div>
        </form>
        <div class="home-edit">
            <a href="home.php">Home</a>
        </div>
    </main>

</body>

</html>

<?php
include_once("arquivo/php/include/artistas.php");

?>