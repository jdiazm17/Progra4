//document.getElementById("btnAgregar").disabled = true;

function calcularPrecio() {
    document.getElementById("btnAgregar").disabled = true;
    var ganancia = document.getElementById("txtGanancia").value;
    var precioCosto = document.getElementById("txtCosto").value;
    var impuesto = document.getElementById("cboImpuesto").value;
    var precioProducto = "";
    var gananciaProducto = "";


    if (impuesto == "0% (Exento)") {
        if (ganancia != "" && precioCosto != "") {
            gananciaProducto = parseFloat(precioCosto) * ((parseFloat(ganancia) / 100));
            precioProducto = parseFloat(precioCosto) + parseFloat(gananciaProducto);
            document.getElementById("btnAgregar").disabled = false;
        }
    }


    document.getElementById("txtSinImp").value = precioProducto;
    document.getElementById("txtPrecio").value = precioProducto;


}