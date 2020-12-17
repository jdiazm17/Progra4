//Se intenta mostrar un sweetalert si el usuario no existe
//Sin embargo, no se logró manejar con AJAX

function validarUsuario() {
    var data = $("#login").serialize();
    $.ajax({
        url: 'index.php',
        type: 'POST',
        data: { data: data },
        error: function(data) {
            if (data == "Usuario no registrado en el sistema") {
                swal.fire({
                    title: 'Usuario incorrecto',
                    text: 'Verifique su usuario o contraseña',
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
            }
        }
    });
}