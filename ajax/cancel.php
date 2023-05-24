<?php

if(isset($_POST['idveiculo'])){

    $motivo = $_POST['motivo'];
    $idveiculo = $_POST['idveiculo'];


    $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");

    $query = "INSERT INTO cancelamentos (motivo, id_vehicle) values ('$motivo', '$idveiculo')";
    $resultado_mot = pg_query($pgsql_connection, $query);
    
    $query = "UPDATE checkin SET stats = 'Cancelado' WHERE idveiculo = $idveiculo";
    $resultado_check = pg_query($pgsql_connection, $query);
    
    $id_vaga = intval($_POST['idvaga2']);
    $vaga = pg_fetch_assoc(pg_query($pgsql_connection, "SELECT * FROM vagas WHERE id_vaga = $id_vaga"));

    $query = "UPDATE vagas SET stats = 'Vazia' WHERE id_vaga = $id_vaga ";
    $resultado = pg_query($pgsql_connection, $query);         

    pg_close($pgsql_connection);


if($resultado_check && $resultado_mot && $resultado){
    echo json_encode(['sucesso' => 1]);
} else {
    echo json_encode(['sucesso' => 0]);
}

}

?>