/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('jquery-validation');
require('jquery-mask-plugin');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

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

