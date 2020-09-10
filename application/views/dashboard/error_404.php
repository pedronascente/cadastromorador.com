<?php $this->load->view('layout/site/header') ?>

<div class="container-fluid text-center">
    <hr>
    <div class="row-fluid ">
         <div class="span12">
            <h1>Error 404 <br>Página não encontrada!</h1>
         </div>
    </div>
    <div class="row-fluid">
        <?php
            if(isset($_SESSION['usuario'])){
                $voltar =    '<a href="'.  base_url('dashboard').'"   class="btn btn-danger">Voltar</a>' ;
            }else{
                 $voltar =    '<a href="'.  base_url('/site').'"   class="btn btn-danger">Voltar</a>' ;
            }        
        ?>
        <div class="span12">
           <?=$voltar;?>
        </div>
    </div>
</div>
</div>
