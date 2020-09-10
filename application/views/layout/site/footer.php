<?php  //namespace C:\wamp\www\cadastro\application\views\layout\site\footer.php ?>
</div>
<div class="row-fluid">
    <div id="footer" class="span12"> <?= date('Y'); ?> &copy; Portaria Virtual Admin. Desenvolvido por <a href="javascript:void(0)">Grupo Volpato</a> </div>
</div>
<link rel="stylesheet" href="<?= base_url('assets/css/uniform.css'); ?>" />
<link rel="stylesheet" href="<?= base_url('assets/css/select2.css'); ?>" />
<script src="<?= base_url('assets/js/bootstrap-datepicker.js'); ?>"></script> 
<script src="<?= base_url('assets/js/jquery.uniform.js'); ?>"></script> 
<script src="<?= base_url('assets/js/select2.min.js'); ?>"></script> 
<script src="<?= base_url('assets/js/jquery.validate.js'); ?>"></script>
<script src="<?= base_url('assets/js/matrix.form_validation.js'); ?>"></script>
<script src="<?= base_url('assets/js/masked.js'); ?>"></script> 
<script src="<?= base_url('assets/js/matrix.form_common.js'); ?>"></script> 
<script src="<?= base_url('assets/js/addFormsDinamicos.js'); ?>"></script> 
<script src="<?= base_url('assets/js/sucesso_fichaCadastral.js'); ?>"></script>
<script src="<?= base_url('assets/js/validarCPF.js'); ?>"></script>
<script src="<?= base_url('assets/js/select_responsavel_pelo_imovel.js'); ?>"></script>
<script type="text/javascript">
$(function () {
    $('form[name="FORMULARIO_CADASTRO_IMOVEL"],form[name="FORMULARIO_EDITAR_IMOVEL"],form[name="FORM_SITE_NOVO_USUARIO"],form[name="FORM_SITE_EDITAR_USUARIO"],form[name="FORM_ADMIN_NOVO_USUARIO"],form[name="FORM_ADMIN_EDIT_USUARIO"],form[name="FORM_NOVO_FUNCIONARIO"],form[name="FORM_EDITAR_FUNCIONARIO"]').submit(function () {
        var cpf = $('._validar_cpf').val();
        if (!validarCPF(cpf)) {
            alert("Digite um cpf válido.");
            return false;
        }
    });
});
</script> 
</body>
</html>