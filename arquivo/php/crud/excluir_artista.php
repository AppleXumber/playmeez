<?php 
include("../conexao.php");

$recid = intval($_GET['id_artista']);

mysqli_query($conexao, "DELETE FROM artista WHERE id_artista=$recid");

header("location:../../../pesquisa.php");

?>