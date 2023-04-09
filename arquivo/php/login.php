<?php

function alerta($mensagem, $pagina) {
    echo "<script> 
    alert('$mensagem');
    location.href = '$pagina';
    </script>";
}

/* function limpaCookie(){
    setcookie("email");
    setcookie("senha");
    header("location:login.php");
} */ 

function limpaCookie() {
    setcookie("email");
    setcookie("token");
    /* header("location:login.php"); */
}

function alertaLimpaCookie($mensagem, $pagina) {
    limpaCookie();
    echo "<script> 
    alert('$mensagem');
    location.href = '$pagina';
    </script>";
}


if (isset($_POST['email'])) {
    include_once("arquivo/php/conexao.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];    

    $query = mysqli_query($conexao, "SELECT * FROM usuario WHERE email_usuario = '$email'");
    $count = mysqli_num_rows($query);

    $dados = mysqli_fetch_assoc($query);

    if ($count == 1) {
        if (@$dados["senha_usuario"] == md5($senha)) {
            $id = uniqid();
            $token = password_hash($id, PASSWORD_DEFAULT);

            mysqli_query($conexao, "INSERT INTO token(`token_sessao`, `validade`, `email_usuario`), VALUES ('$token', '1', '$email')");

            setcookie("email", $email); // Seta o cookie usuario
            setcookie("token", $token); // Seta o cookie token  

            alerta("Login realizado com sucesso", "home.php");
        } else {
            alertaLimpaCookie("Login não realizado, as senhas não conferem", "login.php");
        }
    } else {
        alertaLimpaCookie("Usuario não existente no banco de dados", "login.php");
    }
}

?>