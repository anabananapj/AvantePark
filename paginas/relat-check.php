<?php
session_start();
if (!isset($_SESSION['email'])) {
header('location:index.php');
} else {
?>

<?php
require_once('../functions/connect.php');

?>

<html>

<head>
        <!-- IMG -->
        <link rel = "shortcut icon" type = "imagem/x-icon" href = "../img/logo2.png" />
        <!-- CSS -->
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/tablerelatorios.css">
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
                    <p class="texttable" style="margin-top:2.5rem;">Relatórios de Check-In e Check-Out<img style="position:absolute;width:3rem;margin-left:8px;" src="../img/logo2.png" alt="img"></p>
                 <p style="color:white;">.</p>
                </div>

                <div id="divBusca" class="divbusca">
                    <input id="search" style="position:absolute;background-color:white;margin-top:4rem;margin-left:8.5rem;" type="search" class="txtBusca" placeholder="Pesquisar por Placa">
                    <button class="busca" onclick="searchrelat()" type="submit" style="border-radius:10px;border:noe;background-color:#8FBC8F;color:black;position:absolute;margin-top:4.1rem;margin-left:44rem;"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>

            <table class="table table-striped table-bordered table-condensed table-hover"  >
        </div>
        <div>

        <thead>
        <tr>
        <th>Modelo - Cor</th>
        <th>Placa</th>
        <th>Hora e Data de Entrada</th>
        <th>Hora e Data de Saída</th>
        <th>Total Pagamento</th>
        <th>Vaga</th>
        <th>Manobrista</th>
        <th>Status</th>
        <th>Motivo</th>
        

        </tr>
        </thead>
        <tdbody>


        <?php

            if(!empty($_GET['search']))
            {
                $data = $_GET['search'];
                $query = "SELECT *, checkin.vaga FROM veiculos INNER JOIN checkin ON (veiculos.idveiculo = checkin.idveiculo) LEFT JOIN cancelamentos on (cancelamentos.id_vehicle = checkin.idveiculo) WHERE placa LIKE '%$data%'"; 
            }else{
                $query = "SELECT *, checkin.vaga FROM veiculos INNER JOIN checkin ON (veiculos.idveiculo = checkin.idveiculo) LEFT JOIN cancelamentos on (cancelamentos.id_vehicle = checkin.idveiculo)"; 
            }
            $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");
            $resultado = pg_fetch_all(pg_query($pgsql_connection, $query));

            if (count($resultado)) {
            foreach ($resultado as $linha){ 
                $id_vaga = $linha['vaga'];
                $vaga = pg_fetch_assoc(pg_query($pgsql_connection, "SELECT * FROM vagas WHERE id_vaga = $id_vaga"));

        ?>
        <tr>
        <td> <?php echo $linha ['modelo']; ?> - <?php echo $linha['cor']; ?> </td>
        <td> <?php echo $linha ['placa']?></td>
        <td> <?php echo $linha ['horaentrada']; ?> - <?php echo $linha['dataentrada']; ?> </td>
        <td> <?php echo $linha ['horasaida']; ?> - <?php echo $linha['datasaida']; ?> </td>
        <td> <?php echo $linha ['totalpag'] ?> - <?php echo $linha['metodopag'] ?></td>
        <td> <?php echo $vaga  ['setor'].$vaga['vaga']; ?></td>
        <td> <?php echo $linha ['manobrista']?></td>
        

        <?php

        if($linha['stats'] == 'Estacionado'){

            echo'<td style="font-family:Raleway;color:black;background-color:#FC2D26;">'.$linha ["stats"].'</td>';

        }if($linha['stats'] == 'Finalizado'){  

            echo'<td style="font-family:Raleway;color:black;background-color:#8FBC8F;">'.$linha ["stats"].'</td>';

        }if($linha['stats'] == 'Cancelado'){

            echo'<td style="font-family:Raleway;color:black;background-color:#F8DD41;">'.$linha ["stats"].'</td>';

        }

        ?>

        <td>
        <?php  if(
            ($linha['stats'] == 'Cancelado')){?>
            <button onclick="motivo_cancel(
            '<?php echo $linha['motivo']?>')"  class="btn btn-primary btn-mensagem7" ><i class="fa-solid fa-ban"></i>
            <?php
            }else{
                echo '<i style="font-size:1.5rem;margin-left:5px;color:green;" class="fa-solid fa-circle-check"></i>';
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
            <label class="searchno" style="margin-left:35rem;">Não foram encontrados resultados.</label>
            <?php
            }
            ?>

      

    </html>

    




<?php
include_once '../modal/modal-motivo_cancel.php';
?>

<script src="../js/relatorios.js"></script> 


<?php
}
?>