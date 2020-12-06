 $(document).ready(function() {
     $("#btnAgregar").on('click', function(event) {
         event.preventDefault();
         var producto = $("#txtCodigo").val().split(' - ');
         var cantidad = $("#txtCantidad").val();
         var precio = $("#txtCodigo").val().split(' - ');
         var total = parseFloat(precio[1]) * parseFloat(cantidad);
         var suma = 0;
         if (producto !== "" && cantidad !== "") {
             $("#tabla").append(
                 '<tr>' +
                 '<td>' + '<button class="btn waves-effect waves-light red accent-4 btnEliminar" <i class="material-icons right">Eliminar</i></button>' + '</td>' +
                 '<td>' + producto[0] + '</td>' +
                 '<td><input class="form-control txtCantTabla" id="txtCantTabla" type="number" value="' + cantidad + '"/></td>' +
                 '<td class="precio">' + precio[1] + '</td>' +
                 '<td class="total">' + total.toFixed(2) + '</td>' +
                 '</tr>'
             );
             //Suma de los productos 
             $("#tabla .total").each(function() {
                 suma += parseFloat($(this).text());
             });
             //Modifica total según cantidad
             $("#txtCantTabla").on('keyup', function() {
                 var total = parseFloat(precio[1]) * parseFloat(this.value);
                 $(this).closest('td').siblings("#tabla td.total").text(parseFloat(total).toFixed(2));
             });
             //Modifica total cuando el producto ya está en la lista y cambia la cantidad
             $('#txtCantTabla').on('keyup', function() {
                 var tot = $(this).parent().prev().html() * this.value;
                 $(this).parent().next().find('#total').text(tot);
             });
             //Agrega productos tabla
             var producto = $("#txtCodigo").val("");
             var total = $("#total").text("Total: " + parseFloat(suma).toFixed(2));
             //Eliminar producto de la tabla
             $("#tabla .btnEliminar").on('click', function() {
                 var tr = $(this).closest('tr');
                 tr.remove();
                 $("#total").text("");
             });
             return false;
         }
     });
 });