<?php  

session_start();
// sessão iniciada
if(isset($_SESSION['logado'])){
    header("Location:./index.php");
}

require_once('../functions/connect.php');


$email = $_POST['email'];
$senha = $_POST['senha'];

$pgsql_connection = pg_connect("host=localhost dbname=avanteparkdb user=postgres password=1234") or die
 ("Sem conexão com o servidor");

$result = pg_query($pgsql_connection, "SELECT * FROM usuarios
WHERE email = '$email' AND senha = '$senha'");

$row = pg_fetch_assoc($result);

if(pg_num_rows ($result) > 0 )
{

$_SESSION['email'] = $email;
$_SESSION['senha'] = $senha;
$_SESSION['userperm'] = $row['userperm'];

$funcid = $row['funcid'];

//
$_SESSION['funcid'] = $row['funcid'];

$result = pg_query($pgsql_connection, "SELECT * FROM pessoa_fisica
WHERE idpf = $funcid;");

$row = pg_fetch_assoc($result);

$_SESSION['nome'] = $row['nome'];
$_SESSION['logado'] = true;

header('Location:paginaprincipal.php');
}
else{

  unset ($_SESSION['email']);
  unset ($_SESSION['senha']);
  header('location:index.php');
  

  }

  





