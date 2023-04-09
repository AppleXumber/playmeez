<?php
include_once("arquivo/php/valida.php");
$idGet = intval(@$_GET['id_musica']);

$sql_musica = "SELECT * FROM musica WHERE id_musica='$idGet'";

$query_musica = $conexao->query($sql_musica) or die($conexao->error);
$musica = $query_musica->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar musicas</title>
    <link rel="stylesheet" href="arquivo/css/style.css">

    </style>
</head>

<body>
    <style>
        #input {
            display: none;
        }

        #cad_musicas {
            height: 45vw;
            margin-top: 2.5%;
        }
    </style>

    <main id="cad_musicas" >
        <form action="#" method="post" enctype="multipart/form-data">
            <input type="text" value="musica" name="acao" id="input">
            <a href="home.php"><img src="arquivo/imagens/verde_spot_cinza.png" alt=""> </a><br>
            <h1>Editar musica</h1>

            <div id="header">
                <p>
                    <label for="artista">Artista</label>
                </p>
                <p>
                    <select required name="nome_artista" id="artista">
                        <option name="nome_artista" value="<?php echo @$musica['nome_album'] ?>" selected >Selecione o artista</option>
                        <?php
                        $query = mysqli_query($conexao, "SELECT * FROM artista");

                        while ($dados = mysqli_fetch_assoc($query)) {
                            $id = $dados["id_artista"];
                            $nome = $dados["nome_artista"];
                            echo "<option value='$nome'>$nome</option>";
                            if ($nome == $musica["nome_artista"]) {                                
                                echo "<option selected value='$nome'>$nome</option>";
                            }
                        }
                        ?>

                    </select>
                </p>

                <p>
                    <label for="id_album" id="lalbum">Album</label>
                </p>

                <p>
                    <select name="nome_album" required id="album">
                        <option  name="nome_album" value="<?php echo @$musica['nome_album'] ?>">Selecione o Album</option>
                        <?php
                        $query = mysqli_query($conexao, "SELECT * FROM album");

                        while ($dados = mysqli_fetch_assoc($query)) {
                            $id = $dados["id_album"];
                            $nome = $dados["nome_album"];
                            echo "<option value='$nome'>$nome</option>";
                            if ($nome == $musica["nome_album"]) {                                
                                echo "<option selected value='$nome'>$nome</option>";
                            }
                        }
                        ?>
                    </select>
                </p>
                <p>
                    <label for="nomedamusica" id="lnomemusic">Nome da musica</label>
                </p>

               <p> <input type="text" name="nome_musica" value="<?php echo @$musica['nome_musica'] ?>" id="nomemusic"></p>
                <p>
                    <label for="id_genero" id="lalbum">Genero Da Musica</label>
                </p>
                <p><input type="text" name="genero_musica" value="<?php echo @$musica['genero_musica'] ?>" id="genero"></p>


            </div>

            <div id="main">
              
            <div id="footer">
                <button type="submit" id="cadastro">
                    <h2>Editar Musica</h2>
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
include_once("arquivo/php/include/editar_musica.php");

?>