<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:index.php');
}
else{
?>
<html>

<head>
    <!-- ICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'/>
    <script src="https://kit.fontawesome.com/b3cc28d3b5.js" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/gerenciamento.css">
    <link rel="stylesheet" href="../css/clientes.css">
    <!-- IMG -->
    <link rel = "shortcut icon" type = "imagem/x-icon" href = "../img/logo2.png"/>
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
                        <div class="caixa" style="display:flex;justify-content:center;">

                        <a href="reg_clientes.php">
                        <div class="cadastrousuario" style="overflow:hidden;margin-right:80px;">
                                    <br><p class="textosgerentes">Cadastrar Cliente</p></br>  
                                    <i style="font-size:6rem;margin-top:30px;color:black;" class='bx bxs-user-plus'></i>
                        </div>            
                        </a>

                        <a href="viewclientes.php" class="cadastrofuncionario" style="overflow:hidden;">
                                    <br><div class="textosgerentes btn-mensagem2">Ver Clientes</p></br>
                                    <i style="font-size:4.5rem;color:black;margin-top:1rem;margin-left:-22rem;" class="fa-solid fa-users"></i>       
                        </div>
                        </a>   

                        <div class="caixa" style="display:flex;justify-content:center;">



                    </body>
                    </html>

<?php
}
?>




