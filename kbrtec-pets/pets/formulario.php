<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KBRTEC PETS</title>

    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One&family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function validarRecap(){
            if(grecaptcha.getResponse() != "") {
                alert('Marcado');
                <?php
                    $valid_recap = true;
                ?>
            }else{
                alert('Selecione a caixa de não sou um robô');
                <?php
                    $valid_recap = false;
                ?>
            }
        }
    </script>
</head>

<?php include('../config/constantes.php'); ?>

<?php 
    //PEGANDO NOME DO ANIMAL DA PÁGINA QUERO-ADOTAR
    $id = $_GET['id'];
    $nome = $_GET['nome'];
    //Processo de trasferencia de dados do forms para o banco de dados
    if(isset($_POST['submit']) && $valid_recap==true) {
        //transformando a data
        $nascimento = $_POST['nascimento'];
        $resultado_nasc = explode('/', $nascimento);
        $dia = $resultado_nasc[0];
        $mes = $resultado_nasc[1];
        $ano = $resultado_nasc[2];
        $nova_data = $ano.'/'.$mes.'/'.$dia;
        
        //1. Pegando os dados inseridos 
        $solicitante = $_POST['solicitante'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $cel = $_POST['cel'];

        //2. montando a solicitação dos dados a serem inseridos no banco de dados
        $sql = "INSERT INTO solicitacao SET 
            nome_solic='$solicitante', nome_pet='$nome', cpf='$cpf', e_mail_solic='$email', cel_solic='$cel', data_nasc='$nova_data', data_solic=now()
        ";
        //3. Executando a solicitação da query e inserindo na tabela
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        //4. checando onde foi inserido os dados e mandando a mensagem correta
        if($res == TRUE){
            $_SESSION['manda_solic'] = "<div m-0 bowlby-one text-uppercase h5 text-center'>'Solicitação Registrada com sucesso';</div>";
            header("location: http://localhost/kbrtec-pets/pets/quero-adotar.php");
        }else{
        //Redirecionando a página
            $_SESSION['manda_solic'] = 'Solicitação não foi registrada';
            header("location: http://localhost/kbrtec-pets/pets/formulario.php");
        }
    }
    //Quando esta aqui a session ela funciona
    //$_SESSION['manda_solic'] = "<div m-0 bowlby-one text-uppercase h5 text-center'>'Solicitação Registrada com sucesso';</div>";
?>

<?php
    if(isset($_SESSION['manda_solic'])){
        echo $_SESSION['manda_solic'];
        unset($_SESSION['manda_solic']);
    }

?>

<body>
    <header class="border-bottom-1 shadow py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-4">
                    <a href="index.html" title="KBR TEC" class="d-inline-block">
                        <h1>
                            <img src="img/logo.webp" alt="KBR TEC" width="150">
                        </h1>
                    </a>
                </div>

                <div class="col-8">
                    <nav class="d-flex gap-4 align-items-center justify-content-end">
                        <a href="index.html">Home</a>
                        <a href="quero-adotar.php">Quero Adotar</a>
                        <a href="../painel/login.php" class="btn btn-custom">Admin</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <nav aria-label="breadcrumb" class="p-3 bg-custom-light">
        <div class="container">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item fs-sm"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item fs-sm"><a href="quero-adotar.php">Quero Adotar</a></li>
                <li class="breadcrumb-item fs-sm"><a href="integra.php?id=<?php  echo $id; ?>&nome=<?php  echo $nome; ?>"><?php  echo $nome; ?></a></li>
                <li class="breadcrumb-item active fs-sm" aria-current="page">Formulário de Solicitação</li>
            </ol>
        </div>
    </nav>

    <section class="bg-light py-5">
        <div class="container mb-5">
            <h2 class="m-0 bowlby-one text-uppercase h5 text-center">Solicitação de adoção</h2>

            <p class="text-center">Preencha aqui os dados da pessoa interessada em adotar o animal selecionado:</p>

            <form action="" class="bg-custom rounded p-4 mt-4 col-6 mx-auto row" method="POST" onsubmit="return validarRecap()">
                <div class="form-group py-2 col-12">
                    <label for="solicitante" class="text-capitalize text-light">Seu nome:</label>
                    <input type="text" class="form-control" name="solicitante" id="solicitante" required>
                </div>

                <div class="form-group py-2 col-12">
                    <label for="animal" class="text-capitalize text-light">Nome <span class="text-lowercase">do</span> animal:</label>
                    <input type="text" class="form-control" name="animal" id="animal" value="<?php echo $nome; ?>" disabled>
                </div>

                <div class="form-group py-2 col-6">
                    <label for="cpf" class="text-capitalize text-light">CPF:</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" placeholder="11 caracteres" pattern="[0-9]{11}" required>
                </div>

                <div class="form-group py-2 col-6">
                    <label for="email" class="text-capitalize text-light">E-mail:</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>

                <div class="form-group py-2 col-6">
                    <label for="cel" class="text-capitalize text-light">Celular:</label>
                    <input type="tel" class="form-control" name="cel" id="cel" required>
                </div>

                <div class="form-group py-2 col-6">
                    <label for="nascimento" class="text-capitalize text-light">Data <span class="text-lowercase">de</span> Nascimento:</label>
                    <input type="text" class="form-control" name="nascimento" id="nascimento" placeholder="01/01/2000" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" required > 
                </div>

                <div class="col-12 d-flex justify-content-center mt-4">
                    <div class="g-recaptcha" data-sitekey="6LfHTfkoAAAAALBrCg_ehBq1ZUWzV_WNow_AUMsu" required></div>
                </div>

                <div class="col-12 d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-custom-2" id ="submit" name="submit">Solicitar</button>
                </div>

            </form>
        </div>
    </section>

    <section class="bg-custom py-3" style="background-color: #FFECCE;">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center gap-3">
                <div class="d-flex flex-column align-items-end">
                    <h2 class="bowlby-one text-uppercase h4 m-0">Alguma dúvida?</h2>

                    <a href="#" class="btn btn-custom">Entre em contato</a>
                </div>
                <img src="img/cartoon-cat-3.webp" alt="Gato" width="150">
            </div>
        </div>
    </section>

    <footer class="py-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <p class="m-0">
                    Copyright © 2023. Todos os direitos reservados
                </p>

                <a href="https://www.kbrtec.com.br/" target="_blank" title="Acesse o site da KBR TEC">
                    <img src="img/kbrtec.webp" alt="KBRTEC" width="100">
                </a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>