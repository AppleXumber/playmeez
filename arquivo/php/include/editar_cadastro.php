<?php

function alerta($mensagem, $pagina) {
    echo "<script> 
    alert('$mensagem');
    location.href = '$pagina';
    </script>";
}

if (isset($_POST["user"]) && isset($_POST["email"])) {
    $validacao = mysqli_query($conexao, "SELECT * FROM usuario WHERE email_usuario = '$email'");

    $user = $_POST["user"];
    $email = $_POST["email"];

    $dadosBD = mysqli_fetch_assoc($validacao);
    $idUserBD = $dadosBD["id_usuario"];

    $count = mysqli_num_rows($validacao);

    if ($count > 1) {
        die(alerta("Email já cadastrado", "editar_cadastro.php"));
    }

    $id = uniqid();
    $token = password_hash($id, PASSWORD_DEFAULT);

    /* mysqli_query($conexao, "UPDATE token SET validade='0' WHERE email_usuario='$email'"); */

    mysqli_query($conexao, "INSERT INTO token(token_sessao, validade, email_usuario) VALUES ('$token', '1', '$email')");

    mysqli_query($conexao, "UPDATE usuario SET nome_usuario='$user', email_usuario='$email' WHERE id_usuario='$idUserBD'");

    setcookie("email", $email);
    setcookie("token", $token);

    alerta("Alterado com sucesso", "home.php");
    
}

?>