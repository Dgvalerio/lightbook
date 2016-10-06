<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once 'header.php' ?>
    <title> LightBook </title>
    <?php
    $result = mysqli_query($link, "select * from lights;" ); if (!$result) {}
    while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['userid'] == $id_us) { $walp = $confere['wall'] . '.jpg'; } }
    print("<style> body { background-image: url('../../img/$walp'); } </style>"); ?>
    <script>
        setInterval('formLog()' ,500);
        function formLog() {
            if ($("#inpNom").val() == '' || $("#inpLin").val() == '') {
                $("#sW").html('');
                $("#add").collapse('hide');
            } else { $("#add").collapse('show'); }
        }
        function delAtl(idd) {
            $.post("del.php", {deletaAtl: idd}, function(){ location.reload(); }, "html");
        }

        $(document).keypress(function(e) { if(e.which == 13) $('#add').click(); });

        $(document).ready(function() {
            $("#add").click(function() {
                var inpNom = $("#inpNom"); var inpNomPost = inpNom.val();
                var inpLin = $("#inpLin"); var inpLinPost = inpLin.val();
                if (inpNomPost == '' || inpLinPost == '') { $("#sW").html('');
                    alert ('Por favor, preencha todos os campos!'); } else {
                    $.post("add.php", {inpNom: inpNomPost, inpLin: inpLinPost}, function(){ location.reload(); }, "html");
                }
            });
            $("#addForm").click(function() {
                $("#formAdd").collapse('toggle');
                $("#inpNom").val('');
                $("#inpLin").val('');
            });
        });
    </script>
</head>
<body class="container text-md-center"> <br/>
<header> <h1> LightBook </h1> <h2>Projeto: OKTarefas</h2> <br/> <?php include_once'mn.php' ?> </header>
<section>
    <div class="btn-group-vertical btn-block" role="group">
<?php $test2 = 0;
    $result = mysqli_query($link, "select * from atalhos where userid = '$id_us';" ); if (!$result) {}
        print (" <table class='col-md-12'> ");
            while ($confere = mysqli_fetch_assoc($result) ) { $test2 = 1;
                print (" <tr role='button' class='bd-top'>
                    <td class='col-md-11 btn-primary p-a-0'> <a href='$confere[link]' target='_blank' class='aa p-a-1'>$confere[nome]</a> </td>
                    <td class='col-md-1 btn-danger p-a-1' onclick='delAtl($confere[id])'> &#9940; </td>
                </tr>");
            }
        print (" </table> ");
?>
        <button id="addForm" class="btn btn-secondary btn-lg btn-block"> Clique para adicionar um atalho </button>
        <form id="formAdd" action="#" method="post" class="bd-all-rbl collapse b-cl-10"> <br/>
            <label for="inpNom"> Nome do atalho </label> <input name="inpNom" id="inpNom" type="text" class="form-control"><br/>
            <label for="inpLin"> Link </label> <input name="inpLin" id="inpLin" type="text" class="form-control"><br/>
            <input type="button" id="add" value="Adicionar" class="btn btn-primary btn-block collapse">
        </form>
    </div>
</section>
<?php include_once '../footer.php' ?>
</body>
</html>