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
<header> <h1> LightBook: O Web futuro está aqui. </h1> <br/> <?php include_once'mn.php' ?> </header>
<section>
<div class="col-md-12">
    <span class='icn glyphicon glyphicon-asterisk   '></span>
    <span class='icn glyphicon glyphicon-plus       '></span>
    <span class='icn glyphicon glyphicon-euro       '></span>
    <span class='icn glyphicon glyphicon-eur        '></span>
    <span class='icn glyphicon glyphicon-minus      '></span>
    <span class='icn glyphicon glyphicon-cloud      '></span>
    <span class='icn glyphicon glyphicon-envelope   '></span>
    <span class='icn glyphicon glyphicon-pencil     '></span>
    <span class='icn glyphicon glyphicon-glass      '></span>
    <span class='icn glyphicon glyphicon-music      '></span>
    <span class='icn glyphicon glyphicon-search     '></span>
    <span class='icn glyphicon glyphicon-heart      '></span>

    <span class="icn glyphicon glyphicon-star"></span>
    <span class="icn glyphicon glyphicon-star-empty"></span>
    <span class="icn glyphicon glyphicon-user"></span>
    <span class="icn glyphicon glyphicon-film"></span>
    <span class="icn glyphicon glyphicon-th-large"></span>
    <span class="icn glyphicon glyphicon-th"></span>
    <span class="icn glyphicon glyphicon-th-list"></span>
    <span class="icn glyphicon glyphicon-ok"></span>
    <span class="icn glyphicon glyphicon-remove"></span>
    <span class="icn glyphicon glyphicon-zoom-in"></span>
    <span class="icn glyphicon glyphicon-zoom-out"></span>
    <span class="icn glyphicon glyphicon-off"></span>
    <span class="icn glyphicon glyphicon-signal"></span>
    <span class="icn glyphicon glyphicon-cog"></span>
    <span class="icn glyphicon glyphicon-trash"></span>
    <span class="icn glyphicon glyphicon-home"></span>
    <span class="icn glyphicon glyphicon-file"></span>
    <span class="icn glyphicon glyphicon-time"></span>
    <span class="icn glyphicon glyphicon-road"></span>
    <span class="icn glyphicon glyphicon-download-alt"></span>
    <span class="icn glyphicon glyphicon-download"></span>
    <span class="icn glyphicon glyphicon-upload"></span>
    <span class="icn glyphicon glyphicon-inbox"></span>
    <span class="icn glyphicon glyphicon-play-circle"></span>
    <span class="icn glyphicon glyphicon-repeat"></span>
    <span class="icn glyphicon glyphicon-refresh"></span>
    <span class="icn glyphicon glyphicon-list-alt"></span>
    <span class="icn glyphicon glyphicon-lock"></span>
    <span class="icn glyphicon glyphicon-flag"></span>
    <span class="icn glyphicon glyphicon-headphones"></span>
    <span class="icn glyphicon glyphicon-volume-off"></span>
    <span class="icn glyphicon glyphicon-volume-down"></span>
    <span class="icn glyphicon glyphicon-volume-up"></span>
    <span class="icn glyphicon glyphicon-qrcode"></span>
    <span class="icn glyphicon glyphicon-barcode"></span>
    <span class="icn glyphicon glyphicon-tag"></span>
    <span class="icn glyphicon glyphicon-tags"></span>
    <span class="icn glyphicon glyphicon-book"></span>
    <span class="icn glyphicon glyphicon-bookmark"></span>
    <span class="icn glyphicon glyphicon-print"></span>
    <span class="icn glyphicon glyphicon-camera"></span>
    <span class="icn glyphicon glyphicon-font"></span>
    <span class="icn glyphicon glyphicon-bold"></span>
    <span class="icn glyphicon glyphicon-italic"></span>
    <span class="icn glyphicon glyphicon-text-height"></span>
    <span class="icn glyphicon glyphicon-text-width"></span>
    <span class="icn glyphicon glyphicon-align-left"></span>
    <span class="icn glyphicon glyphicon-align-center"></span>
    <span class="icn glyphicon glyphicon-align-right"></span>
    <span class="icn glyphicon glyphicon-align-justify"></span>
    <span class="icn glyphicon glyphicon-list"></span>
    <span class="icn glyphicon glyphicon-indent-left"></span>
    <span class="icn glyphicon glyphicon-indent-right"></span>
    <span class="icn glyphicon glyphicon-facetime-video"></span>
    <span class="icn glyphicon glyphicon-picture"></span>
    <span class="icn glyphicon glyphicon-map-marker"></span>
    <span class="icn glyphicon glyphicon-adjust"></span>
    <span class="icn glyphicon glyphicon-tint"></span>
    <span class="icn glyphicon glyphicon-edit"></span>
    <span class="icn glyphicon glyphicon-share"></span>
    <span class="icn glyphicon glyphicon-check"></span>
    <span class="icn glyphicon glyphicon-move"></span>
    <span class="icn glyphicon glyphicon-step-backward"></span>
    <span class="icn glyphicon glyphicon-fast-backward"></span>
    <span class="icn glyphicon glyphicon-backward"></span>
    <span class="icn glyphicon glyphicon-play"></span>
    <span class="icn glyphicon glyphicon-pause"></span>
    <span class="icn glyphicon glyphicon-stop"></span>
    <span class="icn glyphicon glyphicon-forward"></span>
    <span class="icn glyphicon glyphicon-fast-forward"></span>
    <span class="icn glyphicon glyphicon-step-forward"></span>
    <span class="icn glyphicon glyphicon-eject"></span>
    <span class="icn glyphicon glyphicon-chevron-left"></span>
    <span class="icn glyphicon glyphicon-chevron-right"></span>
    <span class="icn glyphicon glyphicon-plus-sign"></span>
    <span class="icn glyphicon glyphicon-minus-sign"></span>
    <span class="icn glyphicon glyphicon-remove-sign"></span>
    <span class="icn glyphicon glyphicon-ok-sign"></span>
    <span class="icn glyphicon glyphicon-question-sign"></span>
    <span class="icn glyphicon glyphicon-info-sign"></span>
    <span class="icn glyphicon glyphicon-screenshot"></span>
    <span class="icn glyphicon glyphicon-remove-circle"></span>
    <span class="icn glyphicon glyphicon-ok-circle"></span>
    <span class="icn glyphicon glyphicon-ban-circle"></span>
    <span class="icn glyphicon glyphicon-arrow-left"></span>
    <span class="icn glyphicon glyphicon-arrow-right"></span>
    <span class="icn glyphicon glyphicon-arrow-up"></span>
    <span class="icn glyphicon glyphicon-arrow-down"></span>
    <span class="icn glyphicon glyphicon-share-alt"></span>
    <span class="icn glyphicon glyphicon-resize-full"></span>
    <span class="icn glyphicon glyphicon-resize-small"></span>
    <span class="icn glyphicon glyphicon-exclamation-sign"></span>
    <span class="icn glyphicon glyphicon-gift"></span>
    <span class="icn glyphicon glyphicon-leaf"></span>
    <span class="icn glyphicon glyphicon-fire"></span>
    <span class="icn glyphicon glyphicon-eye-open"></span>
    <span class="icn glyphicon glyphicon-eye-close"></span>
    <span class="icn glyphicon glyphicon-warning-sign"></span>
    <span class="icn glyphicon glyphicon-plane"></span>
    <span class="icn glyphicon glyphicon-calendar"></span>
    <span class="icn glyphicon glyphicon-random"></span>
    <span class="icn glyphicon glyphicon-comment"></span>
    <span class="icn glyphicon glyphicon-magnet"></span>
    <span class="icn glyphicon glyphicon-chevron-up"></span>
    <span class="icn glyphicon glyphicon-chevron-down"></span>
    <span class="icn glyphicon glyphicon-retweet"></span>
    <span class="icn glyphicon glyphicon-shopping-cart"></span>
    <span class="icn glyphicon glyphicon-folder-close"></span>
    <span class="icn glyphicon glyphicon-folder-open"></span>
    <span class="icn glyphicon glyphicon-resize-vertical"></span>
    <span class="icn glyphicon glyphicon-resize-horizontal"></span>
    <span class="icn glyphicon glyphicon-hdd"></span>
    <span class="icn glyphicon glyphicon-bullhorn"></span>
    <span class="icn glyphicon glyphicon-bell"></span>
    <span class="icn glyphicon glyphicon-certificate"></span>
    <span class="icn glyphicon glyphicon-thumbs-up"></span>
    <span class="icn glyphicon glyphicon-thumbs-down"></span>
    <span class="icn glyphicon glyphicon-hand-right"></span>
    <span class="icn glyphicon glyphicon-hand-left"></span>
    <span class="icn glyphicon glyphicon-hand-up"></span>
    <span class="icn glyphicon glyphicon-hand-down"></span>
    <span class="icn glyphicon glyphicon-circle-arrow-right"></span>
    <span class="icn glyphicon glyphicon-circle-arrow-left"></span>
    <span class="icn glyphicon glyphicon-circle-arrow-up"></span>
    <span class="icn glyphicon glyphicon-circle-arrow-down"></span>
    <span class="icn glyphicon glyphicon-globe"></span>
    <span class="icn glyphicon glyphicon-wrench"></span>
    <span class="icn glyphicon glyphicon-tasks"></span>
    <span class="icn glyphicon glyphicon-filter"></span>
    <span class="icn glyphicon glyphicon-briefcase"></span>
    <span class="icn glyphicon glyphicon-fullscreen"></span>
    <span class="icn glyphicon glyphicon-dashboard"></span>
    <span class="icn glyphicon glyphicon-paperclip"></span>
    <span class="icn glyphicon glyphicon-heart-empty"></span>
    <span class="icn glyphicon glyphicon-link"></span>
    <span class="icn glyphicon glyphicon-phone"></span>
    <span class="icn glyphicon glyphicon-pushpin"></span>
    <span class="icn glyphicon glyphicon-usd"></span>
    <span class="icn glyphicon glyphicon-gbp"></span>
    <span class="icn glyphicon glyphicon-sort"></span>
    <span class="icn glyphicon glyphicon-sort-by-alphabet"></span>
    <span class="icn glyphicon glyphicon-sort-by-alphabet-alt"></span>
    <span class="icn glyphicon glyphicon-sort-by-order"></span>
    <span class="icn glyphicon glyphicon-sort-by-order-alt"></span>
    <span class="icn glyphicon glyphicon-sort-by-attributes"></span>
    <span class="icn glyphicon glyphicon-sort-by-attributes-alt"></span>
    <span class="icn glyphicon glyphicon-unchecked"></span>
    <span class="icn glyphicon glyphicon-expand"></span>
    <span class="icn glyphicon glyphicon-collapse-down"></span>
    <span class="icn glyphicon glyphicon-collapse-up"></span>
    <span class="icn glyphicon glyphicon-log-in"></span>
    <span class="icn glyphicon glyphicon-flash"></span>
    <span class="icn glyphicon glyphicon-log-out"></span>
    <span class="icn glyphicon glyphicon-new-window"></span>
    <span class="icn glyphicon glyphicon-record"></span>
    <span class="icn glyphicon glyphicon-save"></span>
    <span class="icn glyphicon glyphicon-open"></span>
    <span class="icn glyphicon glyphicon-saved"></span>
    <span class="icn glyphicon glyphicon-import"></span>
    <span class="icn glyphicon glyphicon-export"></span>
    <span class="icn glyphicon glyphicon-send"></span>
    <span class="icn glyphicon glyphicon-floppy-disk"></span>
    <span class="icn glyphicon glyphicon-floppy-saved"></span>
    <span class="icn glyphicon glyphicon-floppy-remove"></span>
    <span class="icn glyphicon glyphicon-floppy-save"></span>
    <span class="icn glyphicon glyphicon-floppy-open"></span>
    <span class="icn glyphicon glyphicon-credit-card"></span>
    <span class="icn glyphicon glyphicon-transfer"></span>
    <span class="icn glyphicon glyphicon-cutlery"></span>
    <span class="icn glyphicon glyphicon-header"></span>
    <span class="icn glyphicon glyphicon-compressed"></span>
    <span class="icn glyphicon glyphicon-earphone"></span>
    <span class="icn glyphicon glyphicon-phone-alt"></span>
    <span class="icn glyphicon glyphicon-tower"></span>
    <span class="icn glyphicon glyphicon-stats"></span>
    <span class="icn glyphicon glyphicon-sd-video"></span>
    <span class="icn glyphicon glyphicon-hd-video"></span>
    <span class="icn glyphicon glyphicon-subtitles"></span>
    <span class="icn glyphicon glyphicon-sound-stereo"></span>
    <span class="icn glyphicon glyphicon-sound-dolby"></span>
    <span class="icn glyphicon glyphicon-sound-5-1"></span>
    <span class="icn glyphicon glyphicon-sound-6-1"></span>
    <span class="icn glyphicon glyphicon-sound-7-1"></span>
    <span class="icn glyphicon glyphicon-copyright-mark"></span>
    <span class="icn glyphicon glyphicon-registration-mark"></span>
    <span class="icn glyphicon glyphicon-cloud-download"></span>
    <span class="icn glyphicon glyphicon-cloud-upload"></span>
    <span class="icn glyphicon glyphicon-tree-conifer"></span>
    <span class="icn glyphicon glyphicon-tree-deciduous"></span>
    <span class="icn glyphicon glyphicon-cd"></span>
    <span class="icn glyphicon glyphicon-save-file"></span>
    <span class="icn glyphicon glyphicon-open-file"></span>
    <span class="icn glyphicon glyphicon-level-up"></span>
    <span class="icn glyphicon glyphicon-copy"></span>
    <span class="icn glyphicon glyphicon-paste"></span>
    <span class="icn glyphicon glyphicon-alert"></span>
    <span class="icn glyphicon glyphicon-equalizer"></span>
    <span class="icn glyphicon glyphicon-king"></span>
    <span class="icn glyphicon glyphicon-queen"></span>
    <span class="icn glyphicon glyphicon-pawn"></span>
    <span class="icn glyphicon glyphicon-bishop"></span>
    <span class="icn glyphicon glyphicon-knight"></span>
    <span class="icn glyphicon glyphicon-baby-formula"></span>
    <span class="icn glyphicon glyphicon-tent"></span>
    <span class="icn glyphicon glyphicon-blackboard"></span>
    <span class="icn glyphicon glyphicon-bed"></span>
    <span class="icn glyphicon glyphicon-apple"></span>
    <span class="icn glyphicon glyphicon-erase"></span>
    <span class="icn glyphicon glyphicon-hourglass"></span>
    <span class="icn glyphicon glyphicon-lamp"></span>
    <span class="icn glyphicon glyphicon-duplicate"></span>
    <span class="icn glyphicon glyphicon-piggy-bank"></span>
    <span class="icn glyphicon glyphicon-scissors"></span>
    <span class="icn glyphicon glyphicon-bitcoin"></span>
    <span class="icn glyphicon glyphicon-btc"></span>
    <span class="icn glyphicon glyphicon-xbt"></span>
    <span class="icn glyphicon glyphicon-yen"></span>
    <span class="icn glyphicon glyphicon-jpy"></span>
    <span class="icn glyphicon glyphicon-ruble"></span>
    <span class="icn glyphicon glyphicon-rub"></span>
    <span class="icn glyphicon glyphicon-scale"></span>
    <span class="icn glyphicon glyphicon-ice-lolly"></span>
    <span class="icn glyphicon glyphicon-ice-lolly-tasted"></span>
    <span class="icn glyphicon glyphicon-education"></span>
    <span class="icn glyphicon glyphicon-option-horizontal"></span>
    <span class="icn glyphicon glyphicon-option-vertical"></span>
    <span class="icn glyphicon glyphicon-menu-hamburger"></span>
    <span class="icn glyphicon glyphicon-modal-window"></span>
    <span class="icn glyphicon glyphicon-oil"></span>
    <span class="icn glyphicon glyphicon-grain"></span>
    <span class="icn glyphicon glyphicon-sunglasses"></span>
    <span class="icn glyphicon glyphicon-text-size"></span>
    <span class="icn glyphicon glyphicon-text-color"></span>
    <span class="icn glyphicon glyphicon-text-background"></span>
    <span class="icn glyphicon glyphicon-object-align-top"></span>
    <span class="icn glyphicon glyphicon-object-align-bottom"></span>
    <span class="icn glyphicon glyphicon-object-align-horizontal"></span>
    <span class="icn glyphicon glyphicon-object-align-left"></span>
    <span class="icn glyphicon glyphicon-object-align-vertical"></span>
    <span class="icn glyphicon glyphicon-object-align-right"></span>
    <span class="icn glyphicon glyphicon-triangle-right"></span>
    <span class="icn glyphicon glyphicon-triangle-left"></span>
    <span class="icn glyphicon glyphicon-triangle-bottom"></span>
    <span class="icn glyphicon glyphicon-triangle-top"></span>
    <span class="icn glyphicon glyphicon-console"></span>
    <span class="icn glyphicon glyphicon-superscript"></span>
    <span class="icn glyphicon glyphicon-subscript"></span>
    <span class="icn glyphicon glyphicon-menu-left"></span>
    <span class="icn glyphicon glyphicon-menu-right"></span>
    <span class="icn glyphicon glyphicon-menu-down"></span>
    <span class="icn glyphicon glyphicon-menu-up"></span>

</div>
<?php include_once 'footer.php' ?>
</body>
</html>