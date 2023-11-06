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
   if(isset($_POST['submit'])){
        header("location: http://localhost/kbrtec-pets/pets/index.html");

        //Query para coletar o dado da tabela referente ao filtro selecionado
        $sql2 = "SELECT * FROM pets WHERE porte='$teste'";
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

    <nav aria-label="breadcrumb" class="p-3 ps-5 bg-custom-light">
        <div class="container">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item fs-sm"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active fs-sm" aria-current="page">Quero Adotar</li>
            </ol>
        </div>
    </nav>

    <section>
        <div class="container-fluid">
            <div class="row">
                <aside style="width: 320px;">
                    <form method="" class="bg-custom rounded p-3 text-uppercase pt-4 mt-2 position-sticky" style="top: 1rem;">
                        <div class="mb-3 text-light bowlby-one">
                            Filtros
                        </div>

                        <div class="form-group py-2">
                            <label for="especie" class="text-capitalize text-light">Espécie</label>
                            <select name="especie" id="especie" class="form-control form-select">
                                <option value="" selected disabled>Selecione</option>
                                <?php
                                    //Criando o código para puxar as especies que tem no banco de dados
                                    //Criando o SQL para pegar os que estão ativos
                                    $sql = "SELECT * FROM pets WHERE status_pet='Ativado'";

                                    $res=mysqli_query($conn,$sql);

                                    //contando as linhas para checar se tem especie ou não
                                    $contagem = mysqli_num_rows($res);

                                    //Se a contagem for maior que 0 havera especies cadastradas.
                                    if($contagem > 0){
                                        //há especies cadastradas
                                        while($row=mysqli_fetch_assoc($res)){
                                            //pegando os detalhes da especies
                                            $id = $row["cd_pet"];
                                            $titulo = $row["especie"];
                                            ?>
                                            <option value="<?php echo $id?>"><?php echo $titulo?></option>
                                            <?php
                                        }
                                    } else{
                                        //Se não houver especies
                                        ?>
                                        <option value="" selected disabled>Nenhuma especie</option>
                                        <?php
                                    }
                                ?>
                                
                            </select>
                        </div>

                        <div class="form-group py-2">
                            <label for="raca" class="text-capitalize text-light">Raça</label>
                            <select name="raca" id="raca" class="form-control form-select">
                                <option value="" selected disabled>Selecione</option>
                                <?php
                                    //Criando o código para puxar as raça que tem no banco de dados
                                    //Criando o SQL para pegar os que estão ativos
                                    $sql = "SELECT * FROM pets WHERE status_pet='Ativado'";

                                    $res=mysqli_query($conn,$sql);

                                    //contando as linhas para checar se tem raça ou não
                                    $contagem = mysqli_num_rows($res);

                                    //Se a contagem for maior que 0 havera raça cadastradas.
                                    if($contagem > 0){
                                        //há raça cadastradas
                                        while($row=mysqli_fetch_assoc($res)){
                                            //pegando os detalhes da raça
                                            $id = $row["cd_pet"];
                                            $titulo = $row["raça"];
                                            ?>
                                            <option value="<?php echo $id?>"><?php echo $titulo?></option>
                                            <?php
                                        }
                                    } else{
                                        //Se não houver raça
                                        ?>
                                        <option value="" selected disabled>Nenhuma raça encontrada</option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group py-2">
                            <label for="local" class="text-capitalize text-light">Local</label>
                            <select name="local" id="local" class="form-control form-select">
                                <option value="" selected disabled>Ex:São Paulo</option>
                                <?php
                                    //Criando o código para puxar as localidade que tem no banco de dados
                                    //Criando o SQL para pegar os que estão ativos
                                    $sql = "SELECT * FROM pets WHERE status_pet='Ativado'";

                                    $res=mysqli_query($conn,$sql);

                                    //contando as linhas para checar se tem localidade ou não
                                    $contagem = mysqli_num_rows($res);

                                    //Se a contagem for maior que 0 havera localidade cadastradas.
                                    if($contagem > 0){
                                        //há localidade cadastradas
                                        while($row=mysqli_fetch_assoc($res)){
                                            //pegando os detalhes da localidade
                                            $id = $row["cd_pet"];
                                            $titulo = $row["localidade"];
                                            ?>
                                            <option value="<?php echo $id?>"><?php echo $titulo?></option>
                                            <?php
                                        }
                                    } else{
                                        //Se não houver localidade
                                        ?>
                                        <option value="" selected disabled>Nenhuma localidade encontrado</option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group py-2">
                            <label for="porte" class="text-capitalize text-light">Porte</label>
                            <select name="porte_teste" id="porte_teste" class="form-control form-select">
                                <option value="" selected disabled>Selecione</option>
                                <?php
                                    //Criando o código para puxar as especies que tem no banco de dados
                                    //Criando o SQL para pegar os que estão ativos
                                    $sql = "SELECT * FROM pets WHERE status_pet='Ativado'";

                                    $res=mysqli_query($conn,$sql);

                                    //contando as linhas para checar se tem porte ou não
                                    $contagem = mysqli_num_rows($res);

                                    //Se a contagem for maior que 0 havera porte cadastradas.
                                    if($contagem > 0){
                                        //há porte cadastradas
                                        while($row=mysqli_fetch_assoc($res)){
                                            //pegando os detalhes da porte
                                            $id = $row["cd_pet"];
                                            $titulo = $row["porte"];

                                            //verifica se o porte do animal já foi escrito anteriormente para não repetir
                                            $porte_registrado = [];

                                            //array_key_exists($titulo,$porte_registrado)
                                            //
                                            if(in_array($titulo, $porte_registrado, true) == false){
                                                ?>
                                                    <option value="<?php echo $id?>" name="porte_filtro" id="porte_filtro"><?php echo $titulo?></option>
                                                <?php
                                                $porte_registrado.($titulo);
                                            }
                                            // foreach('$titulo' , $porte_registrado){
                                            //     //verifica se já foi escrita
                                            //     if(!in_array($titulo,$porte_registrado)){
                                            //         
                                            //         $porte_registrado[] = $titulo;
                                            //     }
                                            // }
                                            
                                            
                                        }
                                    } else{
                                        //Se não houver porte
                                        ?>
                                        <option value="" selected disabled>Nenhuma porte encontrado</option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group py-2">
                            <div class="w-100 text-capitalize text-light">Sexo</div>
                            
                            <div class="bg-light p-2 rounded d-flex flex-wrap row-gap-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexo" id="femea" value="">
                                    <label class="form-check-label text-capitalize" for="femea">Fêmea</label>
                                </div>
        
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexo" id="macho" value="">
                                    <label class="form-check-label text-capitalize" for="macho">Macho</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" name="submit" class="btn btn-custom-2 mt-4">Buscar</button>
                        </div>
                    </form>
                </aside>
    
                <main class="bg-light p-4 pb-5 col">
                    <h2 class="h4 py-2 pb-0 text-uppercase m-0 bowlby-one">Quero Adotar</h2>
                    <p class="m-0 pb-2">Conheça os pets disponíveis para adoção</p>
                    <div class="row row-gap-4 mt-4">

                        <?php
                            //Se o boão de filtro for clicado ele será executado soziho
                            if(isset($_POST['submit'])){
                                header("location: http://localhost/kbrtec-pets/pets/index.html");

                                //Query para coletar o dado da tabela referente ao filtro selecionado
                                $sql2 = "SELECT * FROM pets WHERE porte='$teste'";
                            } else {
                                //Query para coletar dados da tabela pets
                                $sql = "SELECT * FROM pets WHERE status_pet='Ativado'";
                                //Executando a query
                                $res = mysqli_query($conn, $sql);

                                //checando
                                if($res == TRUE){
                                    //Contando as linhas da tabela
                                    $cont_linhas = mysqli_num_rows($res);

                                    //checando os numeros de linhas
                                    if ($cont_linhas > 0){
                                        //se houver dado da tabela
                                        while ($linhas = mysqli_fetch_assoc($res)) {
                                            //vai rodar até o numero de linhas final da tabela
                                            $id = $linhas['cd_pet'];
                                            $nome = $linhas['nome_pet'];
                                            $localidade = $linhas['localidade'];

                                            //Mostrando os valores na tabela listagem
                                            ?>
                                                <div class="col-xxl-3 col-4">
                                                    <div class="card rounded overflow-hidden">
                                                        <a href="integra.php">
                                                            <img src="img/tini.webp" alt="" class="w-100 object-fit-cover" height="320">
                                                        </a>

                                                        <div class="p-3">
                                                            <p class="m-0 fs-sm">Cód. <?php echo $id ?></p>

                                                            <div class="d-flex align-items-center gap-2 mt-2 py-2">
                                                                <h3 class="h4 m-0"><?php echo $nome; ?></h3>
                                                            </div>

                                                            <p class="mb-4 fs-md">Petz <?php echo $localidade ?></p>

                                                            <a href="integra.php?id=<?php echo $id; ?>&nome=<?php echo $nome; ?>" class="btn btn-custom-2 d-flex align-items-center justify-content-center gap-2 w-100">
                                                                Quero Adotar

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php                                    
                                        }
                                    }
                                }
                            }
                        ?>
                    </div>

                    <nav class="mt-5">
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link btn-custom" href="#">Anterior</a></li>
                            <li class="page-item"><a class="page-link btn-custom" href="#">1</a></li>
                            <li class="page-item"><a class="page-link btn-custom" href="#">2</a></li>
                            <li class="page-item"><a class="page-link btn-custom" href="#">3</a></li>
                            <li class="page-item"><a class="page-link btn-custom" href="#">Próximo</a></li>
                        </ul>
                    </nav>
                </main>
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