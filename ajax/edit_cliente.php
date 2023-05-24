<?php
if(isset($_POST['cpf_cliente'])){
    $cpf_cliente = $_POST['cpf_cliente'];
    $nome_cliente = $_POST['nome_cliente'];
    $nascimento_cliente = $_POST["nascimento_cliente"];
    $telefone_cliente = $_POST["telefone_cliente"];

    $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");

    $query = "SELECT * FROM clientes WHERE cpf_cliente = '$cpf_cliente'";
    $executar = pg_query($pgsql_connection, $query);
    $resultado = pg_fetch_assoc($executar);

    $query = "UPDATE clientes SET nome_cliente='$nome_cliente', nascimento_cliente='$nascimento_cliente', telefone_cliente='$telefone_cliente' WHERE cpf_cliente = '$cpf_cliente'";
    $resultado_pf = pg_query($pgsql_connection, $query);

    pg_close($pgsql_connection);

    if($resultado_pf){
        echo json_encode(['sucesso' => 1]);
    } else {
        echo json_encode(['sucesso' => 0]);
    }
}
