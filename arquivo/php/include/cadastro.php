<?php

function alerta($mensagem, $pagina) {
    echo "<script> 
    alert('$mensagem');
    location.href = '$pagina';
    </script>";
}

if (isset($_POST["user"])) {
    $user = $_POST["user"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);

    $validacao = mysqli_query($conexao, "SELECT * FROM usuario WHERE email_usuario = '$email'");
    $count = mysqli_num_rows($validacao);

    if ($count > 0) {
        die(alerta("Email já cadastrado", "cadastro.php"));
    }

    $id = uniqid();
    $token = password_hash($id, PASSWORD_DEFAULT);

    /* mysqli_query($conexao, "UPDATE token SET validade='0' WHERE email_usuario='$email'"); */

    mysqli_query($conexao, "INSERT INTO token(token_sessao, validade, email_usuario) VALUES ('$token', '1', '$email')");

    mysqli_query($conexao, "INSERT INTO usuario(nome_usuario, senha_usuario, email_usuario) VALUES ('$user','$senha','$email')");

    setcookie("email", $email);
    setcookie("token", $token);

    alerta("Cadastrado com sucesso", "home.php");
}

?>