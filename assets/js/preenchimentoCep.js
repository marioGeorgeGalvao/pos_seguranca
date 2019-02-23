function preenchimentoCep(obj) {

    var cep = obj.value;
    
    $.ajax({
        url:'https://api.postmon.com.br/v1/cep/'+cep, // Aki esta pegando os dados dessa URL, onde passo por parametro o CEP.
        type:'GET',
        dataType:'json',
        success:function(json){
            if(typeof json.logradouro != 'undefined') {
                $('input[name=endereco]').val(json.logradouro);
                $('input[name=bairro]').val(json.bairro);
                $('input[name=cidade]').val(json.cidade);
                $('input[name=numero]').focus();
            }
        }
    })

}