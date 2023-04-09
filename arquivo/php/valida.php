<?php

include("arquivo/php/conexao.php");

function limpaCookie() {
    if (isset($_COOKIE["token"])) {
        $conexao = mysqli_connect("localhost", "root", "", "playmeez");
        $tokenCookie = $_COOKIE["token"];
        $queryLimpaToken = mysqli_query($conexao, "UPDATE token SET validade='0' WHERE token_sessao='$tokenCookie'");
    }
    
    setcookie("email");
    setcookie("token");
}

function alertaLimpaCookie($mensagem, $pagina) {
    limpaCookie();
    echo "<script> 
    alert('$mensagem');
    location.href = '$pagina';
    </script>";
}

if (isset($_COOKIE["email"]) && isset($_COOKIE["token"])) {
    $email = $_COOKIE["email"];
    $token = $_COOKIE["token"];
}

if (!(empty($email)) or !empty($token)) {
    $sql = "SELECT * FROM usuario WHERE email_usuario='$email'";
    $query = mysqli_query($conexao, $sql);

    $validaToken = "SELECT * FROM token WHERE token_sessao='$token' AND validade='1' AND email_usuario='$email'";
    $queryToken = mysqli_query($conexao, $validaToken);

    $tokenBD = mysqli_fetch_assoc($queryToken);

    $rows = mysqli_num_rows($query);

    if ($rows == 1) {
        $dados = mysqli_fetch_assoc($query);

        if ($token != $tokenBD["token_sessao"]) {
            alertaLimpaCookie("Senha incorreta", "login.php");
            exit;
        }
    } else {
        alertaLimpaCookie("Você não efetuou login", "login.php");
        exit;
    }
} else {
    alertaLimpaCookie("Você não efetuou login", "login.php");
    exit;
}

?>