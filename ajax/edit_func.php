<?php
if(isset($_POST['idpf'])){
    $nome = $_POST['nome'];
    $nascimento = $_POST["nascimento"];
    $numero = $_POST["telefone"];
    /* $cargo = $_POST["cargo"]; */
    $rua = $_POST["rua"];
    $numerocasa = $_POST["numerocasa"];
    $bairro = $_POST["bairro"];
    $idpf = $_POST["idpf"];

    $pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor");

    $query = "SELECT * FROM pessoa_fisica WHERE idpf = $idpf";
    $executar = pg_query($pgsql_connection, $query);
    $resultado = pg_fetch_assoc($executar);

    $endid = $resultado['endereco'];

    $query = "UPDATE pessoa_fisica SET nome='$nome', nascimento='$nascimento', telefone='$numero' WHERE idpf = $idpf";
    $resultado_pf = pg_query($pgsql_connection, $query);

    $query_end = "UPDATE endereco SET rua='$rua', numero = $numerocasa, bairro='$bairro' WHERE endid = $endid";
    $resultado_end = pg_query($pgsql_connection, $query);
    
    /* $query = "UPDATE funcionarios SET cargo = '$cargo' WHERE funcid = $idpf";
    $resultado = pg_query($pgsql_connection, $query); */    
    
    pg_close($pgsql_connection);

    if($resultado_pf && $resultado_end){
        echo json_encode(['sucesso' => 1]);
    } else {
        echo json_encode(['sucesso' => 0]);
    }
} 