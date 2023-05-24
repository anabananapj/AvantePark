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
        <link rel="stylesheet" href="../css/checkin.css">
        <link rel="stylesheet" href="../css/modal.css">
        <link rel="stylesheet" href="../css/tablecheckin.css">
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

    <body >
 
    <?php

        include('../includes/header.php');

    ?>

            <!-- REGISTRO DE CHECK-IN -->

            <div class="corpoavante" >
              <div class="caixacheckin">  
                <p class="textcheck" style="margin-top:60px;">CHECK-IN<i style="position:relative;top:4px;" class='bx bxs-door-open'></i></p>
                <p class="crie" style="position:absolute;margin-top:-40px;">Crie um Check-In.</p>
                  <div class="inputmovi centro">
                    <form action="check-in.php" method="POST">

                        <div class="inputsdoc">
                            
                        <div class="label" style="margin-top:-3.5rem;margin-left:2px;">CPF do Cliente:</div><p style="position:absolute;font-family:'Jost';margin-top:-3.4rem;margin-left:13rem;">Cliente Cadastrado?</p>
                        <input id="cpf" name ="tamanho" class="form-control" style="background-color:EBEBEB;font-family:'Jost';font-size:17px;width: 21.2rem; height:40px;margin-left:-7.6rem;border-color:black;border-radius:10px;border-width:2px;margin-top:-2rem;">
                        

                        </div>

                        <div class="inputsdoc" >

                            <label for="nome_cliente" style="color:black;"><div class="label"style="margin-left:0px;margin-top:-1rem;">Nome:</div>
                            <select type="text" class="form-control" id="nome_cliente" name="nome_cliente" value="" style="width: 21.5rem; height:40px;background-color:EBEBEB;font-family:'Jost';font-size:17px;border-color:black;border-radius:10px;"></label>
                            <option value="" ></option>

                        </select>

                        </div>
                        
                        <div class="inputsdoc" id="inputsdoc" style="margin-top:0.3rem;">


                            <label for="placa_carro" style="color:black;"><div class="label"style="margin-left:0px;">Placa:</div>
                            <input type="text" value="" name="placa_carro" id="placa_carro" style="width: 150px; height:40px;"></label>



                            <label for="cor" style="color:black;"><div class="label"style="margin-left:0px;">Cor:</div>
                            <select type="text" name="cor" style="width: 150px; height:40px;background-color:EBEBEB;font-family:'Jost';font-size:17px;border-color:black;border-radius:10px;"></label>
                            <option value=""></option>
                            <option value="Amarelo">Amarelo</option>
                            <option value="Azul">Azul</option>
                            <option value="Preto">Preto</option>
                            <option value="Branco">Branco</option>
                            <option value="Vermelho">Vermelho</option>
                            <option value="Verde">Verde</option>
                            <option value="Roxo">Roxo</option>
                            <option value="Marrom">Marrom</option>
                            </select>


                        </div>


                        <div class="inputsdoc">


                <div class="label" style="margin-left:-1px;margin-top:-9px;">Tamanho:</div>
                    <select id="select"  name ="tamanho" class="form-control" style="background-color:EBEBEB;font-family:'Jost';font-size:17px;width: 9.6rem; height:40px;margin-left:-4.4rem;border-color:black;border-radius:10px;border-width:2px;margin-top:1rem;">

                    <option value=""></option>
                    <option value="A">Porte Grande</option>
                    <option value="B">Porte Médio</option>
                    <option value="C">Porte Pequeno</option>
                    <option value="Moto">Moto</option>

                    </select>


                        <div class="label" style="margin-left:39px;margin-top:-9px;">Manobrista:</div>
                        <select  name = "manobrista" class="form-control" style="font-family:'Jost';font-size:17px;width: 9.5rem; height:40px;margin-left:-5.5rem;
                        border-color:black;border-radius:10px;border-width:2px;margin-top:1rem;background-color:EBEBEB;">
                        <option></option>

                        <?php

                        $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");

                        $query = "SELECT * FROM funcionarios INNER JOIN pessoa_fisica ON funcionarios.funcid = pessoa_fisica.idpf WHERE cargo LIKE '%Manobrista%'";
                        $resultado = pg_query($pgsql_connection, $query);

                        $lista = pg_fetch_all($resultado);
                        pg_close($pgsql_connection);

                        foreach($lista as $linha){
                        ?>
                        <option value="<?=$linha['funcid']?>"><?php echo $linha['nome']?></option> 

                        <?php
                        }
                        ?>
                
                        </select>

                        </div>

                        <div class="inputsdoc">


                            <label for="modelo" style="color:black;"><div class="label"style="margin-left:0px;margin-top:1rem;">Modelo:</div>
                            <input type="text" name="modelo" style="width: 21.5rem; height:40px;"></label>
                            
                            
                        </div>


            <div class="inputsdoc">

            <label for="vaga" style="color:black;">
            <div class="label"style="margin-left:0px;margin-top:-1rem;">Vaga:</div>
                <select required type="text" id="vaga" name="vaga" style="width: 150px; height:40px;border:2px solid black;border-radius:10px;background-color:EBEBEB;">
                     <option value = ""></option>
                </select> 
                </label>
             </div>
             
            <div
            class="buttondoc"><button class="button"type="submit" name="movimentar">Enviar<i class="fa-solid fa-arrow-right"></i></button>
            </div>

        </form>
    </div>
</div>

 

        <?php 


        if (isset($_POST['movimentar'])) {

            date_default_timezone_set ( "America/Sao_Paulo" ) ;
            $now = new DateTime();
            $datetime = $now->format('Y-m-d H:i:s'); 
            $vaga = $_POST['vaga'];
            $manobrista = $_POST['manobrista'];
            $placa_carro = $_POST['placa_carro'];
            $tamanho = $_POST['tamanho'];
            $cor = $_POST['cor'];
            $modelo = $_POST['modelo'];
            $id_vaga = $_POST['vaga'];

            $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");


            $query = "INSERT INTO checkin (dataentrada, horaentrada, vaga, manobrista, stats) values (now(), now()::time(0), '$vaga', '$manobrista','Estacionado')";
            pg_query($pgsql_connection, $query);


            $query = "INSERT INTO veiculos (placa, modelo, cor, tamanho) values ('$placa_carro', '$modelo', '$cor', '$tamanho')";
            pg_query($pgsql_connection, $query);

            $query = "UPDATE vagas SET stats = 'Estacionado' WHERE id_vaga = $id_vaga";
            $resultado = pg_query($pgsql_connection, $query);


            pg_close($pgsql_connection);

            echo "<script> parent.self.location = \"check-in.php\";</script>";   


        }

        ?>


        <!-- TABELA DE CHECK-IN -->

        <div class="tablecarros">
            <p class="textestaci" style="margin-top:1rem;">Carros e Vagas no Estacionamento</p><img style="position:absolute;width:3rem;margin-left:35rem;margin-top:-3.8rem;" src="../img/logo2.png" alt="img">  


            <div class="buttondoc">
                <a href="vagas.php">
                <button type="submit" name="visu" style="margin-left:1rem;position:absolute;margin-top:-5px;font-size:16px !important;font-family:'Raleway';"
                >Ver Vagas<i style="top:-1rem ;margin-left:5px;color:#1E90FF;"class="fa-solid fa-eye"></i></button></a>

                <div id="divBusca" class="divbusca">
                    <input id="search" style="background-color:white;position:absolute;margin-left:13rem;width:20rem;margin-top:-3px;" type="search" class="txtBusca" placeholder="Pesquisar por Placa">
                    <button class="busca"onclick="searchData()" type="submit" style="border-radius:10px;border:none;background-color:#8FBC8F;color:black;position:absolute;margin-top:-3px;margin-left:34rem;"><i style="font-size:20px;" class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                
            </a>
            </div>
            <div class="boxtable2 d-flex justify-content-center ms-5">
                    <div class="scroll">
                        <table class="table table-striped table-bordered table-condensed table-hover" style="margin-left:-0px;" >

                            <thead class="table-light">
                            <tr>

                            <th>Modelo - Cor - Placa</th>
                            <th>Hora</th>
                            <th>Vaga</th>
                            <th>Opções</th>

                            </tr>
                            </thead>
                            <tdbody>


                <?php 

                        if(!empty($_GET['search']))
                        {
                            $data = $_GET['search'];
                            $query = "SELECT *, checkin.vaga FROM veiculos INNER JOIN checkin ON (veiculos.idveiculo = checkin.idveiculo) WHERE stats='Estacionado' AND placa LIKE '%$data%'"; 
                        }else{
                            $query = "SELECT *, checkin.vaga FROM veiculos INNER JOIN checkin ON (veiculos.idveiculo = checkin.idveiculo) WHERE stats='Estacionado'"; 
                        }
                        $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");
                        $resultado = pg_fetch_all(pg_query($pgsql_connection, $query));

                        if (count($resultado)) {
                        foreach ($resultado as $linha){ 
                            $id_vaga = $linha['vaga'];
                            $vaga = pg_fetch_assoc(pg_query($pgsql_connection, "SELECT * FROM vagas WHERE id_vaga = $id_vaga"));
                        ?>
                        <tr>
                        <td> <?php echo $linha['modelo']; ?> - <?php echo $linha['cor']; ?> - <?php echo $linha['placa']; ?> </td>
                        <td> <?php echo $linha['horaentrada']; ?> </td>
                        <td> <?php echo $vaga['setor'].$vaga['vaga'];?></td>



                        <td><?php
                            if (@$_SESSION['userperm'] == 1) {
                            ?><button onclick="preencher(
                                <?php echo $linha['idveiculo']?>,
                                '<?php echo $linha['modelo']?>',
                                '<?php echo $linha['placa']?>',
                                '<?php echo $vaga['setor'].$vaga['vaga']?>',
                                <?php echo $vaga['id_vaga']; ?>)"; 
                        class="btn btn-primary btn-mensagem"><i style="color:red;" class="fa-solid fa-ban"></i></button>
                        <?php
                        }
                        ?>

                        <button onclick="checkout(
                                <?php echo $linha['idveiculo']?>,
                                '<?php echo $linha['placa']?>',
                                '<?php echo $vaga['setor'].$vaga['vaga']; ?>',
                                <?php echo $vaga['id_vaga']; ?>);
                                
                                        calcular(
                                '<?php echo $linha['horaentrada']?>'
                                )" class="btn btn-primary btn-mensagem2"><i style="color:0FA958;" class="fa-solid fa-check"></i></button>
                        </td>
                        </tr>
                            <input type="hidden" name="dataentrada" value=<?php echo $linha['dataentrada']?> id="dataentrada">
                            <input type="hidden" name="horaentrada" value=<?php echo $linha['horaentrada']?> id="horaentrada">

                            <?php
                            } } else {
                            ?>
                            <label style="margin-left:12rem;"class="searchnao">Não foram encontrados resultados.</label>

                        <?php 
                        } 
                        ?>
                  
                    </tdbody>
                </table>
            </div>
        </div>
 



 <?php
    include_once "../modal/modal-checkout.php";
    include_once "../modal/modal-cancel.php";

 ?>
        <script src="../js/checkin.js"></script>

    </html>



<?php
}
?>