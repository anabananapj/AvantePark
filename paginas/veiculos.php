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
        <link rel = "shortcut icon" type = "imagem/x-icon" href = "../img/logo2.png" />
        <!-- CSS -->
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/tableveiculos.css">
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
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                    <p class="texttable" style="margin-top:1rem;margin-left:2.8rem;">Veículos<i style="margin-left:10px;" class="fa-solid fa-car-side"></i></p>
                    <a href="gerenciamento.php">
                    <i style="position:absolute;margin-left:82rem;margin-top:2rem;font-size:3rem;color:0d6efd;" class="bx bxs-share bx-border-circle bx-tada-hover"></i></a>
           
                </div>

                <div id="divBusca" class="divbusca">
                    <input id="search" style="position:absolute;background-color:white;margin-top:3rem;" type="search" class="txtBusca" placeholder="Pesquisar por Placa">
                    <button class="busca" onclick="searchData()" type="submit" style="border-radius:10px;border:none;background-color:#8FBC8F;color:black;position:absolute;margin-top:3.1rem;margin-left:38rem;"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>

                <div class="boxtable3 d-flex justify-content-center ms-5">
                    <div class="scroll">
                        <table class="table table-striped table-bordered table-condensed table-hover" style="margin-left:-0px;" >

                            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Carro</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Tamanho</th>
                    <th scope="col">Vinculacão</th>

                </tr>
            </thead>
            <tdbody>

                            <?php

                            $nome = $_SESSION['nome'];
                            if(!empty($_GET['search']))

                            {
                                $data = $_GET['search'];
                                $query = "SELECT *, clientes.cpf_cliente FROM veiculos LEFT JOIN clientes ON veiculos.placa = clientes.carro_cliente WHERE placa LIKE '%$data%'";

                            }else
                            {
                                $query = "SELECT *, clientes.cpf_cliente FROM veiculos LEFT JOIN clientes ON veiculos.placa = clientes.carro_cliente ";

                                $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");
                                $resultado = pg_fetch_all(pg_query($pgsql_connection, $query));
                            }
                            $resultado = pg_fetch_all(pg_query($pgsql_connection, $query));
                            
                            if (count($resultado)) {
                            foreach ($resultado as $linha) {

                
                            ?>
                            <tr>
                                <td> <?php echo $linha['idveiculo']; ?> </td>
                                <td> <?php echo $linha['placa']; ?> - <?php echo $linha['cor']; ?> </td>
                                <td> <?php echo $linha['modelo']; ?> </td>
                                <td> <?php echo $linha['tamanho']; ?> </td>

                                <td><?php if(isset($linha['cpf_cliente'])){
                                    ?>
                                        <button onclick="vinculacao(
                                        '<?php echo $linha['nome_cliente']?>',
                                        '<?php echo $linha['cpf_cliente']?>')" style="background-color:white;" class="btn btn-primary btn-mensagem2" ><i style="color:black;" class="fa-solid fa-user"></i>
                                        <?php
                                        }else{
                                            echo '<i style="color:red;margin-left:0.5rem;" class="fa-solid fa-user-large-slash"></i>';
                                        }{
                                        ?></button>

                                        
                                    <?php
                                    }
                                    ?>
                                </td>
                                </tr>
                                <?php
                                    } } else {  
                                    ?>
                                    <label class="searchno" style=top:-2rem;">Não foram encontrados resultados.</label>
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
</div>



<?php
    include_once "../modal/modal-vinculacao.php";
 ?>

<script src="../js/veiculos.js"></script>
    </html>


<?php
}
?>