$(function () {
    $('._myModal_gerenciar_condomino').click(function () {
        $(this).attr('href', $(this).attr('id'));
        var _form = $(this).attr('data-form');
        var _id = $(this).attr('data-idParametro');
        GERAR_FORMULARIO(_form, _id);
    });  
});
        
        
        
 //#####       
function GET_CONDOMINIO($id) {
    $.getJSON("/cadastro/condominio/" + $id + "/view").done(function (_dataJson) {
        $('#condominio_nome').val(_dataJson.nome);
        $('#condominio_token').val(_dataJson.token);
        $('#condominio_cep').val(_dataJson.cep);
        $('#condominio_uf').val(_dataJson.uf);
        $('#condominio_logradouro').val(_dataJson.logradouro);
        $('#condominio_numero').val(_dataJson.numero);
        $('#condominio_cidade').val(_dataJson.cidade);
        $('#condominio_bairro').val(_dataJson.bairro);
        $('#condominio_complemento').val(_dataJson.complemento);
        $('._inputHidenId').html('<input type="hidden" name="array_condominio[id_condominio]" id="id_condominio"  value="' + _dataJson.id_condominio + '">');
    }).fail(function (jqxhr, textStatus, error) {
        var err = textStatus + ", " + error;
        console.log("Request Failed: " + err);
    });
}
;
function GERAR_FORMULARIO(_form, _id) {
    //Limpar dados de entradas e ocultar todos os modais :
    $('#show_modal_condominio,#box-gerar-token,#form_modal_condominio').hide();
    $('#condominio_nome,#condominio_token,#condominio_cep,#condominio_uf,#condominio_logradouro,#condominio_numero,#condominio_cidade,#condominio_bairro,#condominio_complemento').val('');

    if (_form === '_editarCondominio') {
        $('#condominio_token').attr('disabled', true);
    } else {
        $('#condominio_token').attr('disabled', false);
    }

    //( novo ) :
    if (_form === '_novoCondominio') {
        $('._inputHidenId').html('');
        $('._title_modal').text('Novo Condominio');
        $('[data-action-form="modalFormCondominio"]').attr('action', '/cadastro/condominio/create');
        $('.__btn__').attr('value', 'Salvar').addClass('btn-success');
        $('#form_modal_condominio,#box-gerar-token').show();
    }
    //( editar ) :
    else if (_form === '_editarCondominio') {
        GET_CONDOMINIO(_id);
        $('._title_modal').text('Editar Condominío');
        $('[data-action-form="modalFormCondominio"]').attr('action', '/cadastro/condominio/update');
        $('.__btn__').attr('value', 'Salvar').addClass('btn-success');
        $('#form_modal_condominio').show();
    }
    //( visualizar ) :
    else if (_form === '_visualizarCondominio') {
        $.getJSON("/cadastro/condominio/" + _id + "/view").done(function (_dataJson) {
            $('#view_condomino').text(_dataJson.nome);
            $('#view_token').text(_dataJson.token);
            $('#view_cep').text(_dataJson.cep);
            $('#view_uf').text(_dataJson.uf);
            $('#view_logradouro').text(_dataJson.logradouro + ', ' + _dataJson.numero);
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

//Busca cep :
$(document).ready(function(){function o(){$("#condominio_logradouro").val(""),$("#condominio_bairro").val(""),$("#condominio_cidade").val(""),$("#condominio_uf").val("")}$("#condominio_cep").blur(function(){var i=$(this).val().replace(/\D/g,"");if(""!=i){/^[0-9]{8}$/.test(i)?($("#condominio_logradouro").val("..."),$("#condominio_bairro").val("..."),$("#condominio_cidade").val("..."),$("#condominio_uf").val("..."),$.getJSON("https://viacep.com.br/ws/"+i+"/json/?callback=?",function(i){"erro"in i?(o(),alert("CEP não encontrado.")):($("#condominio_logradouro").val(i.logradouro),$("#condominio_bairro").val(i.bairro),$("#condominio_cidade").val(i.localidade),$("#condominio_uf").val(i.uf))})):(o(),alert("Formato de CEP inválido."))}else o()})});
