<?php 
include("../conexao.php");

$recid = intval($_GET['id_album']);

mysqli_query($conexao, "DELETE FROM  album WHERE id_album=$recid");

header("location:../../../pesquisa.php");

?>