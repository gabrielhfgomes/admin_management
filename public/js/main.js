$(document).ready(function () {
    var $CPFField = $("#CPF");
    $CPFField.mask('000.000.000-00', {reverse: false});

    var $RGField = $("#RG");
    $RGField.mask('00.000.000-0', {reverse: false});

    var $phoneField = $("#phone");
    $phoneField.mask('(00) 000000000')

    var $cepField = $("#cep");
    $cepField.mask('00.000-000');

    $('#datepicker').datepicker({
        "format": "dd/mm/yyyy",
        "endDate": "0d"
    });
});
