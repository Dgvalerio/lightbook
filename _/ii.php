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
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/demo.css"> -->
    <link rel="stylesheet" type="text/css" href="imp/dsmorse-gridster.js-3613220/dist/jquery.gridster.min.css">

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
    <script src="imp/dsmorse-gridster.js-3613220/dist/jquery.gridster.min.js" type="text/javascript" charset="utf-8"></script>
    <?php include_once'01.php' ?>
    <?php
    $result = mysqli_query($link, "select * from lights;" ); if (!$result) {}
    while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['userid'] == $id_usuario) { $walp = $confere['wall'] . '.jpg'; } }
    print("<style> body { background-image: url('../img/$walp'); } </style>"); ?>

</head>
<body class="container-fluid text-md-center"> <br/>
<header> <h1> LightBook </h1> <br/> </header>
<section>
<div id="demo-1" class="gridster ready"> <ul>

    <li data-row="1" data-col="1" data-sizex="1" data-sizey="1" ondblclick="toLocal(2)" title="Plano de Fundo">
        <span class="icn glyphicon glyphicon-picture"></span> </li>

    <li data-row="2" data-col="1" data-sizex="1" data-sizey="1" ondblclick="toLocal(3)" title="(+) Atalhos">
        <span class="icn glyphicon glyphicon-tags"></span> </li>

    <li data-row="3" data-col="1" data-sizex="1" data-sizey="1" ondblclick="toLocal(4)" title="(+) Alerta!">
        <span class="icn glyphicon glyphicon-plus-sign"></span> </li>

    <li data-row="4" data-col="1" data-sizex="1" data-sizey="1" ondblclick="toLocal(6)" title="(-) MySIG">
        <span class="icn glyphicon glyphicon-user"></span> </li>

    <li data-row="5" data-col="1" data-sizex="1" data-sizey="1" ondblclick="toLocal(7)" title="(+) OkTasks">
        <span class="icn glyphicon glyphicon-list"></span> </li>

    <li data-row="6" data-col="1" data-sizex="1" data-sizey="1" ondblclick="toLocal(9)" title="(!)(-) Progress">
        <span class="icn glyphicon glyphicon-tasks"></span> </li>

    <li data-row="7" data-col="1" data-sizex="1" data-sizey="1"
        ondblclick="toLoc('imp/alertify.js-0.3.11/example/index.html')" title="alertify.js-0.3.11">
            <span class="icn glyphicon glyphicon-warning-sign"></span> </li>

    <li data-row="1" data-col="2" data-sizex="1" data-sizey="1"
        ondblclick="toLoc('imp/cute-file-browser/index.html')" title="Cute File Browser">
            <span class="icn glyphicon glyphicon-folder-open"></span> </li>

    <li data-row="2" data-col="2" data-sizex="1" data-sizey="1"
        ondblclick="toLoc('imp/dsmorse-gridster.js-3613220/demos/index.html')" title="gridster.js">
            <span class="icn glyphicon glyphicon-th-large"></span> </li>

    <li data-row="3" data-col="2" data-sizex="1" data-sizey="1" ondblclick="opnW(1)" title="html5-music-player-app">
        <span class='icn glyphicon glyphicon-music'></span> </li>

    <li data-row="4" data-col="2" data-sizex="1" data-sizey="1"
        ondblclick="toLoc('http://interface.eyecon.ro/demos/')" title="(-) interface.eyecon">
            <span class="icn glyphicon glyphicon-new-window"></span> </li>

    <li data-row="5" data-col='2' data-sizex="1" data-sizey="1"
        ondblclick="toLoc('imp/jquery.avgrund.js-master/example/index.html')" title="jquery.avgrund.js-master">
            <span class="icn glyphicon glyphicon-alert"></span> </li>

    <li data-row="6" data-col="2" data-sizex="1" data-sizey="1"
        ondblclick="toLoc('https://www.tinymce.com/docs/demo/basic-example/')" title="(-) tinymce_4.3.13">
            <span class="icn glyphicon glyphicon-option-vertical"></span> </li>
</ul> </div>
</section>
<script type="text/javascript" id="code">
    var gridster;
    $(function () {
        gridster = $(".gridster > ul").gridster({
            widget_margins: [0, 0],
            widget_base_dimensions: [74, 74]
        }).data('gridster');
    });
</script>
</body>
</html>