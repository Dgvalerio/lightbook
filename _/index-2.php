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
    <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.0.0-alpha.4/dist/css/bootstrap.css">
    <script src="../js/jquery-3.1.0.min.js"> </script>
    <script src="../js/js.js"> </script>
    <script src="../bootstrap-4.0.0-alpha.4/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/01.css">
    <?php include_once'01.php' ?>
    <?php
    $result = mysqli_query($link, "select * from lights;" ); if (!$result) {}
    while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['userid'] == $id_usuario) { $walp = $confere['wall'] . '.jpg'; } }
    print("<style> body { background-image: url('../img/$walp'); } </style>"); ?>

</head>
<body class="container-fluid text-md-center"> <br/>
<header> <h1> LightBook: <?php echo $usuario; ?> </h1> <br/> <?php include_once'mn.php' ?> </header>
<section>
<div class="">
    <div class="card col-md-4 b-cl-12">
        <div class="card-block">
            <h4 class="card-title"><span class="glyphicon glyphicon-picture"></span> Planos de Fundo </h4>
            <p class="card-text"> <b> (!)(+) </b>: Parado em bom estado. </p>
        </div>
        <img class="card-img w-100" src="<?php print("../img/$walp")?>" alt="Plano de fundo atual" onclick="toLocal(2)">
        <div class="card-block">
            <p class="card-text"> Selecione o plano de fundo de sua preferência. </p>
            <a onclick="toLocal(2)" href="wall/01.php" class="btn btn-primary">Vamos lá</a>
        </div>
    </div>

    <div class="card col-md-4 b-cl-12">
        <div class="card-block">
            <h4 class="card-title"><span class="glyphicon glyphicon-list-alt"></span> Projetos </h4>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"    onclick="toLocal(3)"> (+) Atalhos  </li>
            <li class="list-group-item"    onclick="toLocal(4)"> (+) Alerta!  </li>
            <li class="list-group-item"    onclick="toLocal(6)"> (-) MySIG    </li>
            <li class="list-group-item"    onclick="toLocal(7)"> (+) OkTasks  </li>
            <li class="list-group-item"    onclick="toLocal(9)"> (!)(-) Progress  </li>
        </ul>
        <div class="card-block">
            <p class="card-text"> <b> ! </b>: Parado. </p>
            <p class="card-text"> <b> + </b>: Em bom estado. </p>
            <p class="card-text"> <b> - </b>: Em mau estado. </p>
        </div>
    </div>

    <div class="card col-md-4 b-cl-12">
        <div class="card-block">
            <h4 class="card-title"><span class="glyphicon glyphicon-plus"></span> Implementa </h4>
            <p class="card-text"> <b> (+) </b>: Em bom estado. </p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"
                onclick="toLoc('imp/alertify.js-0.3.11/example/index.html')"> alertify.js-0.3.11 </li>

            <li class="list-group-item"
                onclick="toLoc('imp/cute-file-browser/index.html')"> Cute File Browser </li>

            <li class="list-group-item"
                onclick="toLoc('imp/dsmorse-gridster.js-3613220/demos/index.html')"> gridster.js </li>

            <li class="list-group-item"
                onclick="toLoc('imp/html5-music-player-app/index.html')"> html5-music-player-app </li>

            <li class="list-group-item"
                onclick="toLoc('http://interface.eyecon.ro/demos/')"> interface </li>

            <li class="list-group-item"
                onclick="toLoc('imp/jquery.avgrund.js-master/example/index.html')"> jquery.avgrund.js-master </li>

            <li class="list-group-item"
                onclick="toLoc('https://www.tinymce.com/docs/demo/basic-example/')"> tinymce_4.3.13 </li>
        </ul>
        <br/>
    </div>
</div>


<?php include_once 'footer.php' ?>
</body>
</html>