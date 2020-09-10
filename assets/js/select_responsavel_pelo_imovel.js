$(function(){
    $('._selectResponsavelPeloImovel').change(function () { 
        var _valor = $(this).val(); 
        if (_valor == 's') { 
            $('.selectRelacaoResponsavel').hide(); 
            $('._select_tipo_responsavel').fadeIn();    
        } else if (_valor == 'n') {
            $('.selectRelacaoResponsavel').fadeIn();  
            $('._select_tipo_responsavel').hide();    
        }else{
            $('.selectRelacaoResponsavel').hide(); 
            $('._select_tipo_responsavel').hide();  
        }  
    });
});