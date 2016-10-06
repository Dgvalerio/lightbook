<?php header("Content-Type: text/html; charset=UTF-8",true);

/* Conexão */ $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); };
/* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'lightbook'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }

/* Example use of getenv() $ipp = getenv("REMOTE_ADDR"); Or simply use a Superglobal ($_SERVER or $_ENV) */ $ipp = $_SERVER["REMOTE_ADDR"];

$sql = "delete from logbook where ip = '$ipp'; "; if (mysqli_query($link, $sql)) { } else { echo 'erro!!!'; }

print("<script> location.href = 'index.php'; </script>");
?>