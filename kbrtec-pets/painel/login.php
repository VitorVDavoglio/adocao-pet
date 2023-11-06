<?php include('../config/constantes.php'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KBRTEC ADMIN</title>

    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="bg-dark">
    <main class="py-5" style="min-height: calc(100vh - 72px);">
        <div class="container">
            <div class="bg-custom mx-auto row col-8 rounded shadow-sm overflow-hidden">
                <div class="col-6 bg-white p-5 d-flex align-items-center justify-content-center">
                    <img src="img/kbrtec.webp" alt="KBRTEC" height="200" width="200" class="object-fit-contain">
                </div>
    
                <div class="col-6 d-flex align-items-center p-5">
                    <form action="" class="form w-100" method="POST">
                        <h2 class="h4 text-light mb-4">Painel Administrativo PHP</h2>
                        <div class="row row-gap-3">
                            <div class="col-12 form-group text-light">
                                <label for="email">E-mail:</label>
                                <input type="email" class="form-control bg-dark border-dark text-light" id="email" name="email" placeholder="example@kbrtec.com.br">
                                <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->
                            </div>
    
                            <div class="col-12 form-group text-light">
                                <label for="password">Senha:</label>
                                <input type="password" class="form-control bg-dark border-dark text-light" id="password" name="password">
                                <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->
    
                                <a href="recuperar-senha.html" class="link-light"><small>Esqueci minha senha</small></a>
                            </div>
    
                            <div class="col-12">
                                <button type="submit" name="submit" class="btn btn-light mt-3">Entrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-custom text-light text-center py-4">
        <small>© Copyright 2023 - KBR TEC - Todos os Direitos Reservados</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

<?php

    //checando se o botão submit foi clicado
    if(isset($_POST["submit"])) {

        $email_pre_definido = 'admin@gmail.com';
        $senha_pre_definida = 'admin';

        $email_dois = $_POST['email'];
        $senha_dois = $_POST['password'];

        if($email_dois == $email_pre_definido & $senha_dois==$senha_pre_definida){
            $nome_admin_head = 'admin';
            header("location: painel-admin.php?nome_admin_head=$nome_admin_head");
        }else{
            //pegando os dados digitados
            $email = $_POST['email'];
            $senha = $_POST['password'];

            //query do sql para ver se o email e senha existem no banco de dados
            $sql = "SELECT * FROM admins WHERE e_mail_admin = '$email' AND senha_admin = '$senha'";

            //executando a query
            $res = mysqli_query($conn,$sql);

            //Puzando a coluna do admin fazendo o login
            $contagem = mysqli_num_rows($res);
            

            if($contagem == 1) {
                //pegando o nome do admin para mostrar nas outras páginas
                $row = mysqli_fetch_assoc($res);
                
                $nome_admin_head = $row['nome_admin'];

                //usuario logado com sucesso
                $_SESSION['login'] = 'login feito com succeso';
                $_SESSION['user'] = $email;

                header("location: painel-admin.php?nome_admin_head=$nome_admin_head");

            } else { 

                //erro ao logar
                echo "erro ao logar";
            }
        }
    } else {
    }
?>