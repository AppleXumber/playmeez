<?php
include_once("arquivo/php/conexao.php");

if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["comentario"])) {
    @$nome = $_POST["nome"];
    @$email = $_POST["email"];
    @$comentario = $_POST["comentario"];
    
    if ($query = mysqli_query($conexao, "INSERT INTO contato(nome, email, comentario) VALUES ('$nome', '$email', '$comentario')")) {
        ?>
        <script>
            alert("Obrigado pelo seu comentário!");
            </script>
        <?php
        header("location:home.php");
    };
}



?>