<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:index.php');
} else {

    /* cria a sessão até apertar enviar  */

if (isset($_POST['confirmar'])) {

    include('../functions/validacpf.php');
    $nome_cliente = $_POST["nome_cliente"];
    $cpf_cliente = $_POST["cpf_cliente"];
    $nascimento_cliente = $_POST["nascimento_cliente"];
    $telefone_cliente = $_POST["telefone_cliente"];
    $carro_cliente = $_POST["carro_cliente"];


    if (validacpf($cpf_cliente)) {
        $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");

    $carro_cliente = $_POST["carro_cliente"];
    $query = "INSERT INTO clientes (nome_cliente, cpf_cliente, nascimento_cliente, telefone_cliente, carro_cliente ) values 
    ('$nome_cliente', '$cpf_cliente', '$nascimento_cliente', '$telefone_cliente', '$carro_cliente')";
    
    pg_query($pgsql_connection, $query);


    pg_close($pgsql_connection);

      echo "<script> parent.self.location = \"clientes.php\";</script>"; 
    } else {
        $error = true;
    }
}

?>
    <html>

    <head>
    <!-- ICONS -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'/>
        <script src="https://kit.fontawesome.com/b3cc28d3b5.js" crossorigin="anonymous"></script>
        <link rel = "shortcut icon" type = "imagem/x-icon" href = "../img/logo2.png"/>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/vagas.css">
        <!-- JS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>



        <title> AvantePark </title>
    </head>

    <body style="overflow:hidden;">

        <?php

        include('../includes/header.php');

        ?>

        <div class="corpoavante">
            <div class="caixacadastrofunc">
                <p class="textinsira">Cadastre um Cliente<b style="margin-left:10px;" class="fa-solid fa-users"></b>
                <a href="clientes.php">
                <i style="position:absolute;margin-left:3rem;margin-top:-2rem;color:0d6efd;" class="bx bxs-share bx-border-circle bx-tada-hover"></i></a></p>

                <div class="inputmovi centro">
                    <form action="reg_clientes.php" method="post">
                        <div class="inputsfunc" style="margin-left:8rem;">

                            <label for="nome_cliente" style="color:black;">
                                <div class="label" style="margin-left:0px;">Nome Completo:</div>
                                <input type="text" name="nome_cliente" style="width: 20rem; height:30px;">
                            </label>

                            <label for="cpf_cliente" style="color:black;">
                                <div class="label" style="margin-left:-5rem;">CPF:</div>
                                <input type="text" maxlength="11" name="cpf_cliente" style="width: 200px;height:30px;margin-left:-5rem;">
                            </label>

                        </div>

                        <br>

                        <div class="inputsfunc" style="margin-left:8rem;">

                            <label for="nascimento_cliente" style="color:black;">
                                <div class="label" style="margin-left:0px;">Nascimento:</div>
                                <input type="date" name="nascimento_cliente" style="width: 10rem; height:30px;margin-right:1rem;">
                            </label>

                            <label for="telefone_cliente" style="color:black;">
                                <div class="label" style="margin-left:-10px;">Telefone:</div>
                                <input type="text" name="telefone_cliente" style="width: 162px;height:30px;margin-left:-10px; ">
                            </label>


                        

                            <label for="carro_cliente" style="color:black;">
                                <div class="label" style="margin-left:-5.5rem;">Placa do Carro do Cliente:</div>
                                <input type="text" name="carro_cliente" style="margin-left:-5.5rem;width: 12.6rem; height:30px;">
                            </label>



                        </div>

                        <div class="buttondoc" style="display:flex;">
                        <button class="button"type="submit" name="confirmar" style="margin-left:19.5rem !important;margin-top:4px">Enviar<i class="fa-solid fa-plus"></i></button>

                        <?php if (@$error){ ?> 
                            <div class="errormsg">
                                <p style="margin-top:-0.1rem;">CPF Inválido!</p>
                            </div> 
                        <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <html>
            
    <?php
    } 
    ?>