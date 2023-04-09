<?php
@$album = $_GET["ref"];
@$artista = $_GET["artista"];

$queryAlbum = mysqli_query($conexao, "SELECT * FROM album WHERE nome_album = '$album'");
$queryArtista = mysqli_query($conexao, "SELECT * FROM artista WHERE nome_artista = '$artista'");

$dadosArtista = mysqli_fetch_assoc($queryArtista);
$dadosAlbum = mysqli_fetch_assoc($queryAlbum);
$imagemArtista = $dadosArtista["path_foto"];

echo "<style>
        main {
            background-image: url('$imagemArtista') !important;
        } 
    </style>";
?>

<script>

</script>

<div id="main_player">

    <article class='lista-Albuns'>
        <section class='lista-Albuns_header'>
            <img src='<?= $dadosAlbum["path_foto"]; ?>' width="120" height="120" id="albumfoto">
            <div class='nome-Album'>
                <h2><?= $album; ?></h2>
                <span><?= $dadosAlbum["nome_artista"] ?></span>
            </div>
        </section>

        <section id="album_body">
            <ul>
                <?php
                @$queryMusica = mysqli_query($conexao, "SELECT * FROM musica WHERE nome_album = '$album'");

                $contagem = 1;

                while ($dadosMusica = mysqli_fetch_assoc($queryMusica)) {
                    $idMusica = $dadosMusica["id_musica"];
                    $nomeMusica = $dadosMusica["nome_musica"];
                    $pathMusica = $dadosMusica["path_musica"];

                    $nomeMusicaFormat = preg_replace('/[\s()\-]+/', '', strtolower($nomeMusica));

                    echo "
                    <li class='caixa_musica'>
                        <div class='div-nome_musica'>
                        <span>
                        $contagem . 
                        </span>
                        <p>
                        $nomeMusica
                        </p>" ?>

                    <?php

                    $count = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM favoritos WHERE id_usuario = '$userId' AND id_musica='$idMusica'"));

                    if ($count < 1) {
                        echo "
                                <button id='ico.fav$nomeMusicaFormat'  onclick='favoritarMusica($userId, $idMusica, `$nomeMusicaFormat`); showFav();'><i class='ion-ios-heart-outline'></i></button>
                                <button style='display:none;' id='ico.desfav$nomeMusicaFormat' onclick='desfavoritarMusica($userId, $idMusica, `$nomeMusicaFormat`)'><i class='ion-ios-heart'></i></button>
                                ";
                    } else {
                        echo "
                                <button style='display:none;' id='ico.fav$nomeMusicaFormat' onclick='favoritarMusica($userId, $idMusica, `$nomeMusicaFormat`); showFav();'><i class='ion-ios-heart-outline'></i></button>
                                <button id='ico.desfav$nomeMusicaFormat' onclick='desfavoritarMusica($userId, $idMusica, `$nomeMusicaFormat`)'><i class='ion-ios-heart'></i></button>
                                ";
                    }

                    ?>

                <?php echo "
                        </div>
                        <div class='player-musica'>
                          
                            <span id='duracao.$nomeMusicaFormat'>
                            </span>
                            <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
                            <button class='player-pause' id='podcast-play.$nomeMusicaFormat' onclick='playShow(`$nomeMusicaFormat`)'><i class='ion-ios-play'></i></button> 
                            <button class='player-play' id='podcast-pause.$nomeMusicaFormat' onclick='pauseShow(`$nomeMusicaFormat`)' style='display:none;'><i class='ion-ios-pause'></i></button>

                            <audio id='$nomeMusicaFormat' class='audio-musica' controls>
                            <source src='$pathMusica' type='audio/mp3'>
                            O navegador não suporta o arquivo
                            </audio>

                        </div>
                        </li>
                        
                        <script>
                            setDuration('$nomeMusicaFormat', 'duracao.$nomeMusicaFormat');
                        </script>
                    ";
                    $contagem++;
                }
                ?>

                <script>
                    const audios = document.querySelectorAll(".audio-musica");

                    for (let i = 0; i < audios.length; i++) {
                        audios[i].addEventListener("play", function() {
                            for (let j = 0; j < audios.length; j++) {
                                if (audios[j] !== this && !audios[j].paused) {
                                    audios[j].pause();
                                }
                            }
                        });

                        audios[i].addEventListener("pause", function() {
                            const pausedAudioID = this.id;
                            pauseShow(pausedAudioID);
                        });
                    }
                </script>

            </ul>
        </section>
    </article>
</div>