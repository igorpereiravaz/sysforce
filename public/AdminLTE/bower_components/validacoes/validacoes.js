//verificando se nome está curto
$("#name").blur(function(){
    var tam = $("#name").val();
    if(tam.length<=5){
        Swal.fire('Nome muito curto!');

        $("#name").val("");
    }
});

$("#datames").change(function(){


        var datames = $("#datames").val();
        if(datames != ""){
            var datainicio = $('#datainicio').val();
            var diaref = datainicio.substr(8,9);
            var mesref = datames.substr(0,2);
            var anoref = datames.substr(3,6);
            var dataref = anoref.concat("-",mesref,"-",diaref);

            if(moment(datainicio).isAfter(dataref)){
                Swal.fire("Data inferior a data de Início da matrícula");
                $("#datames").val("");
            }
            else{
            }
        }
});

$(document).ready(function(){
$("#valor_plano").mask("999.999.990,90", {reverse:true})
})

$(document).ready(function(){
    $("#datames").mask("12-9999", {reverse:true})
})

$(document).ready(function(){
    $("#telefone_cliente").mask("(99)99999-9999", {reverse:false})
})

$(document).ready(function(){
    $("#telefoneemer_cliente").mask("(99)99999-9999", {reverse:false})
})

$(document).ready(function(){
    $("#cpf_cliente").mask("999.999.999-99");
});

$(function()
{
    //Executa a requisição quando o campo username perder o foco
    $('#cpf_cliente').blur(function()
    {
        var cpf = $('#cpf_cliente').val().replace(/[^0-9]/g, '').toString();

        if(cpf == '00000000000' || cpf == '11111111111' || cpf == '22222222222' || cpf == '33333333333'
            || cpf == '44444444444' || cpf =='55555555555'
            || cpf =='66666666666' || cpf =='77777777777' || cpf =='88888888888' || cpf =='99999999999'){
            Swal.fire('CPF inválido');


            $('#cpf_cliente').val('');
        }
        if( cpf.length == 11 )
        {
            var v = [];

            //Calcula o primeiro dígito de verificação.
            v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
            v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
            v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
            v[0] = v[0] % 11;
            v[0] = v[0] % 10;

            //Calcula o segundo dígito de verificação.
            v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
            v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
            v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
            v[1] = v[1] % 11;
            v[1] = v[1] % 10;

            //Retorna Verdadeiro se os dígitos de verificação são os esperados.
            if ( (v[0] != cpf[9]) || (v[1] != cpf[10]) )
            {
                Swal.fire('CPF inválido');


                $('#cpf_cliente').val('');

            }
        }
        else
        {
            Swal.fire('CPF inválido');

            $('#cpf_cliente').val('');

        }
    });
});

$(document).ready(function () {
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
    })
})

$(document).ready(function(){
    $("#busto").mask("999", {reverse:true})
})
$(document).ready(function(){
    $("#bracoDireito").mask("999", {reverse:true})
})
$(document).ready(function(){
    $("#bracoEsquerdo").mask("999", {reverse:true})
})
$(document).ready(function(){
    $("#antebracoDireito").mask("999", {reverse:true})
})
$(document).ready(function(){
    $("#antebracoEsquerdo").mask("999", {reverse:true})
})
$(document).ready(function(){
    $("#peito").mask("999", {reverse:true})
})
$(document).ready(function(){
    $("#cintura").mask("999", {reverse:true})
})
$(document).ready(function(){
    $("#quadril").mask("999", {reverse:true})
})
$(document).ready(function(){
    $("#coxaDireita").mask("999", {reverse:true})
})
$(document).ready(function(){
    $("#coxaEsquerda").mask("999", {reverse:true})
})
$(document).ready(function(){
    $("#panturrilhaDireita").mask("999", {reverse:true})
})
$(document).ready(function(){
    $("#panturrilhaEsquerda").mask("999", {reverse:true})
})
$(document).ready(function(){
    $("#altura").mask("999", {reverse:true})
})
$(document).ready(function(){
    $("#peso").mask("999.999", {reverse:true})
})


$(document).ready(function(){
    $("#checkcardiaco").change(function() {
        var check = $("#checkcardiaco").val();
        if (check === "Não") {
            $("#qualcardiaco_cliente").val('Nenhum');
        }
        else{
            $('#cqualcardiaco_cliente').val('');
        }
    })

    $("#checklesao").change(function() {
        var check = $("#checklesao").val();
        if (check === "Não") {
            $("#locallesao_cliente").val('Nenhum');
        }
        else{
            $('#locallesao_cliente').val('');
        }
    })

    $("#checkremedio").change(function() {
        var check = $("#checkremedio").val();
        if (check === "Não") {
            $("#qualmedicamento_cliente").val('Nenhum');
        }
        else{
            $('#qualmedicamento_cliente').val('');
        }
    })

})
