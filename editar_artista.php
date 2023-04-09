<?php
include_once("arquivo/php/valida.php");

$idGet = $_GET["id_artista"];

$dadosArtista = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT * FROM artista WHERE id_artista = '$idGet'"));

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar albuns</title>
    <link rel="stylesheet" href="arquivo/css/style.css">

</head>

<body id="cad_albuns">
    <style>
        #input {
            display: none;
        }
    </style>
    <main>
        <form enctype="multipart/form-data" action="#" method="post">
            <input type="text" value="musica" name="acao" id="input">
          <a href="home.php">  <img src="arquivo/imagens/verde_spot_cinza.png" alt=""></a>
            <h1>Editar artista</h1>

            <div id="header">
                <p>
                    <label for="artista">Nome do artista</label>
                </p>

               <p> <input required name="artista" value="<?= $dadosArtista["nome_artista"]?>" type="text" id="artista"></p>
            </div>

            <div id="main">
                <p>
                    <label for="artista" id="lartista">Artista</label>
                </p>

                <p>
                    <label for="imagem_artista" id="limagem">Imagem</label>
                </p>

                <p>
                    <label for="imagem_artista" id="sel"> Selecionar um arquivo</label>
                </p>
                <input id="imagem_artista" name="imagem_artista" type="file">
            </div>

            <div id="footer">
                <button type="submit" id="cadastro">
                    <h2>Editar artista</h2>
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
include_once("arquivo/php/include/editar_artista.php");

?>