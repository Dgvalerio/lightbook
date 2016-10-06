<?php header("Content-Type: text/html; charset=UTF-8",true); $tst_one = 0; $tst_two = 0; $conf_senha = ''; $estado = 0;
/* Conexão */ $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); };
/* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'lightbook'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }

$_POST ["inpLog"]    = isset ($_POST ["inpLog"])?     $_POST ["inpLog"]:'';
$_POST ["inpSen"]    = isset ($_POST ["inpSen"])?     $_POST ["inpSen"]:'';

// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$p_usuario      = $usuario	    = $_POST ["inpLog"];     //atribuição do campo "usuario" vindo do formulário para variavel
$p_senha        = $senha	    = $_POST ["inpSen"];     //atribuição do campo "senha" vindo do formulário para variavel
$pLetra = substr($usuario, 0, 1);       //pega a primeira letra letra do usuário

$estado = 1;
$result = mysqli_query($link, "select * from lightbook where usuario like '$pLetra%';"); if (!$result) {}
while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['usuario'] == $usuario)  { $estado = 2; } }

if ($estado == 1) {
    $sql = "insert into lightbook (usuario, nome, senha) values ('$usuario', '', '$senha');";
    if (mysqli_query($link, $sql)) { print(" <br/>
        <div class='card card-success'>
            <div class='card-header'>
                <h4 class='card-title'>Cadastro bem sucedido!</h4>
            </div>
        </div>
"); }

} elseif ($estado == 2) { print(" <br/>    
<div class='card card-dangerr'>
    <div class='card-header'>
        <h4 class='card-title'>Cadastro mal sucedido!</h4>
    </div>
</div>
");
}
?>