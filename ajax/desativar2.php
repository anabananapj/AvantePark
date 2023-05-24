<?php

    $ativo = $_GET["ativo"];
    $idpf = $_GET["idpf"];

    $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");

    $query = "UPDATE pessoa_fisica SET ativo = 5  where idpf = $idpf";
    $resultado = pg_query($pgsql_connection, $query);
 
    pg_close($pgsql_connection);

    
    header("location: ../paginas/tabelagerente.php"); 
    


?>