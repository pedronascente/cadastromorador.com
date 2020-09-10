$(function () {
    $('._myModal_gerenciar_usuario').on('click',function () {
        $(this).attr('href', $(this).attr('id'));
        var _form = $(this).attr('data-form');
        var _id = $(this).attr('data-idParametro');
        GERAR_FORMULARIO(_form, _id);
    });
})
;

function GET_USUARIOADMIN($id) {
    $.getJSON("/cadastro/usuario/" + $id + "/edit").done(function (_dataJson) {
        var data = _dataJson.data_nascimento;
        $('#usuario_nome_usuario').val(_dataJson.nome_usuario);
        $('[data-dataNascimento]').val(data.substring(0, 10).split('-').reverse().join('/'));
        $('#usuario_usuario').val(_dataJson.usuario);
        if(_dataJson.ativo ==='on'){
            $('#uniform-checkboxAtivo > span').addClass('checked'); 
            $('#checkboxAtivo').prop( "checked", true );
        }else if(_dataJson.ativo ==='off'){
            $('#checkboxAtivo').prop( "checked",false);
            $('#uniform-checkboxAtivo > span').removeClass('checked');
        }
        $('#usuario_senha').attr('required',false);
        $('#usuario_telefone').val(_dataJson.telefone);
        $('#usuario_celular').val(_dataJson.celular);
        $('#usuario_email').val(_dataJson.email);
        $('#usuario_obs').val(_dataJson.obs);      
        $('#usuario_grupo').find('option').each(function(){
            var _valor = $(this).val();
            if (_valor == _dataJson.id_grupo) {
                $(this).attr('selected', true);
            }
            if(_dataJson.id_grupo==1){
                $_html ='<b style="color:red">Administrador</b>';
            }else if(_dataJson.id_grupo==2){
                $_html ='<b style="color:red">Vendedor</b>';
            }
            $('#box_grupo').html($_html);
        });
        
        $('._inputHidenId').html('<input type="hidden" name="array_usuario[1][id_usuario]" value="' + _dataJson.id_usuario + '">');
    }).fail(function (jqxhr, textStatus, error) {
        var err = textStatus + ", " + error;
        console.log("Request Failed: " + err);
    });
}
;
function GERAR_FORMULARIO(_form, _id) {
    //( novo ) :
    if (_form === '_novo') {       
        $('#usuario_nome_usuario').val('');
        $('[data-dataNascimento]').val('');
        $('#box_grupo').html('');
        $('#show_modal_usuario').hide();
        $('#checkboxAtivo').prop( "checked",false);
        $('#uniform-checkboxAtivo > span').removeClass('checked');
        $('#usuario_nome,#usuario_ativo,#usuario_usuario,#usuario_telefone,#usuario_celular,#usuario_email,#usuario_obs').val('');
        $('._title_modal').text('Novo Uusuário');
        $('[data-action-form="modalFormUsuarioAdmin"]').attr('action', '/cadastro/usuario/save');
        $('.__btn__').attr('value', 'Salvar').addClass('btn-success');
        $('#form_modal_usuario').show();
    }
    //( editar ) :
    else if (_form === '_editarUsuario') {
        $('#show_modal_usuario').hide();
        GET_USUARIOADMIN(_id);
        $('._title_modal').text('Editar Usuário');
        $('[data-action-form="modalFormUsuarioAdmin"]').attr('action', '/cadastro/usuario/update');
        $('.__btn__').attr('value', 'Salvar').removeClass('btn-primary').removeClass('btn-danger').addClass('btn-success');
        $('#form_modal_usuario').show();
    }
    //( visualizar ) :
    else if (_form === '_visualizarUsuario') {
        $('#form_modal_condominio').hide();
        $.getJSON("/cadastro/cliente/" + _id + "/edit").done(function (_dataJson) {
           $('#view_condomino').text(_dataJson.nome);
           $('#view_token').text(_dataJson.token);
           $('#view_cep').text(_dataJson.cep);
           $('#view_uf').text(_dataJson.uf);
           $('#view_logradouro').text(_dataJson.logradouro+', '+_dataJson.numero );
           $('#view_cidade').text(_dataJson.cidade);
           $('#view_bairro').text(_dataJson.bairro);
           $('#view_complemento').text(_dataJson.complemento);
        }).fail(function (jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.log("Request Failed: " + err);
       });
       $('._title_modal').text('Condominío');
       $('#show_modal_condominio').show();
    }
}
;
