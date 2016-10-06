<?php header("Content-Type: text/html; charset=UTF-8",true); $id_usuario = 0; $test1 = 0;
/* Conexão */ $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); };
/* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'lightbook'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }

/* Example use of getenv() $ipp = getenv("REMOTE_ADDR"); Or simply use a Superglobal ($_SERVER or $_ENV) */ $ipp = $_SERVER["REMOTE_ADDR"];
$result = mysqli_query($link, "select * from logbook;" ); if (!$result) {}
while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['ip'] == $ipp) { $id_usuario = $confere['userid']; break; } }

// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$vNom   = $_POST ["inpNom"];
$vLin   = $_POST ["inpLin"];
$pLetras = substr($vLin, 0, 4);

if ($pLetras != 'http' && $pLetras != 'ftp:' ) { $vLin = 'http://' . $vLin; }

/* Criação da Tabela Atalhos */ $sql = 'create table if not exists atalhos ( 
  id int not null auto_increment, 
  userid int not null, 
  nome varchar(30), 
  link varchar(50),
  primary key(id), 
  foreign key (userid) references lightbook(id)
) default charset = utf8;'; if (mysqli_query($link, $sql)) { } else { echo 'Erro!!!' . mysqli_connect_error() . "\n"; }

$sql = "insert into atalhos (userid, nome, link) values ('$id_usuario', '$vNom', '$vLin');";
if (mysqli_query($link, $sql)) { }
?>