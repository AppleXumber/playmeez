<?php
include_once("arquivo/php/valida.php");

$idGet = $_GET["id_album"];

$dadosAlbum = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT * FROM album WHERE id_album = '$idGet'"));

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
            <h1>Editar Album</h1>

            <div id="header">
                <p>
                    <label for="artista">Nome do Album</label>
                </p>

               <p> <input required name="album" value="<?= $dadosAlbum["nome_album"]?>" type="text" id="album"></p>
            </div>

            <div id="main">
                <p>
                    <label for="artista" id="lartista">Artista</label>
                </p>

                <p>
                    <select required name="artista" id="artista">
                        <option value="" selected disabled>Selecione o artista</option>
                        <?php
                        include_once("arquivo/php/conexao.php");
                        $query = mysqli_query($conexao, "SELECT * FROM artista");

                        while ($dados = mysqli_fetch_assoc($query)) {
                            $id = $dados["id_artista"];
                            $nome = $dados["nome_artista"];
                            if ($nome == $dadosAlbum["nome_artista"]) {
                                echo "<option selected value='$nome'>$nome</option>";
                            } else{
                                echo "<option value='$nome'>$nome</option>";
                            }
                        }
                        ?>

                    </select>
                </p>

                <p>
                    <label for="imagem_album" id="limagem">Imagem</label>
                </p>

                <p>
                    <label for="imagem_album" id="sel"> Selecionar um arquivo</label>
                </p>
                <input id="imagem_album" name="imagem_album" type="file">
            </div>

            <div id="footer">
                <button type="submit" id="cadastro">
                    <h2>Cadastrar Album</h2>
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
include_once("arquivo/php/include/editar_albuns.php");

?>