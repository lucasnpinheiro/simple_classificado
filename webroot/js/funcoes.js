var util = {};

util.getCep = function (cep) {
    $.getJSON(cms.url + "utilits/cep/" + cep, function (data) {
        $('#logradouro').val(data.Cep.logradouro);
        $('#bairro').val(data.Cep.bairro);
        $('#cidade').val(data.Cep.cidade);
        $('#estado').val(data.Cep.uf);
    });
}