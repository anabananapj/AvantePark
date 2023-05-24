<?php
session_start();

if(!isset($_SESSION['email'])){
    header('location:index.php');
}
else{
?>
<html>

<head>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/checkin.css">
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
            <p class="selecione">Selecione uma opção ao lado para começar um Cadastro ou Check-In.</p>
            </div>
        </form>
    </div>
</body>

</html>
<?php
}
