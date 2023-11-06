<!DOCTYPE html>
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
</head>

<?php include('../config/constantes.php'); ?>
<?php 
    //Pegando o nome do animal da página selecionada anteriormente
    $id = $_GET['id'];

    //criando a query para pegar os detalhes
    $sql="SELECT * FROM pets WHERE cd_pet = $id";

    //EXECUTANDO A QUERY
    $res=mysqli_query($conn,$sql);

    if($res==TRUE){
        //checando se o dado é positivo ou não
        $contagem = mysqli_num_rows($res);

        //checando se o admin tem dado ou não
        if($contagem==1){
            //coletar os dados
            $row = mysqli_fetch_assoc($res);

            $nome_pet = $row['nome_pet'];
            $especie = $row['especie'];
            $raca = $row['raça'];
            $idade = $row['idade'];
            $peso = $row['peso'];
            $porte = $row['porte'];
            $localidade = $row['localidade'];
            $sobre = $row['sobre'];
            $status_pet = $row['status_pet'];
        } else {
            //rediricionando para a listagem admin
            //header("location: http://localhost/kbrtec-pets/painel/painel-admin.php");
        }
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
                <li class="breadcrumb-item active fs-sm" aria-current="page"><?php  echo $nome_pet; ?></li>
            </ol>
        </div>
    </nav>



    <section class="bg-light py-5">
        <div class="container mb-5">
            <div class="row align-items-start">
                <div class="col-8 d-flex">
                    <div class="col-3 d-flex flex-wrap row-gap-3">
                        <div class="col-12 rounded overflow-hidden">
                            <img src="img/tini-2.webp" alt="Tini" class="object-fit-cover w-100" height="120">
                        </div>

                        <div class="col-12 rounded overflow-hidden">
                            <img src="img/tini-3.webp" alt="Tini" class="object-fit-cover w-100" height="120">
                        </div>

                        <div class="col-12 rounded overflow-hidden">
                            <img src="img/tini-4.webp" alt="Tini" class="object-fit-cover w-100" height="120">
                        </div>

                        <div class="col-12 rounded overflow-hidden">
                            <img src="img/tini-5.webp" alt="Tini" class="object-fit-cover w-100" height="120">
                        </div>
                    </div>

                    <div class="col-9 rounded overflow-hidden">
                        <img src="img/tini.webp" alt="Tini" class="object-fit-cover w-100 ms-3" height="530">
                    </div>
                </div>
                
                <div class="py-3 col-4 d-flex flex-wrap row-gap-3">                   
                    <h2 class="col-12 d-flex align-items-center gap-2">
                        <?php  echo $nome_pet; ?>
                    </h2>

                    <div class="col-12">
                        <h3 class="fs-sm destaque m-0">Código</h3> 
                        <div><?php  echo $id; ?></div>
                    </div>

                    <div class="col-6">
                        <h3 class="fs-sm destaque m-0">Espécie</h3> 
                        <div><?php echo $especie; ?></div>
                    </div>

                    <div class="col-6">
                        <h3 class="fs-sm destaque m-0">Porte</h3> 
                        <div><?php echo $porte; ?></div>
                    </div>

                    <div class="col-12">
                        <h3 class="fs-sm destaque m-0">Raça</h3> 
                        <div><?php echo $raca; ?></div>
                    </div>

                    <div class="col-6">
                        <h3 class="fs-sm destaque m-0">Peso</h3> 
                        <div><?php echo $peso; ?> Kg</div>
                    </div>

                    <div class="col-6">
                        <h3 class="fs-sm destaque m-0">Idade</h3> 
                        <div><?php echo $idade; ?> anos</div>
                    </div>

                    <div class="col-12">
                        <h3 class="fs-sm destaque m-0">Local</h3> 
                        <div><?php echo $localidade; ?></div>
                    </div>
                    
                    <div class="col-12">
                        <h3 class="fs-sm destaque m-0">Sobre</h3> 
                        <div><?php echo $sobre; ?></div>
                    </div>

                    <div class="col-12">
                        <a href="formulario.php?id=<?php  echo $id; ?>&nome=<?php  echo $nome_pet; ?>" class="btn btn-custom mt-5 w-100 d-flex align-items-center justify-content-center gap-2">
                            Solicitar adoção

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
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