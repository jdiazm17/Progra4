$(document).ready(function() {
    $("#txtCodigo").blur(function() {

        var buscar = $(this).val();

        if (buscar !== "") {
            $.ajax({
                url: 'proforma2.php',
                type: 'GET',
                data: { buscar: buscar },
                dataType: '',
                success: function(data) {

                    $("#listaProductos").fadeIn();
                    $("#listaProductos").html(data);
                    //$("#listaProductos").html('<ul class="list-unstyled"><li>Goku</li></ul>');
                },
                error: function(data) {

                    /*
                    1. que el php solo retorne los items
                    2. que las sugerencias se vean link
                    3. error mostrar error o algo más personalizado
                    */

                }
            });
        } else {
            $("#listaProductos").html("");
            $("#listaProductos").fadeOut();
        }
    });
    $(document).on('click', 'li', function() {
        $('#txtCodigo').val($(this).text());
        $("#listaProductos").html("");
        $("#listaProductos").fadeOut();
    })
});