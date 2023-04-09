<?php
function exibirAlerta($mensagem, $pagina){
    echo "<script>
    alert('$mensagem');
    location.href = '$pagina';
    </script>
    ";
}

if (isset($_FILES['musica'])) {
    $arquivo = $_FILES['musica'];

    $nome_artista = $_POST["nome_artista"];
    $nome_album = $_POST["nome_album"];
    $nome_musica1 = $_POST["nome_musica"];
    $genero_musica = $_POST["genero_musica"];


    if ($arquivo['error']) {
        die("falha ao enviar o arquivo");
    }

    $pasta = "uploads/musica/";

    if (!(is_dir("uploads"))) {
        mkdir("uploads", 0777);
    }

    if (!(is_dir("$pasta"))) { // Se a pasta não existe
        mkdir("$pasta", 0777); // Criar pasta
    }

    $nomedoarquivo = $arquivo['name'];
    $novoNomedoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomedoarquivo,  PATHINFO_EXTENSION));

    if ($extensao != "mp3") {
        die("Tipo de arquivo não aceito");
    }

    $path = $pasta . $novoNomedoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($arquivo['tmp_name'], $path);

    $inserir1 = "INSERT INTO musica (nome_artista,nome_album,nome_musica,genero_musica,path_musica) VALUES ('$nome_artista','$nome_album','$nome_musica1','$genero_musica','$path')";
    echo "<p>arquivo enviado com sucesso</p>";

    $sqlxz = mysqli_query($conexao, $inserir1);

    if ($sqlxz) {
        exibirAlerta("Album cadastrado com sucesso", "cad_musicas.php");
    } else {
        exibirAlerta("Erro", "cad_musicas.php");
    }
}


?>