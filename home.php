<?php
include_once("arquivo/php/valida.php");

if (isset($_GET["acao"]) && ($_GET["acao"] == 'sair')) {
    limpaCookie();
    header("location:login.php");
}

$email = $_COOKIE["email"];
$userNome = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT * FROM usuario WHERE email_usuario='$email'"))["nome_usuario"];
$userId = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT * FROM usuario WHERE email_usuario='$email'"))["id_usuario"];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="arquivo/css/home.css">
    <link rel="stylesheet" href="arquivo/css/mediaquery.css">
    <link rel="stylesheet" href="arquivo/css/fontawesome/css/all.min.css">
    <script src="arquivo/js/jQuery.js"></script>
    <script src="arquivo/js/script.js"></script>

    <title>Home</title>
</head>

<body>
    <aside class='listagem'>
        <section class='listagem_artistas'>

            <?php
            $query = mysqli_query($conexao, "SELECT * FROM artista");

            while ($dados = mysqli_fetch_assoc($query)) {
                $nomeArtista = $dados["nome_artista"];
                $foto = $dados["foto_artista"];
                $pathArtista = $dados["path_foto"];

                echo "<div class='lista-Artistas'>";

                echo "<p class='lista-Artistas_nome'>$nomeArtista</p>";

                $queryAlbuns = mysqli_query($conexao, "SELECT * FROM album WHERE nome_artista = '$nomeArtista'");

                while ($dadosAlbuns = mysqli_fetch_assoc($queryAlbuns)) {
                    $nomeAlbuns = $dadosAlbuns["nome_album"];
                    echo "<span class='nome_album'><a href='?ref=$nomeAlbuns&artista=$nomeArtista'>$nomeAlbuns</a></span>";
                }
                ;
                echo "</div>";
            }
            ;

            ?>

        </section>

        <section id="favoritos" style="display:none">
            <div class="lista-Artistas">
                <p class="lista-Artistas_nome">Favoritos</p>
                <span class="nome_album"><a href="?ref=favoritos">
                        <?= $userNome ?>
                    </a></span>
            </div>
        </section>
        <script>
            function showFav() {
                var favoritos = document.getElementById("favoritos");
                favoritos.style = "display:block";
            }
        </script>


        <?php {
            $query = mysqli_query($conexao, "SELECT * FROM favoritos WHERE id_usuario='$userId'");
            if (mysqli_num_rows($query) > 0) { ?>
                <script>
                    showFav();
                </script>
                <?php
            }
        }
        ?>
        <img src="arquivo/imagens/Spotify.png" id="spot">
    </aside>

    <main id="main_home">
        <h1>Artistas</h1>
        <nav class='header'>
            <div class='div_nav'>
                <p><a href="home.php">Home</a></p>
                <p><a href="contato.php">Contato</a></p>
            </div>
            <div class='div_user'>
                <div class="log_out">
                    <div class="dropdown">
                        <p>
                            <?= $userNome ?>
                        </p>
                        <ul class="dropdown-content">
                            <li> <a href='editar_user.php'>Alterar cadastro</a></li>
                            <li> <a href='pesquisa.php'>Pesquisar</a></li>
                            <li> <a href='cad_artistas.php'>Cadastro de artistas</a></li>
                            <li> <a href='cad_albuns.php'>Cadastro de albuns</a></li>
                            <li> <a href='cad_musicas.php'>Cadastro de musicas</a></li>
                            <li> <a href='?acao=sair' id="sair">Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <?php
        if (isset($_GET["ref"]) && isset($_GET["artista"])) {
            include_once("arquivo/php/include/home.php");
        } else if (isset($_GET["ref"]) == "favoritos") {
            include_once("arquivo/php/include/favoritos.php");
        }

        ?>


    </main>

    <script>
        const audios = document.querySelectorAll(".audio-musica");

        for (let i = 0; i < audios.length; i++) {
            audios[i].addEventListener("play", function () {
                for (let j = 0; j < audios.length; j++) {
                    if (audios[j] !== this && !audios[j].paused) {
                        audios[j].pause();
                    }
                }
            });

            audios[i].addEventListener("pause", function () {
                const pausedAudioID = this.id;
                pauseShow(pausedAudioID);
            });
        }
    </script>
</body>

</html>