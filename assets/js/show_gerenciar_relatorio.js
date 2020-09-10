$(function () {
    $('._myModal_gerenciar_relatorio').on('click',function () {
        $(this).attr('href', $(this).attr('id'));
        var _form = $(this).attr('data-form');
        if (_form === '_filtro') {
             $('#form_modal_filtro').show();
        }   
    });
    
    /**
     * 
     * @Descrição : Buscar condomino do vendedor , passado como parametro.
     * @param {int} id_usuario; 
     * @return json ;
     * 
     * */
    $('#_arrayListUsuarios').change(function(){
         var _id_usuario = $(this).val();
        $.getJSON("/cadastro/condominio/usuario/"+_id_usuario).done(function (_dataJson) {
            var _html_option = '<option value="">-- Selecione --</option>';
            $.each( _dataJson, function( key, value ) {
              _html_option +='<option value="'+value.id_condominio+'">'+value.nome+'</option>';
            });
            $('#_selectCondomino').html(_html_option)
            $('#_box-selectCondomino').fadeIn().css('display','block');            
        }).fail(function (jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.log("Request Failed: " + err);
        });
    });
    
    /**
     * 
     * @Descrição : Buscar Imóvel do vendedor , passado como parametro.
     * @param {int} id_condominio; 
     * @return json ;
     *
     **/
    $('#_selectCondomino').change(function(){
        var _id_condominio = $(this).val();
        $.getJSON("/cadastro/cliente/"+_id_condominio+"/imovel").done(function (_dataJson) {
            var _html_option = '';
            if(_dataJson.type ==false){
                _html_option +='<option value="">Nenhum Imóvel relacionado!</option>';
            }else{
                $.each( _dataJson, function( key, value ) {
                  _html_option +='<option value="'+value.tipo_imovel_id_tipo_imovel+'">'+value.descricao+'</option>';
                });
            }
            $('#_selectImovel').html(_html_option);
            $('#_box-selectImovel').fadeIn().css('display','block');     
        }).fail(function (jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.log("Request Failed: " + err);
        });
    });
    
    
    
    
    
    
});