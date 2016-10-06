<?php header("Content-Type: text/html; charset=UTF-8",true); $test1 = 0; $usuario = ''; $walp = '24606.jpg';
/* Conexão */ $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); };
/* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'lightbook'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }
/* Example use of getenv() $ipp = getenv("REMOTE_ADDR"); Or simply use a Superglobal ($_SERVER or $_ENV) */ $ipp = $_SERVER["REMOTE_ADDR"];
$result = mysqli_query($link, "select * from logbook;" ); if (!$result) {} while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['ip'] == $ipp) { $test1 = 1; $id_usuario = $usuario = $confere['userid']; break; } }
$result = mysqli_query($link, "select * from lightbook;" ); if (!$result) {} while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['id'] == $usuario) { $usuario = $confere['usuario']; break; } }
if ($test1 == 0){ print("<script> location.href = '../../index.php'; </script>"); } ?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="../../bootstrap-4.0.0-alpha.4/dist/css/bootstrap.css">
<script src="../../js/jquery-3.1.0.min.js"> </script>
<script src="../../js/js.js"> </script>
<script src="../../bootstrap-4.0.0-alpha.4/dist/js/bootstrap.min.js"> </script>
<script>
    function img_Back(num) { $("body").css({"background-image":"url('../../img/"+num+".jpg')"}); }

    function imgBack(num) { $.post("sav.php", {img: num},  function(){ $("body").css({"background-image":"url('../../img/"+num+".jpg')"}); }, "html"); }
</script>
<link rel="stylesheet" type="text/css" href="../../css/01.css">
<?php
$result = mysqli_query($link, "select * from lights;" ); if (!$result) {}
while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['userid'] == $id_usuario) { $walp = $confere['wall'] . '.jpg'; } }
print("<style> body { background-image: url('../../img/$walp'); } </style>"); ?>