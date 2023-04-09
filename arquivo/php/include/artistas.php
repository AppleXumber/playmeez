<?php
function alerta($mensagem, $pagina)
{
    echo "<script> 
        alert('$mensagem');
        location.href = '$pagina';
        </script>";
}

include_once("arquivo/php/conexao.php");
/* include_once("arquivo/php/valida.php"); */

$domImg = ["jpg", "png", "JPG", "JPEG", "bmp", "gif", "jfif", "webp"];

if (isset($_FILES["imagem"])) {
    $arquivo = $_FILES["imagem"];
    $tamanho = $arquivo["size"];
    $nomeArtista = $_POST["artista"];

    if ($tamanho > 3097152) {
        die("Arquivo muito grande");
    }

    $pasta = "uploads/artistas/";

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
        $sql = "INSERT INTO artista (nome_artista, foto_artista, path_foto) VALUES ('$nomeArtista', '$nomeArquivo', '$path')";
        $query = mysqli_query($conexao, $sql);
        if ($query) {
            alerta("Artista cadastrado com sucesso", "cad_artistas.php");
        } else {
            die("Não deu boa");
        }
    } else {
        die("Falha no cadastro");
    }
}
?>