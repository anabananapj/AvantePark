<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:index.php');
} else {
?>
    <html>

    <head>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                    <p class="textinsira" style="margin-left:-1px !important;">Cadastre um Usuário<i style="position:absolute;font-size:50px;margin-top:5px;" class='bx bxs-user-plus'></i> 
                    <a href="gerenciamento.php">
                    <i style="position:absolute;margin-left:8rem;margin-top:-2rem;color:0d6efd;" class="bx bxs-share bx-border-circle bx-tada-hover"></i></a>
                    </p>
                      <div class="inputmovi centro">
            <form action="./reg_user.php" method="post">
                                <div class="inputsfunc">
                                    

                                    <label for="categoria" style="color:black;">

                                            <div class="label" style="margin-left:0px;margin-left:4rem;">Nome Completo:</div>
                                            <select name = "nome" class="form-control" style="font-family:'Jost';font-size:17px;width:15.5rem; height:30px;margin-left:4rem;border-color:black;border-radius:10px;border-width:2px;" >
                                            <option></option>
                                        <?php
                                        
                                        $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");

                                        $query = "SELECT * FROM pessoa_fisica WHERE ativo = 1";
                                        $resultado = pg_query($pgsql_connection, $query);

                                        $lista = pg_fetch_all($resultado);
                                        pg_close($pgsql_connection);

                                        foreach($lista as $linha){
                                            ?>
                                        <option value="<?=$linha['idpf']?>"><?php echo $linha['nome']?></option> 
                                            <?php
                                        }
                                        ?>

                                        </select>
                            
                                    </label>

                                </div>
                                </div>


                        <div class="inputsfunc">


                                    <label for="email" style="color:black;">
                                        <div class="label" style="margin-left:0px;margin-left:4rem;margin-top:5rem">E-mail:</div>
                                        <input type="text" name="email" style="width: 250px; height:30px;margin-left:4rem;">
                                    </label>

                                    <label for="senha" style="color:black;">
                                        <div class="label" style="margin-left:0px;margin-left:-55px;margin-top:5rem;">Senha:</div>
                                        <input type="password" maxlength="8" name="senha" style="width: 250px;height:30px;margin-left:-58px;font-weight:bolder; font-size:30px;">
                                    </label>


                           </div>
                        <div class="buttondoc" style="margin-left:100px;"><button type="submit" name="enviar">Enviar<i class="fa-solid fa-plus"></i></button>
                    </div>

            </form>


<?php }

        if (isset($_POST['enviar'])) {

            $senha = $_POST["senha"];
            $email = $_POST["email"];
            $funcid = $_POST["nome"];

            $query = "INSERT INTO usuarios (senha, email, userperm, funcid) values ('$senha', '$email', 0, '$funcid');";

            $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");
            pg_query($pgsql_connection, $query);

            $query = "UPDATE pessoa_fisica set ativo = 3 where idpf = $funcid";
            pg_query($pgsql_connection, $query);

            pg_close($pgsql_connection);

         /*    echo "<script> parent.self.location = \"gerenciamento.php\";</script>"; */

        }

?>