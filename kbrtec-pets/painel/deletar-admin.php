<?php include('../config/constantes.php'); ?>
<?php
    //coletando o id do admin
    $id = $_GET['id'];

    //criando a query para deletar o admin
    $sql = "DELETE FROM admins WHERE cd_admin=$id";

    //Executando a query
    $res = mysqli_query($conn, $sql);

    //checando se ocorreu tudo ok
    if($res==true){
        //echo "Admin foi deletado";
        header("location: http://localhost/kbrtec-pets/painel/painel-admin.php");

    } else{ 
        echo "Falha ao deletar admin";
    }
?>