<?php header("Content-Type: text/html; charset=UTF-8",true); $test1 = 0; $usuario = ''; $id_us = 0; $walp = '24606.jpg'; $test2 = 0; $B1 = 0; $B2 = 0; $B3 = 0; $B4 = 0;
/* Conexão */ $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); };
/* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'lightbook'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }
/* Example use of getenv() $ipp = getenv("REMOTE_ADDR"); Or simply use a Superglobal ($_SERVER or $_ENV) */ $ipp = $_SERVER["REMOTE_ADDR"];
$result = mysqli_query($link, "select * from logbook;" ); if (!$result) {} while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['ip'] == $ipp) { $test1 = 1; $id_us = $usuario = $confere['userid']; break; } }
$result = mysqli_query($link, "select * from lightbook;" ); if (!$result) {} while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['id'] == $usuario) { $usuario = $confere['usuario']; break; } }
if ($test1 == 0){ print("<script> location.href = '../../index.php'; </script>"); }

/* Criação da Tabela Usuários */ $sql = '
create table if not exists lightsig ( 
  id int not null auto_increment, 
  iduser int not null, 
  nome varchar(40), 
  b1 float,
  b2 float,
  b3 float,
  b4 float,
  primary key(id)
) default charset = utf8;'; if (mysqli_query($link, $sql)) { } else { echo 'Erro: ' . mysqli_connect_error() . "\n"; }

$result = mysqli_query($link, "select * from lightsig;" ); if (!$result) {} while ($confere = mysqli_fetch_assoc($result) ) { $test2 = 1; }
if ($test2 == 0 ) {
    print(" <script> alert('iuhuuuuuuu') </script> ");
    for ($i = 1; $i <= 15 ;$i+=1) {
        if ($i == 1) {          $vMat = "Biologia";
        } elseif ($i == 2) {    $vMat = "Desenho";
        } elseif ($i == 3) {    $vMat = "Educação Física";
        } elseif ($i == 4) {    $vMat = "Estrutura de dados";
        } elseif ($i == 5) {    $vMat = "Filosofia";
        } elseif ($i == 6) {    $vMat = "Física";
        } elseif ($i == 7) {    $vMat = "Geografia";
        } elseif ($i == 8) {    $vMat = "Historia";
        } elseif ($i == 9) {    $vMat = "Introdução A Banco De Dados";
        } elseif ($i == 10) {   $vMat = "Língua Inglesa";
        } elseif ($i == 11) {   $vMat = "Língua Portuguesa";
        } elseif ($i == 12) {   $vMat = "Matemática";
        } elseif ($i == 13) {   $vMat = "Química";
        } elseif ($i == 14) {   $vMat = "Sistemas De Computação";
        } elseif ($i == 15) {   $vMat = "Sociologia";
        } $sql = "insert into lightsig (iduser, nome, b1, b2, b3, b4) values ('$id_us', '$vMat', '$B1', '$B2', '$B3', '$B4');"; if (mysqli_query($link, $sql)) { } else {print ("Error" . mysqli_error($link));}
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../../bootstrap-4.0.0-alpha.4/dist/css/bootstrap.css">
    <script src="../../js/jquery-3.1.0.min.js"> </script>
    <script src="../../js/js.js"> </script>
    <script src="../../bootstrap-4.0.0-alpha.4/dist/js/bootstrap.min.js"> </script>
    <link rel="stylesheet" type="text/css" href="../../css/01.css">
    <link rel="stylesheet" type="text/css" href="../../css/sig.css">
    <title> LightBook </title>
    <?php
    $result = mysqli_query($link, "select * from lights;" ); if (!$result) {}
    while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['userid'] == $id_us) { $walp = $confere['wall'] . '.jpg'; } }
    print("<style> body { background-image: url('../../img/$walp'); } </style>"); ?>

    <script src="../../js/alert/js.js"></script>
</head>
<body class="container text-md-center"> <br/>
<header> <h1> LightBook </h1> <h2>Projeto: MySIG</h2> <br/> <?php include_once'mn.php' ?> </header>
<section>

    <table class="table b-cl-12 text-md-left">
        <thead>
        <tr>
            <th>Disciplina</th>
            <th>1º B</th>
            <th>2º B</th>
            <th>Média S.</th>
            <th>Rec. S</th>
            <th>3º B</th>
            <th>4º B</th>
            <th>Média S.</th>
            <th>Rec. S</th>
            <th>Soma F.</th>
            <th>Média F.</th>
            <th>Rec. F</th>
        </tr>
        </thead>
        <tbody>
<?php $vId = '-';
$result = mysqli_query($link, "select * from lightsig;" ); if (!$result) {}
while ($confere = mysqli_fetch_assoc($result) ) {
    $vId = $confere['nome'];

    $nB1 = $confere['b1'];                  $cB1 = 'cN' . substr($nB1, 0, 1);
    $nB2 = $confere['b2'];                  $cB2 = 'cN' . substr($nB2, 0, 1);
    $nS1 = ($nB1 + $nB2) / 2;               $cS1 = 'cN' . substr($nS1, 0, 1);
    $nR1 = 0;               $cR1 = 'cN' . substr($nR1, 0, 1);

    $nB3 = $confere['b3'];                  $cB3 = 'cN' . substr($nB3, 0, 1);
    $nB4 = $confere['b4'];                  $cB4 = 'cN' . substr($nB4, 0, 1);
    $nS2 = ($nB3 + $nB4) / 2;               $cS2 = 'cN' . substr($nS2, 0, 1);
    $nR2 = 0;               $cR2 = 'cN' . substr($nR2, 0, 1);

    $nF = ($nB1 + $nB2 + $nB3 + $nB4) / 4;  $cF = 'cN' . substr($nF, 0, 1);
    $nRF = 0;               $cRF = 'cN' . substr($nRF, 0, 1);
    $nSF = $nB1 + $nB2 + $nB3 + $nB4;

    print ("
            <tr class='no'>
                <th scope='row' class='$cF'>$confere[nome]</th>
                <td class='$cB1' onclick=\"edit('$vId', '1º Bimestre', 1)\">$nB1</td>
                <td class='$cB2' onclick=\"edit('$vId', '2º Bimestre', 2)\">$nB2</td>
                <td class='$cS1'>  $nS1</td>
                <td class='$cR1'>  $nR1</td>
                <td class='$cB3' onclick=\"edit('$vId', '3º Bimestre', 3)\">$nB3</td>
                <td class='$cB4' onclick=\"edit('$vId', '4º Bimestre', 4)\">$nB4</td>
                <td class='$cS2'>  $nS2</td>
                <td class='$cR2'>  $nR2</td>
                <td class='$cF'>   $nSF</td>
                <td class='$cF'>   $nF </td>
                <td class='$cRF'>  $nRF</td>
            </tr>          
             ");
}
?>

        <form class="collapse" id="nts" name="nts" action="edit.php" method="post">
            <input class="collapse" type="text" id="cMat" name="cMat" value="-">
            <input class="collapse" type="text" id="cNot" name="cNot" value="-">
            <input class="collapse" type="text" id="nBim" name="nBim" value="-">
        </form>

        </tbody>
    </table>

</section>
<?php include_once '../footer.php' ?>

<script>
    function edit(aa, bb, cc) {
        var cMat = $("#cMat"); cMat.val(aa);
        var cNot = $("#cNot"); cNot.val(bb);
        var nBim = $("#nBim"); nBim.val(cc);

        document.nts.submit();
    }
</script>
</body>
</html>