<?php

include_once("arquivo/php/valida.php");

if (isset($_GET["user"]) && isset($_GET["musica"])) {
    $idUser = $_GET["user"];
    $idMusica = $_GET["musica"];

    $count = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM favoritos WHERE id_usuario = '$idUser' AND id_musica='$idMusica'"));

    $query = mysqli_query($conexao, "DELETE FROM favoritos WHERE id_usuario = '$idUser' AND id_musica='$idMusica'");

}



?>