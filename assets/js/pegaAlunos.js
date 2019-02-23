function pegaAlunos(obj) {

    var item = obj.value;
    
    $.ajax({
        url:BASE_URL+"/ajax/pegar_alunos",
        type:'POST',
        data:{classe:item},
        dataType:'json',
        success:function(json){
            //console.log(json);

            var html = '';

            if(json != ''){
                for(var i in json){
                
                    html += '<option value="'+json[i].idaluno+'">'+json[i].nome_aluno+'</option>';
                
                }

                $("#alunos").html(html);

            }else if(json == ''){
                
                html += '<option value=" ">'+ "Classe sem alunos matriculados" +'</option>';

                $("#alunos").html(html);
            }

                
        }
    })

}