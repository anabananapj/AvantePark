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
        <link rel="stylesheet" href="../css/vagas.css">
        <link rel="stylesheet" href="../css/checkin.css">
        <link rel = "shortcut icon" ty.pe = "imagem/x-icon" href = "../img/logo2.png"/>

             <!-- JS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
        <title> AvantePark </title>
    </head>

    <body style="background:black;">
 
    <?php
        include('../includes/header.php');
    ?>

        <div class="corpoavante">
                <p class="textvagas">Vagas<i style="position:relative;top:4px;left:0.5rem;color:88AF94;" class='fa-solid fa-square-parking'></i></p>
                    <div class="inputmovi centro">
                        <div class="inputexit">
                            <div class="spanvagas">

                                    <span style="position:relative;margin-left:-7rem;">Porte Grande</span>
                                    <div class="linha-vertical"></div>
                                    <span style="margin-left:8rem;">Porte Médio</span>
                                    <div class="linha-vertical2"></div>
                                    <span style="margin-left:7rem;">Porte Pequeno</span>
                                    <div class="linha-vertical3"></div>
                                    <span style="margin-left:10.5rem;">Motos</span>
                            </div>        


</div>

                 <!--   SETOR A -->


<div class="vagas" style="position:absolute;margin-top:17rem;margin-left:5.5rem;display:flex;">

        <?php

        $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");

        $query = "SELECT * FROM vagas where setor='A' order by vaga";
        $resultado = pg_query($pgsql_connection, $query);


        $lista = pg_fetch_all($resultado);
        pg_close($pgsql_connection);

        foreach($lista as $linha){
            
            if($linha['stats'] == 'Estacionado'){
                echo'<span style="background-color:#CD5C5C;color:white;" >'.$linha['vaga'].'<i style="position:absolute;color:red;font-size:1.8rem;margin-left:16px;margin-top:3px;" class="fa-solid fa-xmark"></i></span>';
            }else if($linha['stats'] == 'Vazia'){
                echo'<span style="background-color:#8FBC8F;">'.$linha['vaga'].'<i style="position:absolute;color:green;margin-left:10px;font-size:1.8rem;" class="fa-solid fa-check"></i></span>';
            }
        ?>


<?php
}
?>

</div>

                 <!--   SETOR B -->


<div class="vagas" style="position:absolute;margin-left:29rem;margin-top:17rem;">

                <?php

                $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");

                $query = "SELECT * FROM vagas where setor='B' order by vaga";
                $resultado = pg_query($pgsql_connection, $query);


                $lista = pg_fetch_all($resultado);
                pg_close($pgsql_connection);

                foreach($lista as $linha){

                    if($linha['stats'] == 'Estacionado'){
                        echo'<span style="background-color:#CD5C5C;color:white;" >'.$linha['vaga'].'<i style="position:absolute;color:red;font-size:1.8rem;margin-left:16px;margin-top:3px;" class="fa-solid fa-xmark"></i></span>';
                    }if($linha['stats'] == 'Vazia'){
                        echo'<span style="background-color:#8FBC8F;">'.$linha['vaga'].'<i style="position:absolute;color:green;margin-left:10px;font-size:1.8rem;" class="fa-solid fa-check"></i></span>';
                    }
                ?>

<?php
}
?>


                 <!--   SETOR C -->

</div>

<div class="vagas" style="position:absolute;margin-left:54rem;margin-top:17rem;">

            <?php

            $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");

            $query = "SELECT * FROM vagas where setor='C' order by vaga";
            $resultado = pg_query($pgsql_connection, $query);

            $lista = pg_fetch_all($resultado);
            pg_close($pgsql_connection);

            foreach($lista as $linha){

                if($linha['stats'] == 'Estacionado'){
                    echo'<span style="background-color:#CD5C5C;color:white;" >'.$linha['vaga'].'<i style="position:absolute;color:red;font-size:1.8rem;margin-left:16px;margin-top:3px;" class="fa-solid fa-xmark"></i></span>';
                }else{
                    echo'<span style="background-color:#8FBC8F;">'.$linha['vaga'].'<i style="position:absolute;color:green;margin-left:10px;font-size:1.8rem;" class="fa-solid fa-check"></i></span>';
                }
            ?>


<?php
}
?>


</div>

                <!--   SETOR MOTOS -->


<div class="vagas2" style="flex-wrap: wrap;position:absolute;left:77rem;margin-top:17rem;">

            <?php

            $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");

            $query = "SELECT * FROM vagas where setor='Moto' order by vaga";
            $resultado = pg_query($pgsql_connection, $query);

            $lista = pg_fetch_all($resultado);
            pg_close($pgsql_connection);

            foreach($lista as $linha){

                if($linha['stats'] == 'Estacionado'){
                    echo'<span style="background-color:#CD5C5C;color:white;" >'.$linha['vaga'].'<i style="position:absolute;color:red;font-size:1.8rem;margin-left:16px;margin-top:3px;" class="fa-solid fa-xmark"></i></span>';
                }else{
                    echo'<span style="background-color:#8FBC8F;">'.$linha['vaga'].'<i style="position:absolute;color:green;margin-left:10px;font-size:1.8rem;" class="fa-solid fa-check"></i></span>';
                }
            ?>

<?php
}
?>


</div>




<html>

<?php }