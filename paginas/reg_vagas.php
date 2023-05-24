<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:index.php');
} else {
?>
    <html>

    <head>
    <!-- ICONS -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'/>
        <script src="https://kit.fontawesome.com/b3cc28d3b5.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link rel = "shortcut icon" type = "imagem/x-icon" href = "../img/logo2.png"/>
        <link rel="stylesheet" href="../css/checkin.css">
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
                <div class="caixacadastrofunc">
                    <p class="textinsira"">Cadastre uma Vaga <i class="fa-solid fa-square-parking"></i>
                    <a href="gerenciamento.php">
                    <i style="position:absolute;margin-left:6rem;margin-top:-2rem;color:0d6efd;" class="bx bxs-share bx-border-circle bx-tada-hover"></i></a>
                    </p>
                      <div class="inputmovi centro">
                     <form action="./reg_vagas.php" method="post">
                                <div class="inputsfunc">                        
                                <label for="categoria" style="color:black;">

                        <div class="inputsfunc">

                                    <label for="setor" style="color:black;">
                                        <div class="label" style="margin-left:0px;margin-left:100px;margin-top:40px">Escolha um Setor:</div>
                                        <select type="text" name="setor" style="width: 250px; height:30px;margin-left:100px;border:2px solid black;border-radius:10px;font-family:'Jost';font-size:18px;">

                                        <option value="Nulo"></option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="Moto">Moto</option>
                                    
                                        </select>
                                    </label>

                                    <div>

                                    <label for="numerovaga" style="color:black;">
                                        <div class="label" style="margin-left:0px;margin-left:-15.7rem;margin-top:7rem;">Insira um Número Válido:</div>
                                        <input type="text" maxlength="8" name="numerovaga" style="width: 250px;height:30px;margin-left:-15.7rem;font-weight:bolder; font-size:15px;">
                                    </label>
                                    
                                </div>
                           </div>
                        <div class="buttondoc" style="margin-left:9rem;"><button style="margin-left:5rem !important;margin-top:20px"" type="submit" name="enviar">Enviar<i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
            </form>


<?php }

        if (isset($_POST['enviar'])) {

            $setor = $_POST["setor"];
            $numerovaga = $_POST["numerovaga"];

            $query = "INSERT INTO vagas (setor, vaga, stats) values ('$setor', '$numerovaga', 'Vazia');";

            $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");
            pg_query($pgsql_connection, $query);

            pg_close($pgsql_connection);

            echo "<script> parent.self.location = \"reg_vagas.php\";</script>"; 

        }

?>