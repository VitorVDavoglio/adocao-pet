<//?php include('../config/autenticacao.php'); ?>
<?php
    //NÃO PODE SER NA CONSTANTE POIS ELA ESTÁ SENDO USADA NA PÁGINA DE LOGIN TAMBÉM.
    //Autorização - Controle de acesso
    //checa se o admin está logado ou não
    if(!isset($_SESSION['user'])){
        //admin não está logado
        //redirecionando para o login com a mensagem
        $_SESSION['login-n-realizado'] = "Por favor faça o login corretamente";
        //redirecionado o admin
        header("location: login.php");
    }
?>