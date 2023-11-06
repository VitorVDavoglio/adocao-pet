<//?php include('../config/constantes.php'); ?>
<?php 
    //Iniciando a conexão
    session_start();

    //define("PAINELADM",'http://localhost/kbrtec-pets/painel/');
    //Criando constantes para facilitar nas conexões
    define("LOCALHOST","localhost");
    define("DB_USERNAME","root");
    define("DB_PASSWORD","");
    define("DB_NAME","pet_kbrtec");

    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error($conn));
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));

    
?>