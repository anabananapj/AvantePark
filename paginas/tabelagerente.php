<?php
session_start();
include('../functions/connect.php');
if (!isset($_SESSION['email'])) {


    header('location:index.php');
} else {
?>
    <html>

    <head>
        <!-- IMG -->
        <link rel="shortcut icon" type="imagem/x-icon" href="../img/logo2.png" />
        <!-- CSS -->
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/tablegerente.css">
        <link rel="stylesheet" href="../css/modal.css">
        <link rel="stylesheet" href="../css/vagas.css">
        <!-- ICONS-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' />
        <script src="https://kit.fontawesome.com/b3cc28d3b5.js" crossorigin="anonymous"></script>
        <!-- JS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    

        <title> AvantePark </title>
    </head>

    <body>

        <?php

        include('../includes/header.php');

        ?>

<div class="corpoavante">
    <div class="centro" style="margin-top:15vh;">
        <div class="caixaexcluir">

            <div class="table">
                <p class="texttable" style="margin-top:1rem;">Gerenciamento de Funcionários<img style="position:absolute;width:3rem;margin-left:8px;" src="../img/logo2.png" alt="img"></p>
                <a href="gerenciamento.php">
                <i style="position:absolute;margin-left:82rem;margin-top:2rem;font-size:3rem;color:0d6efd;" class="bx bxs-share bx-border-circle bx-tada-hover"></i></a>
                <p class="exptable">Desative, Ative ou Edite os Funcionários.</p>
            </div>

            <div id="divBusca" class="divbusca">
                <input id="search" style="background-color:white;margin-left:8.5rem;" type="search" class="txtBusca" placeholder="Pesquisar por Nome ou Cargo">
                <button class="busca" onclick="searchData()" type="submit" style="border-radius:10px;border:none;background-color:#8FBC8F;color:black;position:absolute;margin-top:7.3rem;margin-left:45rem;"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>

            <div class="boxtable2 d-flex justify-content-center ms-5">
                    
                    <div class="scroll">
                        <table class="table table-striped table-bordered table-condensed table-hover">

                            <thead class="table-light">
                                <tr>

                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Opções</th>
                                    

                                </tr>
                            </thead>
                            <tdbody>

                <?php

                                    $nome = $_SESSION['nome'];
                                    if (!empty($_GET['search'])) {
                                        $data = $_GET['search'];
                                        $query = "SELECT pessoa_fisica.*, funcionarios.cargo, endereco.* FROM pessoa_fisica INNER JOIN funcionarios ON 
                                        (pessoa_fisica.idpf = funcionarios.funcid) INNER JOIN endereco ON (pessoa_fisica.endereco = endereco.endid) WHERE nome LIKE '%$data%' or cargo LIKE '%$data%' ORDER BY ativo asc, nome asc";
                                    } else {
                                        $query = "SELECT pessoa_fisica.*, funcionarios.cargo, endereco.* FROM pessoa_fisica INNER JOIN funcionarios ON 
                                        (pessoa_fisica.idpf = funcionarios.funcid) INNER JOIN endereco ON (pessoa_fisica.endereco = endereco.endid) ORDER BY ativo asc, nome asc;";

                                        $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");
                                        $resultado = pg_fetch_all(pg_query($pgsql_connection, $query));
                                    }
                                    $resultado = pg_fetch_all(pg_query($pgsql_connection, $query));

                                    if (count($resultado)) {
                                        foreach ($resultado as $linha) {
                                    ?>

                                    <tr>
                                    <td> <?php echo $linha['idpf']; ?> </td>
                                    <td> <?php echo $linha['nome']; ?> </td>
                                    <td> <?php echo $linha['cargo']; ?> </td>
                                    <td>

                                    <button onclick="preencher(
                                    <?php  echo $linha['idpf'] ?>, 
                                    '<?php echo $linha['nome'] ?>', 
                                    '<?php echo $linha['telefone'] ?>',
                                    '<?php echo $linha['nascimento'] ?>' , 
                                    '<?php echo $linha['rua'] ?>' , 
                                    '<?php echo $linha['numero'] ?>', 
                                    '<?php echo $linha['bairro'] ?>'
                                                                    
                                    )" ; style="border:2px solid #4682B4;background-color:#DCDCDC;"class="btn btn-mensagem"><i style="color:#4682B4;" class="fa-solid fa-user-pen"></i></button>

                                
                                    <?php
                                    if($linha['ativo'] == 3){ ?>
                                        
                                        <a href="../ajax/desativar.php?idpf=<?php echo $linha['idpf'] ;?> "><i style="color:#2E8B57;margin-left:1rem;"class="fa-solid fa-toggle-on"></i></a>

                                    <?php
                                    }if($linha['ativo'] == 4){ ?>

                                        <a href="../ajax/ativar.php?idpf=<?php echo $linha['idpf'] ;?>"><i style="margin-left:1rem;color:#B22222;" class="fa-solid fa-toggle-off"></i></a>

                                    <?php

                                    
                                    }if($linha['ativo'] == 1){ ?>

                                        <a href="../ajax/desativar2.php?idpf=<?php echo $linha['idpf'] ;?>"><i style="margin-left:1rem;color:#2E8B57;" class="fa-solid fa-toggle-on"></i></a>
                                        
                                    <?php
                                    }if($linha['ativo'] == 5){ ?>

                                        <a href="../ajax/ativar2.php?idpf=<?php echo $linha['idpf'] ;?>"><i style="margin-left:1rem;color:#B22222;" class="fa-solid fa-toggle-off"></i></a>

                                        
                                    <?php
                                    }
                                    ?>
                                    
                                </td>
                                </tr>
                            
                        <?php
                        }
                        } else {
                            ?>
                            <label style="margin-top:10rem;" class="searchno">Não foram encontrados resultados pelo termo buscado.</label>
                        <?php
                        }
                        ?>
                   

                                    </tdbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   


        <?php
        include_once "../modal/modal-edit-func.php";
        ?>

        <script src="../js/gerenciamento.js"></script>

    </html>



<?php
}
?>