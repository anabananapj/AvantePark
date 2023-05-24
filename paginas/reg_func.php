<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:index.php');
} else {

    /* cria a sessão até apertar enviar  */

if (isset($_POST['confirmar'])) {

    include('../functions/validacpf.php');
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $nascimento = $_POST["nascimento"];
    $numero = $_POST["numero"];
    $cargo = $_POST["cargo"];
    $rua = $_POST["rua"];
    $numerocasa = $_POST["numerocasa"];
    $bairro = $_POST["bairro"];


    if (validacpf($cpf)) {
        $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");

        /*
        Apenas a tabela principal precisa de um "returning", pois a partir disso as outras ja entendem que precisam dessa informação,
        nesse caso pq o $query diz que o 'funcid' é 'idpf' da outra tabela pq o "returning" foi feito.
        */

        $query = "INSERT INTO pessoa_fisica (nome, cpf, nascimento, telefone, ativo) values ('$nome', '$cpf', '$nascimento', '$numero', 1) returning idpf ;";

        $resultado = pg_query($pgsql_connection, $query);
        $linha = pg_fetch_assoc($resultado);
        $idpf = $linha['idpf'];

        $query = "INSERT INTO funcionarios (funcid, cargo) values ('$idpf', '$cargo');";
        pg_query($pgsql_connection, $query);

        $query = "INSERT INTO endereco (endid, rua, numero, bairro) values ('$idpf', '$rua', '$numerocasa', '$bairro');";
        pg_query($pgsql_connection, $query);

        $query = "UPDATE pessoa_fisica SET endereco = '$idpf' where idpf = $idpf";
        pg_query($pgsql_connection, $query);

        /* fecha o banco */

        pg_close($pgsql_connection);

        echo "<script> parent.self.location = \"gerenciamento.php\";</script>";
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

        <link href="toastr.css" rel="stylesheet"/>  
        <script src="toastr.js"></script>


        <title> AvantePark </title>
    </head>

    <body style="overflow:hidden;">

        <?php

        include('../includes/header.php');

        ?>

        <div class="corpoavante">
            <div class="caixacadastrofunc">
                <p class="textinsira">Cadastre um Funcionário<b style="margin-left:10px;" class="fa-solid fa-users"></b>
                <a href="gerenciamento.php">
                <i style="position:absolute;margin-left:3rem;margin-top:-2rem;color:0d6efd;" class="bx bxs-share bx-border-circle bx-tada-hover"></i></a></p>

                <div class="inputmovi centro">
                    <form action="./reg_func.php" method="post">
                        <div class="inputsfunc">

                            <label for="nome completo" style="color:black;">
                                <div class="label" style="margin-left:0px;">Nome Completo:</div>
                                <input type="text" name="nome" style="width: 20rem; height:30px;">
                            </label>

                            <label for="cpf" style="color:black;">
                                <div class="label" style="margin-left:-5rem;">CPF:</div>
                                <input type="text" maxlength="11" name="cpf" style="width: 200px;height:30px;margin-left:-5rem;">
                            </label>

                        </div>

                        <br>

                        <div class="inputsfunc">

                            <label for="nascimento" style="color:black;">
                                <div class="label" style="margin-left:0px;">Nascimento:</div>
                                <input type="date" name="nascimento" style="width: 10rem; height:30px;margin-right:1rem;">
                            </label>

                            <label for="celular" style="color:black;">
                                <div class="label" style="margin-left:-10px;">Telefone:</div>
                                <input type="text" name="numero" style="width: 162px;height:30px;margin-left:-10px; ">
                            </label>

                            <div class="label" style="margin-left:-5.5rem;">Cargo:</div>
                            <select name="cargo" class="form-control" style="font-family:'Jost';font-size:17px;width: 12.6rem; height:30px;margin-left:-3.3rem;border-color:black;border-radius:10px;border-width:2px;margin-top:1.5rem;">

                                <option value="Nulo"></option>
                                <option value="Manobrista">Manobrista</option>
                                <option value="Recepcionista">Recepcionista</option>
                                <option value="Diarista">Diarista</option>
                                <option value="Administrativo">Administrativo</option>
                                <option value="Menor Aprendiz">Menor Aprendiz</option>

                            </select>

                        </div>

                        <br>

                        <div class="inputsfunc">

                            <label for="rua" style="color:black;">
                                <div class="label" style="margin-left:0px;">Rua:</div>
                                <input type="text" name="rua" style="width: 310px; height:30px;">
                            </label>

                            <label for="numerocada" style="color:black;">
                                <div class="label" style="margin-left:-4.2rem;">Número:</div>
                                <input type="text" name="numerocasa" style="width: 90px;height:30px;margin-left:-4.2rem; ">
                            </label>

                            <label for="bairro" style="color:black;">
                                <div class="label" style="margin-left:-5rem;">Bairro:</div>
                                <input type="text" name="bairro" style="width:195px;height:30px;margin-left:-5rem;">
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