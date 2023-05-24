<?php
$cpf_cliente = $_POST['cpf'];
$query = "SELECT * FROM clientes WHERE cpf_cliente = '$cpf_cliente'";

$pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");
$resultado = pg_fetch_assoc(pg_query($pgsql_connection, $query));

$resposta['id_veiculo'] = $resultado['id_veiculo'];
$resposta['cpf_cliente'] = $resultado['cpf_cliente'];
$resposta['nome_cliente'] = $resultado['nome_cliente'];


echo json_encode($resposta);

?>
