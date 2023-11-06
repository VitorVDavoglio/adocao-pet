<?php include('../config/constantes.php'); ?>
<?php
    //coletando o id do pet
    $id = $_GET['id'];

    //criando a query para deletar o pet
    $sql = "DELETE FROM pets WHERE cd_pet=$id";

    //Executando a query
    $res = mysqli_query($conn, $sql);

    //checando se ocorreu tudo ok
    if($res==true){
        //echo "pet foi deletado";
        header("location: http://localhost/kbrtec-pets/painel/painel-pet.php");

    } else{ 
        echo "Falha ao deletar pet";
    }
?>