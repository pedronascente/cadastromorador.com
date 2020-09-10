<br>
<div class="container">
    <div class="row-fluid"> 
        <h1 style="font-size: 18px">Atenção !</h1>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Este Imóvel , já consta em nossa Base de Dados.</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered">
                    <thead>
                        <tr><th>Condominio</th> <td><?php echo $_dados->nome?></td></tr>
                        <tr><th>Tipo Imóvel</th> <td><?php echo $_dados->descricao?></td></tr>                        
                        <tr><th>Número</th> <td><?php echo $_dados->numero?></td></tr>  
                    </thead>  
                </table>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <div class="control-group">
                <label class="control-label">Informe o CPF, para recuperar seus Dados. </label>
                <div class="controls">
                    <input type="text" name="array_imovel[cpf_responsavelCadastro]"  maxlength="20"   class="span12"  id="cpf_responsavelCadastro"    value="" required="" >
                </div>
            </div> 
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <div class="control-group">
                <div class="controls">
                    <a href="javascript:void(0)" id="" data-form=""  class="btn  btn-primary"><i class="icon-plus-sign-alt"></i> Recuperar Agora</a>
                    <a href="javascript:void(0)"   onclick="logoff()" class="btn  btn-danger"><i class="icon-plus-sign-alt"></i> Sair</a>
                </div>
            </div> 
        </div>
    </div>
</div>
<script  type="text/javascript">
function logoff(){
    
    var url_atual = window.location.href
    
    //alert(url_atual);
    
    if(confirm('Dseja Cancelar esta operação ?')){
        location.href="/logoff";
    }
}
</script>