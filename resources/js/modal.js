$(document).ready(function() {
    $('#modalIndex').on('show.bs.modal', function (e) {
        $.ajax({
            url: '/consulta', // Ruta a tu archivo blade o controlador que devuelve el contenido
            type: 'GET',
            success: function(data) {
                $('#modalContent').html(data);
            },
            error: function() {
                $('#modalContent').html('<p>Hubo un error al cargar el contenido.</p>');
            }
        });
    });
});
