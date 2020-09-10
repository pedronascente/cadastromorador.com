        <form  action="<?php echo  base_url('condominio/associar-condominio')?>"  method="post"  >                
            <div class="row-fluid">
                <div class="span4">
                    <div class="control-group ">
                        <div class="controls">
                            <select  name="id_condominio" class="span12 text-center"  maxlength="250" id="condominio_nome" required="" >
                                <option value=" ">-- Selecione um Condominio para Continuar --</option>
                                <?php
                                    foreach ($_arraySelectCondominio as $condominio){
                                        echo '<option value="'.$condominio['id_condominio'].'">'.$condominio['nome'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div> 
                </div>
                <div class="span2">
                    <div class="control-group ">
                        <div class="controls">
                            <div class="span6"><input type="submit"  value="Buscar" class="btn btn-danger"></div>
                        </div>
                    </div> 
                </div>
            </div>
        </form>     
    