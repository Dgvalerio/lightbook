<?php header("Content-Type: text/html; charset=UTF-8",true); $test1 = 0; $usuario = ''; $id_us = 0; $walp = '24606.jpg'; $test2 = 0; $B1 = 0; $B2 = 0; $B3 = 0; $B4 = 0;
/* Conexão */ $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); };
/* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'lightbook'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }
/* Example use of getenv() $ipp = getenv("REMOTE_ADDR"); Or simply use a Superglobal ($_SERVER or $_ENV) */ $ipp = $_SERVER["REMOTE_ADDR"];
$result = mysqli_query($link, "select * from logbook;" ); if (!$result) {} while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['ip'] == $ipp) { $test1 = 1; $id_us = $usuario = $confere['userid']; break; } }
$result = mysqli_query($link, "select * from lightbook;" ); if (!$result) {} while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['id'] == $usuario) { $usuario = $confere['usuario']; break; } }
if ($test1 == 0){ print("<script> location.href = '../../index.php'; </script>"); }

/* Criação da Tabela */ $sql = 'create table if not exists lightsig ( 
  id int not null auto_increment, 
  iduser int not null, 
  nome varchar(40), 
  b1 float,
  b2 float,
  b3 float,
  b4 float,
  primary key(id)
) default charset = utf8;'; if (mysqli_query($link, $sql)) { } else { echo 'Erro: ' . mysqli_connect_error() . "\n"; }

/* Criação da Tabela */ $sql = 'create table if not exists lightsig_not ( 
  id int not null auto_increment, 
  iduser int not null, 
  nome varchar(40), 
  n1 float,   p1 float,
  n2 float,   p2 float,
  n3 float,   p3 float,
  n4 float,   p4 float,
  n5 float,   p5 float,   
  n6 float,   p6 float,
  n7 float,   p7 float,
  n8 float,   p8 float,
  n9 float,   p9 float,
  n10 float,  p10 float,
  mb float,
  bm int,
  primary key(id)
) default charset = utf8;'; if (mysqli_query($link, $sql)) { } else { echo 'Erro: ' . mysqli_connect_error() . "\n"; }

$result = mysqli_query($link, "select * from lightsig;" ); if (!$result) {} while ($confere = mysqli_fetch_assoc($result) ) { $test2 = 1; }
if ($test2 == 0 ) { print(" <script> alert('iuhuuuuuuu') </script> ");
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

$vMat = isset ($_POST ["cMat"])? $_POST ["cMat"]:'';
$vNot = isset ($_POST ["cNot"])? $_POST ["cNot"]:'';
$nBim = isset ($_POST ["nBim"])? $_POST ["nBim"]:'';
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
    <?php $vId = '-';
    $result = mysqli_query($link, "select * from lightsig;" ); if (!$result) {}?>
    <script>
        $(document).ready(function () { $("#pn00").collapse('show');
            $("#numBtn").click(function (evt) { evt.preventDefault();
                $.ajax({
                    beforeSend: function() { $("#pn00").collapse('hide'); },
                    success: function() { $("#pn01").collapse('show');
                        var a, c;
                        var nl = $("#numNot").val();

                        for (c = 1; c <= 3; c++) {
                            if (c > nl && c <= 3) {
                                $("#nt"+c).css({'display': 'none'});
                            }
                        }
                    }
                })
            })
        });
    </script>

</head>
<body class="container text-md-center"> <br/>
<header> <h1> LightBook </h1> <h2>Projeto: MySIG</h2> <br/> <?php include_once'mn.php' ?> </header>
<section>

    <div class="p-a-1 collapse" id="pn00">
        <h1><label for="numNot">Quantas notas essa matéria terá?</label></h1>
        <input class="form-control" id="numNot" type="number" value="1" max="3"> <br/>

        <button class="btn btn-success btn-lg" id="numBtn"> Ok </button>
    </div>

    <div id="pn01" class="">
        <table class="table b-cl-12 text-md-left table-bordered" id="tab">
            <?php $vId = '-'; $i = 1;
            $result = mysqli_query($link, "select * from lightsig_not where bm = $nBim;" ); if (!$result) {}

            print (" <thead> <tr> <th>$vMat: $vNot</th> <th>Nota</th> <th>Peso</th> </tr> </thead> <tbody id='conf'> ");

            while ($confere = mysqli_fetch_assoc($result) ) {
                $nn[1] = $confere['n1']; $pp[1] = $confere['p1'];
                $nn[2] = $confere['n2']; $pp[2] = $confere['p2'];
                $nn[3] = $confere['n3']; $pp[3] = $confere['p3'];
                while ($i <= 3) {
                    print ("
                    <tr class='no' id='nt$i'>
                        <th scope='row'> $i ª Nota </th>
                        <td><input type='text' value='$nn[$i]' min='0'></td>
                        <td><input type='text' value='$pp[$i]' min='0'></td>
                    </tr>
                    ");
                    $i += 1;
                }
            }

            print (" </tbody> ");
            ?>
        </table>

        <button class="btn btn-success btn-lg" id="numBtn"> Salvar </button>
    </div>

</section>
<?php include_once '../footer.php' ?>
</body>
</html>