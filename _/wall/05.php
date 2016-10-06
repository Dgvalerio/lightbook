<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once 'header.php' ?>
    <title> LightBook </title>
</head>
<body class="container text-md-center"> <br/>
<header> <h1> LightBook </h1> <br/> <?php include_once'mn.php' ?> </header>
<section>
    <?php $c = 0; $ant = '04.php';;
    $path = "../../img/";
    $diretorio = dir($path);

    while($arquivo = $diretorio -> read()){
        if ($c <= 7) { $c += 1;
        } elseif ($c > 7 && $c < 14) { $c += 1;
        } elseif ($c >= 14 && $c < 20) { $c += 1;
        } elseif ($c >= 20 && $c < 26) { $c += 1;
        } elseif ($c >= 26 && $c < 35) { $c += 1;
            if ($arquivo != '.' && $arquivo != '..') { $lk = substr($arquivo, 0, 5);
                print("
    <div class='card col-md-4' onclick='imgBack($lk)'>
        <div class='card-block'>
            <h4 class='card-title'>- $arquivo -</h4>
        </div>
        <img src='$path$arquivo' class='w-100'>
        <div class='card-block'> </div>
    </div>
"); }
        } else {
            break;
        }
    }
    $diretorio -> close();
    ?>
</section>
<?php include_once '../footer.php' ?>
</body>
</html>