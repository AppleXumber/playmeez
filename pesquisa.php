<?php

include("arquivo/php/conexao.php");
include_once("arquivo/php/valida.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa de Musicas</title>
    <script src="https://kit.fontawesome.com/1e592b5726.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="arquivo/css/pesquisa.css">
</head>

<body>

    <div class="header">
        <a href="home.php">
            <h1>Lista de Musicas</h1>
        </a>
        <form action="">
            <input name="busca" value="<?php if (isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Pesquisar" type="text">
            <button type="submit">
                <h2><i class="fas fa-search" id="search"></i>Pesquisar</h2>
            </button>
        </form>
        <div class="home-edit">
            <a href="home.php">Home</a>

        </div>
    </div>

    <main>
        <h2>Música</h2>
        <article id="art_musica">

            <?php
            if (isset($_GET['busca'])) {
                $pesquisa = $conexao->real_escape_string($_GET['busca']);
                $sql = "SELECT * FROM musica
                WHERE nome_artista LIKE '%$pesquisa%'
                or nome_album LIKE '%$pesquisa%'
                or nome_musica LIKE '%$pesquisa%'
                or genero_musica LIKE '%$pesquisa%' ";
                $sql_query = $conexao->query($sql) or die("ERRO ao consultar!" + $mysqli->error);
                if ($sql_query->num_rows == 0) {
            ?>
                    <p> Nenhum resultado encontrado...</p>
                    <?php

                } else {
                    while ($dados = $sql_query->fetch_assoc()) {
                    ?>
                        <div class="sep">
                            <div id="lista">
                                <div>
                                    <h3>Nome do Artista</h3>
                                    <p><?= $dados['nome_artista'] ?></p>
                                </div>

                                <div>
                                    <h3>Nome do Album</h3>
                                    <p><?= $dados['nome_album'] ?></p>
                                </div>

                                <div>
                                    <h3>Nome da Musica</h3>
                                    <p><?= $dados['nome_musica'] ?></p>
                                </div>

                                <div>
                                    <h3>Genero da Musica</h3>
                                    <p><?= $dados['genero_musica'] ?></p>
                                </div>

                                <div>
                                    <h3>Editar</h3>
                                    <a href="editar_musica.php?id_musica=<?= $dados["id_musica"] ?>">
                                        <p class="link">Editar</p>
                                    </a>
                                </div>

                                <div>
                                    <h3>Excluir</h3>
                                    <p onclick="verifica('<?= $dados['id_musica']; ?>')" class="link">Excluir</p>

                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>
            <script>
                function verifica(recid) {
                    if (confirm("Excluir PERMANENTEMENTE essa musica?")) {
                        window.location = "arquivo/php/crud/excluir_musica.php?id_musica=" + recid
                    }
                }
            </script>

        </article>

        <h2>Artista</h2>
        <article id="art_artista">
            <?php
            if (isset($_GET['busca'])) {
                $pesquisa = $conexao->real_escape_string($_GET['busca']);

                $sql = "SELECT * FROM artista WHERE nome_artista LIKE '%$pesquisa%'";

                $sql_query = $conexao->query($sql) or die("ERRO ao consultar!" + $mysqli->error);

                if ($sql_query->num_rows == 0) { ?>
                    <p> Nenhum resultado encontrado...</p>
                    <?php

                } else {
                    while ($dados = $sql_query->fetch_assoc()) {
                    ?>
                        <div class="sep">
                            <div id="lista">
                                <div>
                                    <h3>Foto do artista</h3>
                                    <img height="50" src="<?= $dados['path_foto']; ?>">
                                </div>

                                <div>
                                    <h3>Nome do artista</h3>
                                    <p> <?= $dados['nome_artista']; ?></p>
                                </div>

                                <div>
                                    <h3>Editar</h3>
                                    <a href="editar_artista.php?id_artista=<?= $dados["id_artista"]; ?>">
                                        <p class="link">Editar</p>
                                    </a>
                                </div>

                                <div>
                                    <h3>Excluir</h3>
                                    <p onclick="verifica3('<?= $dados['id_artista']; ?>')" class="link">Excluir</p>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }

            ?>

            <script>
                function verifica3(recid) {
                    if (confirm("Excluir PERMANENTEMENTE esse artista?")) {
                        window.location = "arquivo/php/crud/excluir_artista.php?id_artista=" + recid
                    }
                }
            </script>

        </article>
        <h2>Álbum</h2>
        <article id="art_album">

            <?php
            if (isset($_GET['busca'])) {
                $pesquisa = $conexao->real_escape_string($_GET['busca']);
                $sql = "SELECT * FROM album WHERE nome_album LIKE '%$pesquisa%' or nome_artista LIKE '%$pesquisa%'";

                $sql_query = $conexao->query($sql) or die("ERRO ao consultar!" + $mysqli->error);

                if ($sql_query->num_rows == 0) { ?>
                    <p> Nenhum resultado encontrado...</p>
                    <?php
                } else {
                    while ($dados = $sql_query->fetch_assoc()) { ?>
                        <div class="sep">
                            <div id="lista">
                                <div>
                                    <h3>Foto do Album</h3>
                                    <img height="50" src="<?= $dados['path_foto']; ?>">
                                </div>

                                <div>
                                    <h3>Nome do Album</h3>
                                    <p> <?= $dados['nome_album']; ?></p>
                                </div>

                                <div>
                                    <h3>Nome do artista</h3>
                                    <p> <?= $dados['nome_artista']; ?></p>
                                </div>

                                <div>
                                    <h3>Editar</h3>
                                    <a href="editar_albuns.php?id_album=<?= $dados["id_album"]; ?>">
                                        <p class="link">Editar</p>
                                    </a>
                                </div>

                                <div>
                                    <h3>Excluir</h3>
                                    <p onclick="verifica2('<?= $dados['id_album']; ?>')" class="link">Excluir</p>
                                </div>
                            </div>
                        </div class="sep">
            <?php
                    }
                }
            }
            ?>
            <script>
                function verifica2(recid) {
                    if (confirm("Excluir PERMANENTEMENTE esse album?")) {
                        window.location = "arquivo/php/crud/excluir_album.php?id_album=" + recid
                    }
                }
            </script>

        </article>
    </main>
</body>

</html>