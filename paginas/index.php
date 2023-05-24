<?php
        session_start();
        if(isset($_POST['desloga'])){
            header("location:./logout.php");
        }
        if(isset($_SESSION['logado'])){
        ?>
        <form action="./index.php" method="post">
            <input type="submit" name="desloga" value="Sair">
        </form>
        <?php
        echo "Você saiu.";
        } else {
?>

    <html>
    <style>

        body{
            background-image: url("../img/2.jfif");
            background-size: 100% !important;
            background-color: black;
        }

</style>
    <head>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="../css/style.css">
        <link rel = "shortcut icon" type = "imagem/x-icon" href = "../img/logo2.png"/>
        <title> AvantePark Login</title>
    </head>

    <body>
        <div class="box-centro">
            <div class="login">
                <p class="Welcome">Bem Vindo(a)<br>ao AvantePark!</p><img style="position:relative;width:3rem;margin-top:-13rem;margin-left:9rem;" src="../img/logo2.png" alt="logo"/img>
        <form method="POST" action="login.php">
                    <div class="centro input">

                        <input maxlength="69" required style="font-family:'Raleway'; " class="userid" type="text" name="email" id="login"><i style="position:absolute;padding:8px;margin:-95px 0 -10px 0;" class='bx bxs-user bx-sm'></i><br>
                        <input required style="font-weight:bolder; font-size:24px;padding:4px 20px 4px 35px;margin:0;" class="userid" type="password" name="senha" id="senha"><i style="position:absolute;padding:8px;margin:10px 0 -10px 0;" class='bx bxs-lock-alt bx-sm'></i><br><br>

                    </div>

                    <div class="buttondoc">

                        <button style="height:3rem !important;font-size:18px;margin-top:rem;margin-left:95px;" type="submit" value="entrar">
                            <p style="margin-top:5px;">Entrar</p>

                        </button>
                    </div>
        </form>
                <p class="todososdireitos">Todos os direitos reservados © 2022</p>

            </div>

                <div class="paginainicial">
                    <p class="veiculo">O seu Veículo seguro é <br /> com a gente! </p>
                    <p class="vinteequatro" style="margin-right: 30px;"> <i style="position:relative;top:8px;margin-right: 5px;" class='bx bx-time-five'> </i>Estacionamento 24horas</p>
                </div>
        </div>
        
    </body>

    </html>
    <?php
    }