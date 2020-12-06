$(document).ready(function() {
    $("#txtCodigo").keyup(function() {
        var buscar = $(this).val();
        if (buscar !== "") {
            $.ajax({
                url: 'proformaLista.php',
                type: 'GET',
                data: { buscar: buscar },
                success: function(data) {
                    $("#listaProductos").fadeIn();
                    $("#listaProductos").html(data);
                },
                error: function(data) {
                    /** 
                    3. error mostrar error o algo más personalizado
                    */
                }
            });
        } else {
            $("#listaProductos").html("");
            $("#listaProductos").fadeOut();
        }
    });
    $(document).on('click', 'a', function() {
        $('#txtCodigo').val($(this).text());
        $("#listaProductos").html("");
        $("#listaProductos").fadeOut();
    });
});