$(function () {




    $('#formProduto').validate({
        lang: 'pt_BR',
        rules:{
            marca:{
                required:true
            },
            tipo:{
                required:true
            },
            sabor:{
                required:true
            },
            litragem:{
                required:true
            },
            quantidade:{
                required:true
            },
            valor:{
                required:true
            }

        },
        messages:{
            marca:{
                required:'Escolha uma marca para o produto',
            },
            tipo:{
                required:'Escolha o tipo'
            },
            sabor:{
                required:'Escolha o sabor'
            },
            litragem:{
                required:'Escolha a litragem do produto'
            },
            quantidade:{
                required:'Qual a quantidade em estoque?'
            },
            valor:{
                required:'Coloque um valor válido',
            }
        },
        submitHandler:function () {

            let forms = $('#formProduto');
            $.ajax({
                url:forms.prop('action'),
                type:'post',
                dataType:'json',
                data:forms.serialize(),
                beforeSend:function(){
                    forms.css({
                        'opacity':.5
                    });
                    console.log('enviando..')
                },
                success:function(data){
                    alert('Dados salvo com sucesso!');
                    location.href = forms.prop('/home');
                },
                error:function(xhr){
                    alert((JSON.parse(xhr.responseText).message));
                }
            });

            return false;
        }
    });

});