<?php

function alerta($mensagem, $pagina)
{
    echo "<script> 
    alert('$mensagem');
    location.href = '$pagina';
    </script>";
}

$domImg = ["jpg", "png", "JPG", "JPEG", "bmp", "gif", "jfif"];


if (isset($_POST["artista"])) {
    $artista = $_POST["artista"];
    $sql = "UPDATE artista SET nome_artista = '$artista' WHERE id_artista = '$idGet'";
    $query = mysqli_query($conexao, $sql);

    if ($query) {
        alerta("Artista editado com sucesso", "pesquisa.php");
    } else {
        die("Não deu boa");
    }
}

if (isset($_FILES["imagem_artista"])) {
    $arquivo = $_FILES["imagem_artista"];
    $tamanho = $arquivo["size"];

    if ($tamanho > 3097152) {
        die("Arquivo muito grande");
    }

    $pasta = "uploads/albuns/";

    if (!(is_dir("uploads"))) {
        mkdir("uploads", 0777);
    }

    if (!(is_dir("$pasta"))) { // Se a pasta não existe
        mkdir("$pasta", 0777); // Criar pasta
    }

    $nomeArquivo = $arquivo["name"];
    $dom = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

    if (!in_array($dom, $domImg)) {
        die("Tipo de arquivo não aceito");
    }

    $nomeUnico = uniqid();

    $path = $pasta . $nomeUnico . "." . $dom;

    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

    if ($deu_certo) {
        $sql = "UPDATE artista SET foto_artista = '$nomeArquivo', path_foto = '$path' WHERE id_artista = '$idGet'";
        $query = mysqli_query($conexao, $sql);

        if ($query) {
            alerta("Artista editado com sucesso", "pesquisa.php");
        } else {
            die("Não deu boa");
        }
    }
}

$query = mysqli_query($conexao, $sql);



?>