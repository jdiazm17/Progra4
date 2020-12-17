function eliminarProveedor(id) {
    swal.fire({
        title: '¿Está seguro que desea eliminar el proveedor?',
        text: 'Este cambio no podrá ser revertido',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'eliminar-proveedor.php',
                type: 'GET',
                data: { id: id },
                success: function(data) {
                    swal.fire({
                        title: 'Eliminado',
                        text: 'El proveedor se ha eliminado correctamente',
                        icon: 'success'
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            })
        }
    });
}