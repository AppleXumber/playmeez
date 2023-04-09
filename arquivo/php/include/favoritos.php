<?php
@$album = $_GET["ref"];
@$artista = $_GET["artista"];

$queryFavoritos = mysqli_query($conexao, "SELECT * FROM favoritos WHERE id_usuario = '$userId'");

?>
<div>

    <article class='lista-Albuns'>
        <section class='lista-Albuns_header'>
            <div class='nome-Album' id="fav">
                <h2>Favoritos</h2>
                <span>
                    <?= $userNome ?>
                </span>
            </div>
        </section>

        <section id="album_body">
            <ul>
                <?php
                $contagem = 1;
                while ($dadosFavoritos = mysqli_fetch_assoc($queryFavoritos)) {
                    $idMusicaFav = $dadosFavoritos["id_musica"];

                    @$queryMusica = mysqli_query($conexao, "SELECT * FROM musica WHERE id_musica = '$idMusicaFav'");


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
                                <button id='ico.fav$nomeMusicaFormat'  onclick='favoritarMusica($userId, $idMusica, `$nomeMusicaFormat`)'><i class='ion-ios-heart-outline'></i></button>
                                <button style='display:none;' id='ico.desfav$nomeMusicaFormat' onclick='desfavoritarMusica($userId, $idMusica, `$nomeMusicaFormat`)'><i class='ion-ios-heart'></i></button>
                                ";
                        } else {
                            echo "
                                <button style='display:none;' id='ico.fav$nomeMusicaFormat' onclick='favoritarMusica($userId, $idMusica, `$nomeMusicaFormat`)'><i class='ion-ios-heart-outline'></i></button>
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
                            <button id='podcast-play.$nomeMusicaFormat' onclick='playShow(`$nomeMusicaFormat`)'><i class='ion-ios-play'></i></button> 
                            <button id='podcast-pause.$nomeMusicaFormat' onclick='pauseShow(`$nomeMusicaFormat`)' style='display:none;'><i class='ion-ios-pause'></i></button>

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
                }

                ?>
            </ul>
        </section>
    </article>
</div>