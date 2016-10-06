<?php header("Content-Type: text/html; charset=UTF-8", true); $estado = 0;
/**
 * Created by PhpStorm.
 * User: Dgvalério
 * Date: 19/09/2016
 * Time: 11:22
 */
/* Conexão */ $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); };
/* Criação do Banco de Cadastro */ $sql = 'create database if not exists `lightbook` default character set utf8 collate utf8_general_ci;'; if (mysqli_query($link, $sql)) { echo ""; } else { echo 'Erro criando o banco de dados: ' . mysqli_connect_error() . "\n"; }
/* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'lightbook'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }
/* Criação da Tabela Usuários */ $sql = 'create table if not exists lightbook ( id int not null auto_increment, usuario varchar(30), nome varchar(40), senha varchar(30), primary key(id)) default charset = utf8;'; if (mysqli_query($link, $sql)) { } else { echo 'Erro: ' . mysqli_connect_error() . "\n"; }
/* Criação da Tabela Logins */ $sql = 'create table if not exists logbook ( id int not null auto_increment, userid int not null, ip varchar(40) not null, hora int not null, minuto int not null, quando varchar(40), primary key(id), foreign key (userid) references lightbook(id) ) default charset = utf8;'; if (mysqli_query($link, $sql)) { } else { echo 'Erro 2 ' . mysqli_connect_error() . "\n"; }
/* Criação da Tabela de Salvos */ $sql = 'create table if not exists lights ( id int not null auto_increment, userid int not null, wall varchar(30), primary key(id), foreign key (userid) references lightbook(id)) default charset = utf8;'; if (mysqli_query($link, $sql)) { } else { echo 'Erro 3 ' . mysqli_connect_error() . "\n"; }

$result = mysqli_query($link, "select * from lightbook where usuario = 'Mestre';"); if (!$result) {} while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['usuario'] == 'Mestre') {$estado = 1;} else { } }
if ($estado == 0) { $sql = "insert into lightbook (usuario, nome, senha) values ('Mestre', 'Super Mestre', 'mister_carter2121');"; if (mysqli_query($link, $sql)) { } else { echo 'Erro: ' . mysqli_connect_error() . "\n"; } }

/* Example use of getenv() $ipp = getenv("REMOTE_ADDR"); Or simply use a Superglobal ($_SERVER or $_ENV) */ $ipp = $_SERVER["REMOTE_ADDR"];
$result = mysqli_query($link, "select * from logbook;" ); if (!$result) {} while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['ip'] == $ipp) { print("<script> location.href = '_/index.php'; </script>"); } }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> LightBook </title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-alpha.4/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/01.css">
    <script src="js/jquery-3.1.0.min.js"> </script>
    <script src="bootstrap-4.0.0-alpha.4/dist/js/bootstrap.min.js"></script>
    <script>
        setInterval('formLog()' ,500);
        function formLog() {
            if ($("#inpLog").val() == '' || $("#inpSen").val() == '') {
                $("#sW").html('');
                $("#log").collapse('hide');
            } else { $("#log").collapse('show'); }
        }

        function alg() {
            var inpLog = $("#inpLog"); var inpLogPost = inpLog.val();
            var inpSen = $("#inpSen"); var inpSenPost = inpSen.val();
            $.post("cad.php", {inpLog: inpLogPost, inpSen: inpSenPost},  function(data){ $("#sW").html(data); }, "html");
        }

        $(document).keypress(function(e) { if(e.which == 13) $('#log').click(); });

        $(document).ready(function() {
            $("#log").click(function() {
                var inpLog = $("#inpLog"); var inpLogPost = inpLog.val();
                var inpSen = $("#inpSen"); var inpSenPost = inpSen.val();
                if (inpLogPost == '' || inpSenPost == '') { $("#sW").html('');
                    alert ('Por favor, preencha todos os campos!'); } else {
                    $.post("log.php", {inpLog: inpLogPost, inpSen: inpSenPost}, function(data){ $("#sW").html(data); }, "html");
                }
            });
        });
    </script>
</head>
<body class="container text-md-center"> <br/>
<header class="col-md-12">
    <h1> LightBook </h1> <br/>
</header>
<section class="col-md-12">
    <form action="#" method="post">
        <label for="inpLog"> Login </label> <input name="inpLog" id="inpLog" type="text" class="form-control"><br/>
        <label for="inpSen"> Senha </label> <input name="inpSen" id="inpSen" type="password" class="form-control"><br/>
        <input type="button" id="log" value="Logar ou Cadastrar" class="btn btn-primary btn-block collapse">
    </form>
    <div id="sW"> </div>
</section>
<footer class="col-md-12"> <br/>
    <p> Setembro de 2016 </p>
</footer>
</body>
</html>