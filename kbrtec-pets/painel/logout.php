<?php
    include('../config/constantes.php');
    //encerra a sessão e desativa o login feito
    session_destroy();

    //manda para pagina login
    header('location: login.php');
?>