<?php header("Content-Type: text/html; charset=UTF-8",true); $test1 = 0; $usuario = ''; $walp = '24606.jpg'; $id_usuario = 0;
/* Conexão */ $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); };
/* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'lightbook'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }
/* Example use of getenv() $ipp = getenv("REMOTE_ADDR"); Or simply use a Superglobal ($_SERVER or $_ENV) */ $ipp = $_SERVER["REMOTE_ADDR"];
$result = mysqli_query($link, "select * from logbook;" ); if (!$result) {} while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['ip'] == $ipp) { $test1 = 1; $id_usuario = $usuario = $confere['userid']; break; } }
$result = mysqli_query($link, "select * from lightbook;" ); if (!$result) {} while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['id'] == $usuario) { $usuario = $confere['usuario']; break; } }
if ($test1 == 0){ print("<script> location.href = '../index.php'; </script>"); }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> LightBook </title>
    <link rel="stylesheet" type="text/css" href="../../bootstrap-4.0.0-alpha.4/dist/css/bootstrap.css">
    <script src="../../js/jquery-3.1.0.min.js"> </script>
    <script src="../../js/js.js"> </script>
    <script src="../../bootstrap-4.0.0-alpha.4/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/01.css">
    <?php include_once'01.php' ?>
    <?php
    $result = mysqli_query($link, "select * from lights;" ); if (!$result) {}
    while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['userid'] == $id_usuario) { $walp = $confere['wall'] . '.jpg'; } }
    print("<style> body { background-image: url('../../img/$walp'); } </style>"); ?>
</head>
<body class="container text-md-center"> <br/>
<header> <h1> LightBook: <?php echo $usuario; ?> </h1> <br/> <?php include_once'mn.php' ?> </header>
<section>
    <div class="btn-group-vertical btn-block" role="group">

        <button class="btn btn-primary btn-lg"
                onclick="toLoc('alertify.js-0.3.11/example/index.html')"> alertify.js-0.3.11 </button>

        <button class="btn btn-primary btn-lg bd-top"
                onclick="toLoc('cute-file-browser/index.html')"> Cute File Browser </button>

        <button class="btn btn-primary btn-lg bd-top"
                onclick="toLoc('dsmorse-gridster.js-3613220/demos/index.html')"> gridster.js </button>

        <button class="btn btn-primary btn-lg bd-top"
                onclick="toLoc('html5-music-player-app/index.html')"> html5-music-player-app </button>

        <button class="btn btn-primary btn-lg bd-top"
                onclick="toLoc('http://interface.eyecon.ro/demos/')"> interface </button>

        <button class="btn btn-primary btn-lg bd-top"
                onclick="toLoc('jquery.avgrund.js-master/example/index.html')"> jquery.avgrund.js-master </button>

        <button class="btn btn-primary btn-lg bd-top"
                onclick="toLoc('https://www.tinymce.com/docs/demo/basic-example/')"> tinymce_4.3.13 </button>

        <p><?php ?></p>
    </div>
</section>
<?php include_once 'footer.php' ?>
</body>
</html>