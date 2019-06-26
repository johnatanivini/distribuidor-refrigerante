$(function () {

    $('.money').mask('#.##0,00',{reverse:true});

        $('.editar').on('click',function(e){
            e.preventDefault();
           $.get($(this).attr('href'),function(data){

               let cadastro = $('#cadastroProduto');

               cadastro.find('#marca').val(data.dados.marca.id);
               cadastro.find('#tipo').val(data.dados.tipo.id);
               cadastro.find('#sabor').val(data.dados.sabor.id);
               cadastro.find('#valor').val(data.dados.valor);
               cadastro.find('#litragem').val(data.dados.litragem.id);
               cadastro.find('#quantidade').val(data.dados.quantidade);
               cadastro.find('#produto_id').val(data.dados.id);


                    $('.money').mask('#.##0,00',{reverse:true});


               $('#cadastroProduto').modal('show');
           })
        });

    $('.excluir').on('click',function(e){
        e.preventDefault();
        if(confirm('Deseja deletar esse produto :')) {
            $.get($(this).attr('href'), function (data) {
                alert(data.message);
            })
        }
    });

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
                    forms.find('button[type="submit"]').prop('disabled',true);
                    console.log('enviando..')
                },
                success:function(data){
                    alert('Dados salvo com sucesso!');
                    window.location.reload()
                },
                error:function(xhr){
                    alert((JSON.parse(xhr.responseText).message));
                    forms.find('button').prop('disabled',false);
                    forms.css({
                        'opacity':1
                    });
                }
            });

            return false;
        }
    });

});