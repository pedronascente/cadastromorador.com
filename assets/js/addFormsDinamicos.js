$(function () {
    var valorMinimoFormUsuario = 1;
    var valorMaximoFormUsuario = 20;
    var valorMinimoFormFuncionario = 1;
    var valorMaximoFormFuncionario = 10;
    var valorMinimoFormVeiculo = 1;
    var valorMaximoFormVeiculo = 10;
    //clicks::Usuario....................................................... ..........
    $('#btnAddFormUsuario').click(function (e) {
        e.preventDefault();
        if (valorMinimoFormUsuario < valorMaximoFormUsuario) {
            addFormUsuario(valorMinimoFormUsuario);
            $('#selectResponsavelPeloImovel' + valorMinimoFormUsuario).on('change', function () {
                var _valor = $(this).val();
                if (_valor == 's') {
                    $('.selectRelacaoResponsavel').hide();
                } else if (_valor == 'n') {
                    $('.selectRelacaoResponsavel').fadeIn();
                }
            });
            valorMinimoFormUsuario++;
        }
    });
    $('#_boxFormUsuario').on("click", ".remover_campo", function (e) {
        e.preventDefault();
        var _id = $(this).attr('id');
        $('#_boxUsuario' + _id).remove();
        valorMinimoFormUsuario--;
    });
    //clicks::Funcionario...................................................................................
    $('#btnAddFormFuncionario').click(function (e) {
        e.preventDefault();
        if (valorMinimoFormFuncionario < valorMaximoFormFuncionario) {
            addFormFuncionario(valorMinimoFormFuncionario);
            valorMinimoFormFuncionario++;
        }
    });
    $('#_boxFormFuncionario').on("click", ".remover_campo", function (e) {
        e.preventDefault();
        var _id = $(this).attr('id');
        $('#_boxFuncionario' + _id).remove();
        valorMinimoFormFuncionario--;
    });
    $('._select1').on('click', function () {
        $(this).on('change', function () {
            var id = $(this).attr('id');
            if ($(this).is(':checked')) {
                $('._hora' + id).html(_formataHtmlHora(0)).fadeIn();
            } else {
                $('._hora' + id).html(' ').fadeOut();
            }
        });
    });
    //clicks::Veiculo....................................................................................
    $('#btnAddFormVeiculo').click(function (e) {
        e.preventDefault();
        if (valorMinimoFormVeiculo < valorMaximoFormVeiculo) {
            addFormVeiculo(valorMinimoFormVeiculo);
            $("._mask_placa").mask("aaa - 9999");
            $("._mask_ano").mask("9999");
            valorMinimoFormVeiculo++;
        }
    });
    $('#_boxFormVeiculo').on("click", ".remover_campo", function (e) {
        e.preventDefault();
        var _id = $(this).attr('id');
        $('#_boxVeiculo' + _id).remove();
        valorMinimoFormVeiculo--;
    });
});
//Methods::Usuario........................................................................................
function addFormUsuario(valorMinimoFormUsuario) {
    $('#_boxFormUsuario').append(_fortamaBoxUsuario(valorMinimoFormUsuario));
    $("._mask-data").mask("99/99/9999");
    $("._mask_telefone").mask("(99) 9999-9999?9");
    $("._mask_placa").mask("aaa - 9999");
    $("._mask_ano").mask("9999");
    $('._datepicker').datepicker({format: 'dd/mm/yyyy', language: 'pt-BR'});
}
;
//modules/usuario/form_usuario............................................................................
function _fortamaBoxUsuario(valorMinimoFormUsuario) {
    var $contador = valorMinimoFormUsuario;
    var _Html;
    _Html = '<div id="_boxUsuario' + valorMinimoFormUsuario + '" >'
            + '		<div class="row-fluid">'
            + '			<div class="span4">'
            + '				<div class="control-group">'
            + '					<label class="control-label">Tipo de Usuário</label>'
            + '					<div class="controls">'
            + '						<select name="array_usuario[' + $contador + '][tipo_usuario_id_tipo_usuario]" id="_arraySelectTipoUsuario' + $contador + '"  required="">';
    getSelectAndCheckBox_js('_arraySelectTipoUsuario', '_arraySelectTipoUsuario' + $contador);
    _Html += '						</select>'
            + '					</div>'
            + '				</div>'
            + '			</div>'
            + '                 <div class="span4">'
            + '                     <div class="control-group">'
            + '                         <label class="control-label">Respossável pelo Imóvel?</label>'
            + '                             <div class="controls">'
            + '                                 <select name="array_usuario[' + $contador + '][responsavel]" class="text-center " id="selectResponsavelPeloImovel' + $contador + '" required="">'
            + '                                     <option value="s" selected="">Sim</option>'
            + '                                     <option value="n">Não</option>'
            + '                                 </select>'
            + '                             </div>'
            + '                     </div>'
            + '                 </div>'
            + '        	</div>'

            + '         <div class="row-fluid">'
            + '                <div class="span6  selectRelacaoResponsavel"  style="display:none">'
            + '                    <div class="control-group _control-group-right">'
            + '                        <label class="control-label">Relação Responsável</label>'
            + '                        <div class="controls">'
            + '                           <select name="array_usuario[' + $contador + '][relacao_responsavel_id_relacao_responsavel]" id="_arraySelectRelacaoResponsavel' + $contador + '" required="">';
    getSelectAndCheckBox_js('_arraySelectRelacaoResponsavel', '_arraySelectRelacaoResponsavel' + $contador);
    _Html += '                            </select>'
            + '                        </div>'
            + '                    </div> '
            + '                </div>'
            + '         </div>'

            + '		<div class="row-fluid">'
            + '			<div class="span12">'
            + '				<div class="control-group _control-group-right">'
            + '					<label class="control-label">Nome</label>'
            + '					<div class="controls">'
            + '                                     <input type="text" name="array_usuario[' + $contador + '][nome]"  class="span12" value=""  required="" >'
            + '					</div>'
            + '				</div> '
            + '			</div>'
            + '		</div>'
            + '		<div class="row-fluid">'
            + '			<div class="span4">'
            + '				<div class="control-group _control-group-right">'
            + '					<label class="control-label">Data Nascimento</label>'
            + '					<div class="controls">'
            + '						<div  data-date="12-12-2012" class="input-append date _datepicker ">'
            + '							<input type="text"  name="array_usuario[' + $contador + '][data_nascimento]"  data-date-format="dd-mm-yyyy" class="span12 mask _mask-data" value=""  required="" >'
            + '							<span class="add-on"><i class="icon-th"></i></span> '
            + '						</div>'
            + '					</div>'
            + '				</div> '
            + '			</div>'
            + '		</div>'

            + '		<div class="row-fluid">'
            + '			<div class="span4">'
            + '				<div class="control-group">'
            + '					<label class="control-label">Tag Eclusa</label>'
            + '					<div class="controls">'
            + '                                     <select name="array_usuario[' + $contador + '][tag_eclusa]" class="span12 text-center"  required="" >';
    for (var i = 0; i <= 10; i++) {
        _Html += '<option value="' + i + '" >' + i + '</option>';
    }
    _Html += '                                      </select>'
            + '					</div>'
            + '				</div> '
            + '			</div>'
            + '			<div class="span4">'
            + '				<div class="control-group">'
            + '					<label class="control-label">Controle Portão</label>'
            + '					<div class="controls">'
            + '                                      <select  name="array_usuario[' + $contador + '][controle_portao]" class="span12 text-center" required="">';
    for (var i = 0; i <= 10; i++) {
        _Html += ' <option value="' + i + '" >' + i + '</option>';
    }
    _Html += '                                       </select>'
            + '					</div>'
            + '				</div> '
            + '			</div>'
            + '		</div>'


            + '		<div class="row-fluid">'
            + '			<div class="span12" >'
            + '				<div class="control-group  _control-group-right">'
            + '					<label class="control-label">E-mail</label>'
            + '					<div class="controls">'
            + '						<input type="email"  name="array_usuario[' + $contador + '][email]" class="span12"  value="" required="" >'
            + '					</div>'
            + '				</div> '
            + '			</div>'
            + '		</div> '

            + '		<div class="row-fluid">'
            + '			<div class="span6">'
            + '				<div class="control-group">'
            + '					<label class="control-label">Telefone</label>'
            + '					<div class="controls">'
            + '						<input type="text"  name="array_usuario[' + $contador + '][telefone]"  class="span12 _mask_telefone"  value="" required="" >'
            + '					</div>'
            + '				</div> '
            + '			</div>'
            + '			<div class="span6">'
            + '				<div class="control-group _control-group-right">'
            + '					<label class="control-label">Celular</label>'
            + '					<div class="controls">'
            + '						<input type="text" name="array_usuario[' + $contador + '][celular]"   class="span12 _mask_telefone"  value=""  required="" >'
            + '					</div>'
            + '				</div> '
            + '			</div>'
            + '		</div>'

            + '		<div class="row-fluid">'
            + '			<div class="span12" >'
            + '				<div class="control-group _control-group-right">'
            + '					<label class="control-label">Observações</label>'
            + '					<div class="controls">'
            + '						<textarea   name="array_usuario[' + $contador + '][obs]" class="span12" rows="5" ></textarea>'
            + '					</div>'
            + '				</div> '
            + '			</div>'
            + '		</div>'

            + '		<div class="row-fluid">'
            + '			<div class="span8">'
            + '				<div class="control-group">'
            + '					<label class="control-label">Acesso</label>'
            + '					<div class="controls" id="_arrayCheckBoxAcesso' + $contador + '">';
    getSelectAndCheckBox_js('_arrayCheckBoxAcesso', '_arrayCheckBoxAcesso' + $contador, valorMinimoFormUsuario, $contador);
    _Html += '					</div>'
            + '				</div>'
            + '			</div>'
            + '		</div>'

            + '		<div class="widget-content nopadding">'
            + '			<div class="form-actions">'
            + '			   <a href="javascript:void(0)"  id="' + valorMinimoFormUsuario + '"  class="btn btn-danger remover_campo"><i class="icon-remove"></i> Remover</a> '
            + '			</div>'
            + '		</div>'
            + '</div>';
    return _Html;
}
;



function getSelectAndCheckBox_js($param, _id = null, $contador = null) {
    
    $.getJSON("/cadastro/fichaCadastral/getSelectAndCheckBox_js", {_buscarPor: $param}, function (data, status) {
        if (status == 'success') {
            var items;
            var  _sel;
            if ($param == '_arraySelectTipoUsuario') {
                $.each(data._arraySelectTipoUsuario, function (key, val) {
                    items += "<option value='" + val.id_tipo_usuario + "'>" + val.descricao + "</option>";
                });
                $('#' + _id).html(items);
            }
            if ($param == '_arraySelectRelacaoResponsavel') {
                $.each(data._arraySelectRelacaoResponsavel, function (key, val) {
                    
                    items += "<option value='" + val.id_relacao_responsavel + "'     >" + val.descricao + "</option>";
                });

            }
            if ($param !== '_arrayCheckBoxAcesso') {
                $('#' + _id).html(items);
            }
            if ($param == '_arrayCheckBoxAcesso') {
                $.each(data._arrayCheckBoxAcesso, function (key, val) {
                    var iteefms = '<label><input type="checkbox" name="array_usuario[' + $contador + '][acesso][]" class="_uniform' + $contador + '" value="' + val.id_acesso + '" required="" />' + val.descricao + '</label>';
                    $('#' + _id).append(iteefms);
                });
                $('._uniform' + $contador).uniform();
            }
        } else {
            console.log('Error: Não foi possivel retornar consulta , entre em contato com Suporte TI.', data);
        }
    });
}

//Methods::Funcionario.........................................................................
function addFormFuncionario(valorMinimoFormFuncionario) {
    $('#_boxFormFuncionario').append(_fortamaBoxFuncionario(valorMinimoFormFuncionario));
    $("._mask_telefone").mask("(99) 9999-9999?9");
    $('._uniform' + valorMinimoFormFuncionario).uniform();
    $('._select' + valorMinimoFormFuncionario).on('click', function () {
        $(this).on('change', function () {
            var id = $(this).attr('id');
            if ($(this).is(':checked')) {
                $('._hora' + id).html(_formataHtmlHora(valorMinimoFormFuncionario)).fadeIn();
            } else {
                $('._hora' + id).html(' ').fadeOut();
            }
        });
    });
}
;
function _fortamaBoxFuncionario(valorMinimoFormFuncionario) {
    var $dias = ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'];
    var $contador = valorMinimoFormFuncionario;
    var _Html;
    _Html = '<div id="_boxFuncionario' + valorMinimoFormFuncionario + '" >'
            + '        <div class="row-fluid">'
            + '            <div class="span12" >'
            + '                <div class="control-group _control-group-right">'
            + '                    <label class="control-label">Nome</label>'
            + '                    <div class="controls">'
            + '                        <input type="text" name="array_funcionario[' + $contador + '][nome]"  class="span12" required="">'
            + '                    </div>'
            + '                </div> '
            + '            </div>'
            + '        </div> '

            + '        <div class="row-fluid">'
            + '            <div class="span5">'
            + '                <div class="control-group _control-group-right">'
            + '                    <label class="control-label">Telefone Contato</label>'
            + '                    <div class="controls">'
            + '                        <input type="text" name="array_funcionario[' + $contador + '][telefone]"  class="span12 _mask_telefone"  required="">'
            + '                    </div>'
            + '                </div> '
            + '            </div>'

            + '            <div class="span6" >'
            + '                <div class="control-group ">'
            + '                    <label class="control-label">RG/CPF</label>'
            + '                    <div class="controls">'
            + '                        <input type="text" name="array_funcionario[' + $contador + '][rg_cpf]"  class="span8"  required="">'
            + '                    </div>'
            + '                </div> '
            + '            </div>'
            + '        </div>'

            + '         <div class="row-fluid">'
            + '                <div class="span6" >'
            + '                    <div class="control-group _control-group-right">'
            + '                        <label class="control-label">Relação Responsável</label>'
            + '                        <div class="controls">'
            + '                           <select name="array_funcionario[' + $contador + '][relacao_responsavel_id_relacao_responsavel]" id="_arraySelectRelacaoResponsavel' + $contador + '"  required="">';
    getSelectAndCheckBox_js('_arraySelectRelacaoResponsavel', '_arraySelectRelacaoResponsavel' + $contador);
    _Html += '                            </select>'
            + '                        </div>'
            + '                    </div> '
            + '                </div>'
            + '         </div>'

            + '         <div class="row-fluid">'
            + '                <div class="span12" >'
            + '                    <div class="control-group ">'
            + '                        <label class="control-label">Dia/Acesso</label>'
            + '                    </div>    '
            + '                </div>'
            + '        </div>  ';
    for (var i = 0; i <= 6; i++) {
        _Html += '<div class="row-fluid">'
                + '                <div class="span4" >'
                + '                    <div class="control-group ">'
                + '                        <div class="controls">'
                + '                            <label><input type="checkbox"  data-contador ="' + $contador + '"    class=" _uniform' + $contador + '   _select' + $contador + '  " id="' + $contador + i + '"      name="array_funcionario[' + $contador + '][dia_semana_id_dia_semana][]"   value="' + (i + 1) + '"    required=""  />' + $dias[i] + '</label>'
                + '                        </div>'
                + '                    </div> '
                + '                </div>'
                + '                <div class="span4  _hora' + $contador + i + '" style="display:none" id="">'
                + '              </div>'
                + '</div>';
    }
    _Html += '       <div class="widget-content nopadding">'
            + '			<div class="form-actions">'
            + '			   <a href="javascript:void(0)"  id="' + valorMinimoFormFuncionario + '"  class="btn btn-danger remover_campo"><i class="icon-remove"></i> Remover</a> '
            + '			</div>'
            + '		</div>'
            + '</div>';
    return _Html;
}
;
//Methods::Veiculo...............................................................
function addFormVeiculo(valorMinimoFormVeiculo) {

    $('#_boxFormVeiculo').append(_fortamaBoxVeiculo(valorMinimoFormVeiculo));

}
;
function _fortamaBoxVeiculo(valorMinimoFormVeiculo) {
    var $contador = valorMinimoFormVeiculo;
    var _Html;
    _Html = '<div id="_boxVeiculo' + valorMinimoFormVeiculo + '" >'
            + '     <div class="row-fluid">'
            + '         <div class="span4">'
            + '             <div class="control-group">'
            + '                 <label class="control-label">Plca</label>'
            + '                 <div class="controls">'
            + '                     <input type="text" name="array_veiculo[' + $contador + '][placa]"  class="span12  _mask_placa"  value=""  required=""  >'
            + '                 </div>'
            + '             </div> '
            + '         </div>'
            + '     </div>'

            + '     <div class="row-fluid">'
            + '         <div class="span6">'
            + '             <div class="control-group _control-group-right">'
            + '                 <label class="control-label">Marca</label>'
            + '                 <div class="controls">'
            + '                     <input type="text" name="array_veiculo[' + $contador + '][marca]"  class="span12"   value=""  required=""  >'
            + '                 </div>'
            + '             </div> '
            + '         </div>'

            + '         <div class="span6">'
            + '             <div class="control-group _control-group-right">'
            + '                 <label class="control-label">Modelo</label>'
            + '                 <div class="controls">'
            + '                     <input type="text" name="array_veiculo[' + $contador + '][modelo]"  class="span12"  value=""  required=""  >'
            + '                 </div>'
            + '             </div> '
            + '         </div>'
            + '     </div>'

            + '     <div class="row-fluid">'
            + '         <div class="span6">'
            + '             <div class="control-group _control-group-right">'
            + '                 <label class="control-label">Cor</label>'
            + '                 <div class="controls">'
            + '                     <input type="text" name="array_veiculo[' + $contador + '][cor]"  class="span12"   value=""  required="" >'
            + '                 </div>'
            + '             </div> '
            + '         </div>'

            + '         <div class="span3">'
            + '             <div class="control-group">'
            + '                 <label class="control-label">Ano</label>'
            + '                 <div class="controls">'
            + '                     <input type="text" name="array_veiculo[' + $contador + '][ano]"  class="span12 _mask_ano" value=""  required=""  >'
            + '                 </div>'
            + '             </div> '
            + '         </div>'
            + '     </div>'

            + '     <div class="widget-content nopadding">'
            + '          <div class="form-actions">'
            + '                <a href="javascript:void(0)" id="' + $contador + '"  class="btn btn-danger remover_campo"><i class="icon-remove"></i> Remover</a> '
            + '	        </div>'
            + '     </div>'
            + '</div>';
    return _Html;
}
;
function _formataHtmlHora(_contador) {
    var _html = '<div class="control-group">'
            + '      <label class="control-label">Horário</label>'
            + '      <div class="controls">'
            + '          <select class="span12"  name="array_funcionario[horario][]" >'
            + '              <option  value="07-13H" >07-13H</option>'
            + '              <option  value="13-19H" >13-19H</option>'
            + '              <option  value="07-19H" >07-19H</option>'
            + '          </select>'
            + '      </div>'
            + '  </div> ';
    return _html;
}
;
