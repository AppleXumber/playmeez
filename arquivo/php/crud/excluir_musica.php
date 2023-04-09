<?php 
include("../conexao.php");

$recid = intval($_GET['id_musica']);

mysqli_query($conexao, "DELETE FROM  musica WHERE id_musica=$recid");

header("location:../../../pesquisa.php");

?>