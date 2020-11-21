function obtenerDatos() {
    var request = new XMLHttpRequest();
    request.open('GET', 'https://api.hacienda.go.cr/fe/ae?identificacion=' + $("#txtCedula").val(), true);
    request.send();

    request.onload = function() {
        if (request.status >= 200 && request.status < 400) {
            var datos = JSON.parse(this.response);
            document.getElementById("txtNombreCliente").value = datos.nombre;
            document.getElementById("txtNombreFacturar").value = datos.nombre;
            console.log(datos);
        } else if (request.status == 404) {
            swal({
                title: 'Cédula inválida',
                icon: "info",
            });

        }
    }
}