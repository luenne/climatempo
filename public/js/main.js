$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/* Função responsável pela busca */
$(document).on('click', '#button-addon2', function(){
    var formData = $('#search_value').serializeArray();

    // Monta os dados enviados na requisição
    var dados = {};
    $(formData ).each(function(index, obj){
        dados[obj.name] = obj.value;
    });

    // Requisição GET
    $.ajax({
        type: 'GET',
        url: '/search',
        data: dados,
        beforeSend:function() {
            $('.weather-locales').css('display', 'none'); // oculta a div
        },
        success: function(data) {
            $('.weather-locales').css('display', 'block'); // exibe a div
            $('.weather-locales').html(data);  // inclui o retorno na view correspondente 
        },
    });

});