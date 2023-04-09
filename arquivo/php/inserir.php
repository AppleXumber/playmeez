<?php

include("conexao.php");

$user = $_POST["user"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$inserir = "INSERT INTO `usuario`(`nome_usuario`, `senha_usuario`, `email_usuario`) VALUES ('$user','$email','$senha')";

$sql = mysqli_query($conexao, $inserir);

?>