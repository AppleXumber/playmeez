<?php

include("arquivo/php/conexao.php");
$id = intval(@$_GET['id_musica']);
function alerta($mensagem, $pagina)
{
    echo "<script> 
    alert('$mensagem');
    location.href = '$pagina';
    </script>";
}

if (count($_POST) > 0) {
    $nome_artista = $_POST["nome_artista"];
    $nome_album = $_POST["nome_album"];
    $nome_musica1 = $_POST["nome_musica"];
    $genero_musica = $_POST["genero_musica"];

    $erro = "";
    if (empty($nome_artista)) {
        $erro = 'preencha o nome do artista';
    }
    if ($erro) {
        echo "<p style='color:red;'>$erro</p>";
    } else {
        $sql = "UPDATE musica SET
    nome_artista='$nome_artista',
    nome_album='$nome_album',
    nome_musica='$nome_musica1',
    genero_musica='$genero_musica' WHERE id_musica='$id'";

        $dados_atualizados = $conexao->query($sql) or die($conexao->error);

        if ($dados_atualizados) {
            alerta("Dados atualizados com sucesso!!!", "pesquisa.php");

        } else {
            die("ERRO:não atualizado $sql");
        }
    }
}


$consulta_musica = "SELECT * FROM musica";
$sql = mysqli_query($conexao, $consulta_musica);

?>