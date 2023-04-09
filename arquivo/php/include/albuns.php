<?php

function alerta($mensagem, $pagina) {
    echo "<script> 
    alert('$mensagem');
    location.href = '$pagina';
    </script>";
}

$domImg = ["jpg", "png", "JPG", "JPEG", "bmp", "gif", "jfif"];

if (isset($_FILES["imagem_album"])) {
    $arquivo = $_FILES["imagem_album"];
    $tamanho = $arquivo["size"];
    $nomeAlbum = $_POST["album"];
    $artista = $_POST["artista"];

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
        $sql = "INSERT INTO album (nome_album, nome_artista, foto_album, path_foto) VALUES ('$nomeAlbum', '$artista', '$nomeArquivo', '$path')";
        $query = mysqli_query($conexao, $sql);
        if ($query) {
            alerta("album cadastrado com sucesso", "cad_albuns.php");
        } else {
            die("Não deu boa");
        }
    } else {
        die("Falha no cadastro");
    }
}




?>