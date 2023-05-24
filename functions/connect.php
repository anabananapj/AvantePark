<?php

$pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die("Sem conexão com o servidor") or

die ("Não foi possível conectar ao servidor PostGreSQL");


?>