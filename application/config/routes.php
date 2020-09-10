<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller']                  = 'Login/index';

//SISTEMA GERENCIADOR DE FUNCIONARIO:
$route['cadastrar-funcionario']               = "Funcionario/form_funcionario";
$route['funcionario/save']['POST']            = 'Funcionario/save';
$route['funcionario/(:num)/delete_site']      = 'Funcionario/delete_site/$1';
$route['funcionario/(:num)/delete_admin']     = 'Funcionario/delete_admin/$1';
$route['funcionario/(:num)']['GET']           = 'Funcionario/edit/$1'; 

//SISTEMA GERENCIADOR DE VEICULOS:
$route['cadastra-veiculo']                    = "Veiculo/form_veiculo";
$route['save']['POST']                        = 'Veiculo/save';
$route['veiculo/(:num)/delete']               = 'Veiculo/delete_site/$1';
$route['delete/(:num)']                       = 'Veiculo/delete_admin/$1';
$route['veiculo/(:num)']['GET']               = 'Veiculo/edit/$1';

//usuario -> admin:
$route['usuario/novo_admin']                 = "Usuario/form_novo_admin";
$route['usuario/save']['POST']               = 'Usuario/save';
$route['usuario/(:num)/edit_admin']          = 'Usuario/edit_admin/$1'; 
$route['usuario/(:num)/delete_admin']        = 'Usuario/delete_admin/$1'; 

$route['cadastrar-morador']                 = "Usuario/form_morador";
$route['morador/(:num)']                    = 'Usuario/editar_morador/$1'; 
$route['usuario/(:num)/delete_site']        = 'Usuario/delete_site/$1';  
$route['usuario/gerenciar']                 = "Usuario/index";
$route['usuario/(:num)/meu-perfil']         = "Usuario/meuPerfil/$1";
$route['usuario/meu-perfil']                = "Usuario/meuPerfil/";

$route['usuario/(:num)/edit_meu_perfil']    = 'Usuario/editMeuPerfil/$1'; 
//Imovel:
$route['imovel/save']['POST']               = 'Imovel/save';
$route['imovel/(:num)/edit']                = 'Imovel/edit/$1'; 
$route['imovel/recuperar-dados/(:num)']     = 'Imovel/show/$1'; 
$route['imovel/(:num)']['PUT']              = "Imovel/update";
$route['imovel/novo']                       = "Imovel/form_novo";
//condominio:
$route['condominio/gerenciar/(:num)']       = 'Condominio/index/$1';
$route['condominio/atualizarToken/(:num)']  = 'Condominio/atualizarToken/$1';
$route['condominio/novo']                   = "Condominio/form_novo";
$route['condominio/update']                 = "Condominio/update";
$route['condominio/create']                 = 'Condominio/create';
$route['condominio/(:num)/edit']            = 'Condominio/edit/$1';
$route['condominio/(:num)/view']            = 'Condominio/view_ajax/$1';
$route['condominio/usuario/(:num)']         = 'Condominio/getCondominioByIdUsuario/$1';
$route['condominio/associar-condominio']    = "Condominio/associarCondominio";
//cliente:
$route['cliente']                           = 'Cliente/index';
$route['cliente/create']                    = "Cliente/create";
$route['cliente/gerenciar']                 = "Cliente/gerenciar";
$route['cliente/visualizar']                = "Cliente/visualizar";
$route['cliente/sucesso']                   = "Cliente/sucesso";
$route['cliente/(:num)/edit']               = 'Cliente/edit/$1'; 
$route['cliente/(:num)/imprimir']           = 'Cliente/imprimir/$1';
$route['cliente/finalizar']                 = 'Cliente/finalizar';

//Fixa cadastral:
$route['site']                              = 'FichaCadastral/show';
$route['finalizar-cadastro']                = 'FichaCadastral/finalizarCadastro';
$route['sucesso']                           = 'FichaCadastral/sucesso';
$route['recuperar-cadastro']                = 'FichaCadastral/editar_cadastro_morador';

//SISTEMA DE EXPORTAR ARQUIVO CSV:
$route['exportar_arquivo_csv/(:num)']       = 'Csv/ExportCSV/$1';

//SISTEMA DE AUTENTICAÇÃO:
$route['_auth']                             = 'Login/auth';
$route['login/adm']                         = 'Login/auth2';
$route['logoff']                            = 'Login/logoff';
$route['login/morador']                     = 'Login/index';
$route['recuperarar-cadastro-morador']      = 'Login/frm_recuperar_cadastro_morador';
$route['sucesso-send-email']                = 'Login/sucesso_send_email';
$route['form-auth']                         = 'Login/formulario_login_vendedor';
$route['login-vendedor']                    = 'Login/login_vendedor';
$route['reprovar_cadastro']                 = 'Login/reprovar_cadastro';
$route['aprovar_cadastro']                  = 'Login/aprovar_cadastro';

$route['login/token/(:any)']                = 'Login/auth_QrCode/$1';
$route['404_override']                      = 'Error/index';
$route['translate_uri_dashes']              = FALSE;