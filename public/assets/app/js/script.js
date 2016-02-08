$(document).ready(function() {
    EnableBootstrapSelect();
    EnableAutoCloseAlerts();

});

function EnableBootstrapSelect() {
    $('.selectpicker').selectpicker({
        style: 'btn-primary',
        size: 10,
        dropupAuto: false
    });
}

function EnableAutoCloseAlerts() {
    $('.alert').fadeTo(2000, 500).fadeOut(500, function() {
        $('.alert').alert('close');
    });
}