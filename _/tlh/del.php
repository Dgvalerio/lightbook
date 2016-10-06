<?php header("Content-Type: text/html; charset=UTF-8",true); $id_usuario = 0; $test1 = 0;
/* Conexão */ $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); };
/* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'lightbook'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }

/* Example use of getenv() $ipp = getenv("REMOTE_ADDR"); Or simply use a Superglobal ($_SERVER or $_ENV) */ $ipp = $_SERVER["REMOTE_ADDR"];
$result = mysqli_query($link, "select * from logbook;" ); if (!$result) {}
while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['ip'] == $ipp) { $id_usuario = $confere['userid']; break; } }

// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$vId   = $_POST ["deletaAtl"];

/* Criação da Tabela Atalhos */
$sql = "delete from atalhos where id = '$vId';";
if (mysqli_query($link, $sql)) { }
?>