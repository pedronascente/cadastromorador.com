$(function () {
    $('._myModal').click(function () {
        $(this).attr('href', $(this).attr('id'));
        var _form = $(this).attr('data-form');
        var _id = $(this).attr('data-idParametro');
        GERAR_FORMULARIO(_form, _id);
    });
})
;
function DELETE_DIA_ACESSO($id) {
    if (confirm('Deseja realmente excluir este registro?')) {
        $.getJSON("/cadastro/diaAcesso/delete/" + $id, function (data, status) {
            if (data.type == true) {
                $('._tr' + $id).hide();
            } else {
                alert('Não foi possivel deletar este registro.');
            }
        });
    }
}
;
function DELETE_ACESSO($id) {
    if (confirm('Deseja realmente excluir este registro?')) {
        $.getJSON("/cadastro/usuario/deleteDarAcesso/" + $id, function (data, status) {
            if (data.type == true) {
                $('._tr' + $id).hide();
            } else {
                alert('Não foi possivel deletar este registro.');
            }
        });
    }
}
;
function GET_IMOVEL($id) {
    $.getJSON("/cadastro/imovel/" + $id + "/edit").done(function (_dataJson) {
        $('#imovel_numero').val(_dataJson.numero);
        $('#imovel_senha').val(_dataJson.senha);
        $('#imovel_contra_senha').val(_dataJson.contra_senha);
        $('#cpf_responsavelCadastro').val(_dataJson.cpf_responsavelCadastro);
        $('#nome_responsavelCadastro').val(_dataJson.nome_responsavelCadastro);
        $('#email_responsavelCadastro').val(_dataJson.email_responsavelCadastro);
        $('#telefone_responsavelCadastro').val(_dataJson.telefone_responsavelCadastro);
        $('#_situacao_responsavelCadastro').find('option').each(function(){
            var _valor = $(this).val();
            if (_valor == _dataJson.situacao_responsavelCadastro) {
                $(this).attr('selected', true);
            }
        });
        $('#_selectRelacaoTipoImovel').find('option').each(function(){
            var _valor = $(this).val();
            if (_valor == _dataJson.tipo_imovel_id_tipo_imovel) {
                $(this).attr('selected', true);
            }
        });
        $('._inputHidenId').html('<input type="hidden" name="array_imovel[id_imovel]"    id="id_imovel"  value="' + _dataJson.id_imovel + '"><input type="hidden" name="array_veiculo[id_condominio]" value="'+ _dataJson.condominio_id_condominio+'">');
    }).fail(function (jqxhr, textStatus, error) {
        var err = textStatus + ", " + error;
        console.log("Request Failed: " + err);
    });
}
;
function GET_VEICULO($id) {
    $.getJSON("/cadastro/veiculo/" + $id + "/edit").done(function (_dataJson) {
        $('#veiculo_placa').val(_dataJson.placa);
        $('#veiculo_marca').val(_dataJson.marca);
        $('#veiculo_modelo').val(_dataJson.modelo);
        $('#veiculo_cor').val(_dataJson.cor);
        $('#veiculo_ano').val(_dataJson.ano);
        $('._inputHidenId').html('<input type="hidden" name="array_veiculo[0][id_veiculo]"    id="id_veiculo"  value="' + _dataJson.id_veiculo + '"><input type="hidden" name="array_veiculo[0][id_imovel]"    id="id_imovel"  value="' + _dataJson.imovel_id_imovel + '">');
    }).fail(function (jqxhr, textStatus, error){
        var err = textStatus + ", " + error;
        console.log("Request Failed: " + err);
    });
}
;
function GET_FUNCIONARIO($id) {
    $.getJSON("/cadastro/funcionario/" + $id + "/edit").done(function (_dataJson) {
        $('#funcionario_nome').val(_dataJson.nome);
        $('#funcionario_rg_cpf').val(_dataJson.rg_cpf);
        $('#funcionario_telefone').val(_dataJson.telefone);
        $('#funcionario_tipo_servico').val(_dataJson.tipo_servico);
        $('#funcionario_obs').val(_dataJson.obs);
        $('._inputHidenId').html('<input type="hidden" name="array_funcionario[id_funcionario]" id="id_funcionario"  value="' + _dataJson.id_funcionario + '"><input type="hidden" name="array_funcionario[imovel_id_imovel]"    id="imovel_id_imovel"  value="' + _dataJson.imovel_id_imovel + '">');
    }).fail(function (jqxhr, textStatus, error) {
        var err = textStatus + ", " + error;
        console.log("Request Failed: " + err);
    });
}
;
function GET_USUARIO($id) {
    $.getJSON("/cadastro/usuario/" + $id + "/edit").done(function (_dataJson) {
        var data = _dataJson.data_nascimento;

        $('#_selectResponsavelPeloImovel').find('option').each(function () {
            var _valor = $(this).val();
            if (_valor == _dataJson.responsavel) {
                $(this).attr('selected', true);
                $('#selectRelacaoResponsavel').fadeIn();
                if (_dataJson.responsavel == 's') {
                    $('#selectRelacaoResponsavel').hide();
                }
            }
        });
        $('#_selectRelacaoComResponsavel').find('option').each(function () {
            var _valor = $(this).val();
            if (_valor == _dataJson.relacao_responsavel_id_relacao_responsavel) {
                $(this).attr('selected', true);
            }
        });
        $('#_selectTagEclusa').find('option').each(function () {
            var _valor = $(this).val();
            if (_valor == _dataJson.tag_eclusa) {
                $(this).attr('selected', true);
            }
        });
        $('#_selectControlePortao').find('option').each(function () {
            var _valor = $(this).val();
            if (_valor == _dataJson.controle_portao) {
                $(this).attr('selected', true);
            }
        });
        $('#usuario_nome').val(_dataJson.nome_usuario);
        $('#usuario_email').val(_dataJson.email);
        $('#usuario_telefone').val(_dataJson.telefone);
        $('#usuario_celular').val(_dataJson.celular);
        $('#usuario_obs').val(_dataJson.obs);
        $('[data-dataNascimento]').val(data.substring(0, 10).split('-').reverse().join('/'));
        $('._inputHidenId').html('<input type="hidden" name="array_usuario[0][id_usuario]" value="' + _dataJson.id_usuario + '"><input type="hidden" name="array_usuario[0][imovel_id_imovel]"    id="imovel_id_imovel"  value="' + _dataJson.imovel_id_imovel + '">');

    }).fail(function (jqxhr, textStatus, error) {
        var err = textStatus + ", " + error;
        console.log("Request Failed: " + err);
    });
}
;
function GERAR_FORMULARIO(_form, _id) {
    //VEÍCULO ( novo ) :
    if (_form === '_novoVeiculo') {
        $('._title_modal').text('Novo Veículo');
        $('#veiculo_placa').attr('disabled', false);
        $('#veiculo_placa,#veiculo_marca,#veiculo_modelo,#veiculo_cor,#veiculo_ano').val('');
        $('[data-action-form="modalFormVeiculo"]').attr('action', '/cadastro/veiculo/save');
        $('.__btn__').attr('value', 'Salvar').addClass('btn-success');
        $('#form_modal_funcionario,#form_modal_usuario,#form_modal_diaAcesso,#form_modal_acesso,#form_modal_visualizar_dados').hide();
        $('#form_modal_veiculo,._hideVeiculo').show();
        //VEICULO  ( editar ) :
    } else if (_form === '_editarVeiculo') {
        $('#form_modal_funcionario,#form_modal_acesso').hide();
        GET_VEICULO(_id);
        $('#veiculo_placa').attr('disabled', false);
        $('._title_modal').text('Editar Veículo');
        $('[data-action-form="modalFormVeiculo"]').attr('action', '/cadastro/veiculo/update');
        $('.__btn__').attr('value', 'Editar').removeClass('btn-success').removeClass('btn-danger').addClass('btn-primary');
        $('#form_modal_veiculo,._hideVeiculo').show();
        //VEICULO  ( excluir ) :
    } else if (_form === '_excluirVeiculo') {
        $('#form_modal_funcionario,._hideVeiculo,#form_modal_acesso,#form_modal_visualizar_dados').hide();
        $('[data-action-form="modalFormVeiculo"]').attr('action', '/cadastro/veiculo/delete/' + _id);
        $('#veiculo_placa').attr('disabled', true);
        $('._title_modal').text('Deseja Realmente Excluir este  Veículo ?');
        GET_VEICULO(_id);
        $('.__btn__').attr('value', 'Sim').removeClass('btn-success').removeClass('btn-primary').addClass('btn-danger');
        $('#form_modal_veiculo').show();
        //FUNCIONARIO ( novo ) :
    } else if (_form === '_novoFuncionario') {
        $('#form_modal_veiculo,._arrayCheckBoxDiaSemana_js,#form_modal_usuario,#form_modal_diaAcesso,#form_modal_imovel,#form_modal_visualizar_dados').hide();
        $('#funcionario_nome,#funcionario_rg_cpf,#funcionario_telefone').val("");
        $('._title_modal').text('Novo Funcionário');
        $('[data-action-form="modalFormFuncionario"]').attr('action', '/cadastro/funcionario/save');
        $('.__btn__').attr('value', 'Salvar').addClass('btn-success');
        $('#form_modal_funcionario,._arrayCheckBoxDiaSemana,._hideInputFuncionario').show();
        $('#funcionario_nome,#funcionario_rg_cpf').attr('disabled', false);
        //FUNCIONARIO ( editar ): 
    } else if (_form === '_editarFuncionario') {
        $('#form_modal_veiculo,._arrayCheckBoxDiaSemana,#form_modal_diaAcesso,#form_modal_usuario,#form_modal_acesso,#form_modal_imovel,#form_modal_visualizar_dados').hide();
        GET_FUNCIONARIO(_id);
        $('._title_modal').text('Editar Funcionário');
        $('[data-action-form="modalFormFuncionario"]').attr('action', '/cadastro/funcionario/update');
        $('.__btn__').attr('value', 'Editar').removeClass('btn-success').removeClass('btn-danger').addClass('btn-primary');
        $('#form_modal_funcionario,._hideInputFuncionario').show();
        $('#funcionario_nome,#funcionario_rg_cpf').attr('disabled', false);
        //FUNCIONARIO ( excluir ) : 
    } else if (_form === '_excluirFuncionario') {
        $('#form_modal_veiculo,._arrayCheckBoxDiaSemana,._hideInputFuncionario,#form_modal_diaAcesso,#form_modal_usuario,#form_modal_acesso,#form_modal_visualizar_dados').hide();
        GET_FUNCIONARIO(_id);
        $('._title_modal').text('Deseja  Realmente Excluir este  Funcionário ?');
        $('[data-action-form="modalFormFuncionario"]').attr('action', '/cadastro/funcionario/delete/' + _id);
        $('.__btn__').attr('value', 'Sim').removeClass('btn-success').removeClass('btn-primary').addClass('btn-danger');
        $('#form_modal_funcionario').show();
        $('#funcionario_nome,#funcionario_rg_cpf').attr('disabled', true);
        //DIA ACESSO ( novo ) :
    } else if (_form === '_novoDiaAcesso') {
        $('#form_modal_funcionario,#form_modal_veiculo,._arrayCheckBoxDiaSemana_js,#form_modal_usuario,#form_modal_acesso,#form_modal_acesso,#form_modal_visualizar_dados').hide();
        $('.__btn__').attr('value', 'Salvar').addClass('btn-success');
        $('#form_modal_diaAcesso,._hideInputFuncionario').show();
        $('._title_modal').text('Novo Dia/Acesso');
        $('._inputHidenId').html('<input type="hidden" name="array_funcionario[0][funcionario_id_funcionario]"  value="' + _id + '">');
        $('[data-action-form="modalDiaAcesso"]').attr('action', '/cadastro/diaAcesso/save');
        //USUARIO ( novo ) :
    } else if (_form === '_novoUsuario') {
        $('#form_modal_veiculo,#form_modal_funcionario,._arrayCheckBoxDiaSemana_js,#form_modal_acesso,#form_modal_imovel,#form_modal_visualizar_dados').hide();
        $('#usuario_nome').attr('disabled', false).val('');
        $('#usuario_email,#usuario_telefone,#usuario_celular,#usuario_obs,[data-dataNascimento]').val('');
        $('._title_modal').text('Novo Usuário');
        $('[data-action-form="modalFormUsuario"]').attr('action', '/cadastro/usuario/save');
        $('.__btn__').attr('value', 'Salvar').addClass('btn-success');
        $('#hide_input_usuario').removeClass('hide_input_usuario');
        $('#form_modal_usuario').show();
        //USUARIO  ( excluir ) :    
    } else if (_form === '_excluirUsuario') {
        $('#form_modal_veiculo,#form_modal_funcionario,._arrayCheckBoxDiaSemana,._hideInputFuncionario,#form_modal_diaAcesso,#form_modal_acesso,#form_modal_imovel,#form_modal_visualizar_dados').hide();
        GET_USUARIO(_id);
        $('._title_modal').text('Deseja  Realmente Excluir este Usuario ?');
        $('[data-action-form="modalFormUsuario"]').attr('action', '/cadastro/usuario/delete/' + _id);
        $('.__btn__').attr('value', 'Sim').removeClass('btn-success').removeClass('btn-primary').addClass('btn-danger');
        $('#hide_input_usuario').addClass('hide_input_usuario');
        $('#usuario_nome').attr('disabled', true);
        $('#form_modal_usuario').show();
        //USUARIO ( editar ) :   
    } else if (_form === '_editarUsuario') {
        $('#form_modal_funcionario,#form_modal_veiculo,._arrayCheckBoxDiaSemana,#form_modal_diaAcesso,#form_modal_acesso,#form_modal_imovel,#form_modal_visualizar_dados').hide();
        GET_USUARIO(_id);
        $('._title_modal').text('Editar Usuário');
        $('[data-action-form="modalFormUsuario"]').attr('action', "/cadastro/usuario/update");
        $('.__btn__').attr('value', 'Editar').removeClass('btn-success').removeClass('btn-danger').addClass('btn-primary');
        $('#usuario_nome').attr('disabled', false);
        $('#hide_input_usuario').removeClass('hide_input_usuario');
        $('#form_modal_usuario').show();
        //ACESSO  ( novo ) :    
    } else if (_form === '_novoAcesso') {
        $('#form_modal_veiculo,#form_modal_usuario,#form_modal_diaAcesso,#form_modal_funcionario,#form_modal_imovel,#form_modal_visualizar_dados').hide();
        $('._title_modal').text('Novo Acesso');
        $('[data-action-form="modalFormAcesso"]').attr('action', '/cadastro/usuario/savedarAcesso');
        $('._inputHidenId').html('<input type="hidden" name="array_usuario[0][usuario_id_usuario]"  value="' + _id + '">');
        $('.__btn__').attr('value', 'Salvar').addClass('btn-success');
        $('#form_modal_acesso').show();
    } else if (_form === '_novoImovel') {
        $('#form_modal_associar_condominio,#form_modal_veiculo,#form_modal_usuario,#form_modal_diaAcesso,#form_modal_funcionario,#form_modal_visualizar_dados').hide();
        $('._title_modal').text('Novo Imóvel');
        $('[data-action-form="modalFormImovel"]').attr('action', '/cadastro/imovel/save');
        $('.__btn__').attr('value', 'Salvar').addClass('btn-success');
        $('#form_modal_imovel').show();
    } else if (_form === '_editarImovel') {
        $('#form_modal_associar_condominio,#form_modal_funcionario,#form_modal_veiculo,._arrayCheckBoxDiaSemana,#form_modal_diaAcesso,#form_modal_acesso,#form_modal_usuario,#form_modal_visualizar_dados').hide();
        GET_IMOVEL(_id);
        $('._title_modal').text('Editar Imóvel');
        $('[data-action-form="modalFormImovel"]').attr('action', "/cadastro/imovel/update");
        $('.__btn__').attr('value', 'Editar').removeClass('btn-success').removeClass('btn-danger').addClass('btn-primary');
        $('#form_modal_imovel').show();
        //ACESSO  ( novo ) :    
    } else if (_form === '_visualizar_dados') {
        $('#form_modal_funcionario,#form_modal_veiculo,._arrayCheckBoxDiaSemana,#form_modal_diaAcesso,#form_modal_acesso,#form_modal_usuario,#form_modal_imovel').hide();       
        $('._title_modal').text('Verifique seus dados antes  de Finalizar.');
        $('#form_modal_visualizar_dados').show();
    }
     //( associar ) :
    else if (_form === '_associarCondominio') {
        $('#form_modal_veiculo,._hideVeiculo,#form_modal_funcionario,._arrayCheckBoxDiaSemana,._hideInputFuncionario,#form_modal_diaAcesso,#form_modal_usuario,#form_modal_acesso,#form_modal_imovel,#form_modal_visualizar_dados').hide();
        $('._title_modal').text('Associar Condominío');
        $('#form_modal_associar_condominio').show();
    }
}
;