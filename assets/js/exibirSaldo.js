function exibirSaldo(obj) {

    var item = obj.value;
        
    $.ajax({
        url:BASE_URL+"/ajax/pegar_saldo",
        type:'POST',
        data:{aluno:item},
        dataType:'json',
        success:function(json){
                       
            var html = ''; //Inicia a variavel html
            html = '<div class="stat-digit" id="saldo">'+ json+'</div>';

            $("#saldo").html(html);

        }
    })

}