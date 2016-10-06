<?php $ant = isset ($ant)? $ant:'#'; $pro = isset ($pro)? $pro:'#'; ?>
<div class='btn-group' role='group' style="display: <?php if ($ant=='#' && $pro=='#') {echo'none';} else {echo'inline-block';} ?>;">
    <button class='btn btn-secondary' id="ant"
            onclick="location.href = '<?php echo $ant;?>';"
                style="display: <?php if ($ant=='#') {echo'none';} ?>;">
                        &laquo; Anterior
    </button>
    <button class='btn   btn-primary' id="pro"
            onclick="location.href = '<?php echo $pro;?>';"
                style="display: <?php if ($pro=='#') {echo'none';} ?>;">
                        Próximo &raquo;
    </button>
</div>
<footer class="col-md-12"> <br/> <p> Setembro de 2016 </p> </footer>