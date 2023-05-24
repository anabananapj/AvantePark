<?php
if(isset($_POST['idveiculo'])){
    
    $idveiculo = $_POST['idveiculo'];
    date_default_timezone_set ( "America/Sao_Paulo" ) ;
    $datasaida = date('Y-m-d');
    $horasaida = $_POST['horasaida'];
    $metodopag = $_POST["metodopag"];
    $totalpag = $_POST["totalpag"];



    $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");

    $query = "UPDATE checkin SET datasaida='$datasaida', horasaida=now()::time(0), totalpag='$totalpag', metodopag='$metodopag', stats='Finalizado' WHERE idveiculo = $idveiculo";
    $resultado_checkout = pg_query($pgsql_connection, $query);

    $id_vaga = intval($_POST['idvaga']);
    $vaga = pg_fetch_assoc(pg_query($pgsql_connection, "SELECT * FROM vagas WHERE id_vaga = $id_vaga"));

    $query = "UPDATE vagas SET stats = 'Vazia' WHERE id_vaga = $id_vaga ";
    $resultado = pg_query($pgsql_connection, $query);   

    
    pg_close($pgsql_connection);

    if($resultado_checkout && $resultado ){
        echo json_encode(['sucesso' => 1]);
    } else {
        echo json_encode(['sucesso' => 0]);
    }
} 