<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KBRTEC ADMIN</title>

    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>

<?php 
    //Inclusão parametros server                Inclusão autenticador login
    include('../config/constantes.php'); include('../config/autenticacao.php'); 
?>

<?php
    $nome_admin_head = $_GET['nome_admin_head'];
    //Mostrando a mensagem que o admin foi adicionado com sucesso
    if(isset($_SESSION['add_pet'])){
        echo $_SESSION['add_pet'];
        //echo $_SESSION['id_pet'];
        unset($_SESSION['add_pet']);
    }

    if(isset($_SESSION['upload'])){
        echo $_SESSION['upload'];
        //echo $_SESSION['id_pet'];
        unset($_SESSION['upload']);
    }

?>

<?php
    //Processo de transferencia de dados do forms para o banco de dados
    if(isset($_POST['submit'])){

        //1.Pegando os dados inseridos
        $nome = $_POST['nome'];
        $especie = $_POST['especie'];
        $raca = $_POST['raca'];
        $idade = $_POST['idade'];
        $peso = $_POST['peso'];
        $porte = $_POST['porte'];
        $localidade = $_POST['localidade'];
        $sobre = $_POST['sobre'];
        $status_pet = $_POST['status_pet'];
        //CADASTRAR AS FOTOS

        // if(isset($_FILES['fotos']['name'])){
        //     //pega o detalhe da imagem selecionada
        //     $nome_imagem = $_FILES['fotos']['name'];

        //     //checa se a imagem foi selecionada ou nao e manda se estiver
        //     if($nome_imagem != ""){
        //         //imagem está selecionada
        //         //Renomeando a imagem
        //         //Pegando a extensão da imagem apenas
        //         $ext = end(explode('.', $nome_imagem));

        //         //Criando um nome para a imagem
        //         $nome_imagem = "Pet".rand(0,5).".".$ext;

        //         //Enviando a imagem
        //         //a URL da imagem
        //         $src = $_FILES['fotos']['tmp_name'];

        //         //URL de destino da imagem a ser salva
        //         $destino = "../pets/pets_img/".$nome_imagem;

        //         //enviando a foto do pet
        //         $enviar = move_uploaded_file($src, $destino);
        //         echo "no espaço da foto";

        //         //checando se a imagem foi enviada ou nao
        //         if($enviar == false){
        //             //falhou em enviar a imagem
        //             //redirecionando para a pagina atual e avisando
        //             $_SESSION['upload'] = "falha em enviar a foto";
        //             header('location: http://localhost/kbrtec-pets/painel/cadastrar-pet.php');
        //             die();
        //         }
        //     }

        // } else {
        //     $nome_imagem = '';
        // }

        $sql = "INSERT INTO pets SET
            nome_pet='$nome', especie='$especie', raça='$raca',idade='$idade',peso='$peso',
            porte='$porte',localidade='$localidade',sobre='$sobre',status_pet='$status_pet'
        ";

        //3. Executando a solicitação da query e inserindo na tabela
        $res = mysqli_query($conn, $sql);

        //depois de adicionar na tabela pets, agora é pegar o id criado e passar para a tabela de fotos
        //criando a quert para pegar o id do ultimo pet inserido na tabela
        $sql = "SELECT cd_pet FROM pets ORDER BY cd_pet DESC LIMIT 1;";

        //EXECUTANDO A QUERY
        $res=mysqli_query($conn,$sql);

        $id_pet = mysqli_fetch_column($res);

        
        echo "Pet inserido com sucesso";
        


        // //4. checando onde foi inserido os dados e mandando a mensagem correta
        // if($res == TRUE){
        //     //Redirecionando a página
        //     $_SESSION['add_pet'] = 'O pet foi inserido com sucesso';
        //     $_SESSION['id_pet'] = $id_pet;
        //     header("location: http://localhost/kbrtec-pets/painel/painel-pet.php");
        // }else{
        //  //Redirecionando a página
        //     $_SESSION["add_pet"] = "O pet não pode ser adicionado no banco de dados";
        //     header("location: http://localhost/kbrtec-pets/painel/cadastar-pet.php");
        // }

        

    }
?>

<body class="bg-dark h-100">
    <header class="bg-light py-2 shadow">
        <div class="container-fluid">
            <div class="row">
                <div style="width: 250px;">
                    <img src="img/kbrtec.webp" alt="KBRTEC" height="60" width="150" class="object-fit-contain">
                </div>

                <div class="col dropdown d-flex align-items-center justify-content-end">
                    <div class="d-flex align-items-center dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Bem vindo <?php echo $nome_admin_head; ?>!
    
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill ms-2" viewBox="0 0 16 16">
                            <path fill="#6c757D"  d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                        </svg>
                    </div>

                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item text-end" href="#">
                                <small>Alterar Senha</small>
                            </a>
                            <a class="dropdown-item text-end" href="login.php">
                                <small>Sair</small>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="d-flex" style="min-height: calc(100vh - 76px - 72px);">
        <aside class="bg-custom text-light py-4" style="width: 250px;">
            <div class="menu">
                <div class="item">
                    <div class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 border-start border-light border-4" type="button" data-bs-toggle="collapse" data-bs-target="#menu-usuario" aria-expanded="true" aria-controls="menu-usuario">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                        </svg>
    
                        Usuários
                    </div>

                    <div class="collapse show" id="menu-usuario">
                        <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
                            <a href="cadastrar-admin.php?nome_admin_head=<?php  echo $nome_admin_head; ?>" class="submenu-link link-light text-decoration-none rounded p-2 active">
                                <small class="d-flex justify-content-between align-items-center">
                                    Cadastrar
                                        
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </small>
                            </a>
                            <a href="painel-admin.php?nome_admin_head=<?php  echo $nome_admin_head; ?>" class="submenu-link link-light text-decoration-none rounded p-2">
                                <small class="d-flex justify-content-between align-items-center">
                                    Listagem
                                </small>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 border-start border-light border-4" type="button" data-bs-toggle="collapse" data-bs-target="#menu-usuario" aria-expanded="true" aria-controls="menu-usuario">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                        </svg>
    
                        Pets
                    </div>

                    <div class="collapse show" id="menu-usuario">
                        <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
                            <a href="cadastrar-pet.php?nome_admin_head=<?php  echo $nome_admin_head; ?>" class="submenu-link link-light text-decoration-none rounded p-2">
                                <small class="d-flex justify-content-between align-items-center">
                                    Cadastrar
                                </small>
                            </a>
                            <a href="painel-pet.php?nome_admin_head=<?php  echo $nome_admin_head; ?>" class="submenu-link link-light text-decoration-none rounded p-2 active">
                                <small class="d-flex justify-content-between align-items-center">
                                    Listagem
    
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </small>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 border-start border-light border-4" type="button" data-bs-toggle="collapse" data-bs-target="#menu-usuario" aria-expanded="true" aria-controls="menu-usuario">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                        </svg>
                        Pedidos
                    </div>

                    <div class="collapse show" id="menu-usuario">
                        <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
                            <a href="painel-solic.php?nome_admin_head=<?php  echo $nome_admin_head; ?>" class="submenu-link link-light text-decoration-none rounded p-2 active">
                                <small class="d-flex justify-content-between align-items-center">
                                    Solicitações
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </small>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="login.php" class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 ms-1 icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(-.125rem, 0, 0);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg>

                    Sair
                </a>
            </div>
        </aside>

        <main class="col h-100 text-light p-4">
            <div class="d-flex align-items-end justify-content-between mb-4">
                <h1 class="h3">Cadastrar Pets</h1>

                <a href="painel-pet.php?nome_admin_head=<?php  echo $nome_admin_head; ?>" class="btn btn-light">Voltar</a>
            </div>

            <form action="" class="bg-custom rounded col-12 py-3 px-4" method="POST">
                
                <div class="mb-3 row">
                    <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="nome" name="nome" placeholder="Ex: Rex" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="especie" class="col-sm-2 col-form-label">Espécie:</label>
                    <div class="col-sm-10">
                        <select class="form-control bg-dark text-light border-dark" name="especie" id="especie" required>
                            <option value="" disabled selected>Selecione</option>    
                            <option value="Cachorro">Cachorro</option>
                            <option value="Gato">Gato</option>
                            <option value="Coelho">Coelho</option>
                            <option value="Tartaruga">Tartaruga</option>
                            <option value="Hamster">Hamster</option>
                            <option value="Porquinho-da-índia">Porquinho-da-índia</option>
                        </select>
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="raca" class="col-sm-2 col-form-label">Raça:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="raca" name="raca" placeholder="Ex: Dalmata" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="idade" class="col-sm-2 col-form-label">Idade:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="idade" name="idade" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="peso" class="col-sm-2 col-form-label">Peso:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control bg-dark text-light border-dark" id="peso" name="peso" placeholder="Ex: 10.520" step=".01">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="porte" class="col-sm-2 col-form-label">Porte:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="porte" name="porte" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="local" class="col-sm-2 col-form-label">Local:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="localidade" name="localidade" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="sobre" class="col-sm-2 col-form-label">Sobre:</label>
                    <div class="col-sm-10">
                        <input type="description" class="form-control bg-dark text-light border-dark" id="sobre" name="sobre">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Status:</label>
                    <div class="col-10">
                        <select id="status_pet" name="status_pet" class="form-control bg-dark text-light border-dark form-select" id="status" required>
                            <option value="" >Desativado</option>
                            <option value="Ativado">Ativado</option>
                            <option value="Desativado">Desativado</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="fotos" class="col-sm-2 col-form-label">Selecione as fotos:</label>
                    <div class="col-sm-10">
                        <input type="file" id ="fotos" name="fotos[]" class="form-control bg-dark text-light border-dark" id="foto" name="foto" multiple accept="image/*" required>
                    </div>
                </div>
                

                <div class="d-flex justify-content-end">
                    <button type="submit" name="submit" class="btn btn-light">Cadastrar</button>
                </div>
            </form>

            <div class="bg-custom rounded overflow-hidden">

            </div>
        </main>
    </div>

    <footer class="bg-custom text-light text-center py-4">
        <small>© Copyright 2023 - KBR TEC - Todos os Direitos Reservados</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>