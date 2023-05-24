<?php
$setor = $_POST['setor'];
$query = "SELECT * FROM vagas WHERE setor = '$setor' AND stats = 'Vazia' ORDER BY vaga";

$pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");
$resultado = pg_fetch_all(pg_query($pgsql_connection, $query));

foreach ($resultado as $linha) {
    $resposta[] = [
        'id_vaga' => $linha['id_vaga'],
        'setor' => $linha['setor'],
        'vaga' => $linha['vaga']
    ];
}
echo json_encode($resposta);
/* <option id="resultado"> echo $linha['setor'];echo $linha['vaga']; </option> */