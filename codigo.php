<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formato Creación de productos PL LATAM</title>
    <script>
        function agregarFila() {
            var table = document.getElementById("tablaProductos");
            var row = table.insertRow(-1);

            // Definir las celdas de la fila
            var cells = [
                row.insertCell(0),
                row.insertCell(1),
                row.insertCell(2),
                row.insertCell(3),
                row.insertCell(4),
                row.insertCell(5),
                row.insertCell(6),
                row.insertCell(7)
            ];
            cells[0].innerHTML = '<?php echo generarSelectVMS(); ?>';
            cells[1].innerHTML = '<input type="text" name="nombre_producto[]" value="">';
            cells[2].innerHTML = '<input type="text" name="marca[]" value="">';
            cells[3].innerHTML = '<input type="text" name="fabricante[]" value="">';
            cells[4].innerHTML = '<?php echo generarSelectContenedor(); ?>';
            cells[5].innerHTML = '<input type="text" name="contenido_neto_peso[]" value="">';
            cells[6].innerHTML = '<input type="file" name="imagen[]" accept="image/*" onchange="mostrarImagen(this, ' + (table.rows.length - 1) + ')">';
            cells[7].innerHTML = '<input type="checkbox" name="check[]">';
        }

        function mostrarImagen(input, rowIndex) {
            var file = input.files[0];
            var reader = new FileReader();

            reader.onload = function (e) {
                var img = new Image();
                img.src = e.target.result;
                img.width = 350;
                img.height = 350;

                var cell = document.getElementById("tablaProductos").rows[rowIndex].cells[6];
                cell.innerHTML = ''; // Limpiar contenido anterior
                cell.appendChild(img);
            };

            reader.readAsDataURL(file);
        }

        // Función PHP para generar el select de VMS
        <?php
        function generarSelectVMS() {
            $options = [
                "Bbox", "Food Office", "Oxxosmart-Mty", "Oxxosmart-Zal", "Oxxosmart-CDMX", "Oxxosmart-Gdl", "Oxxosmart-Qro",
                "Mercado Abierto", "Smart Kiosko", "Imbera", "Bepensa", "Vendomática Perú", "Coffee Vending", "Amerikiosk",
                "Pharmabox", "Smart Vend", "Bromedia", "Diasa", "Max Vending", "My Vending", "Goddard Catering", "Amelatte",
                "Mundo Vending", "Vendizzi", "Bracol", "Biok", "Zelo", "Mundo Vending Costa Rica", "Autobar", "Cirani",
                "Parque Paz", "Snack Pass", "365 Vending", "Steiner", "Good Taste", "Alcorp", "Aldhabi", "Evend",
                "María Bonita", "Empsa", "Geordyl", "Multivend", "Pascual", "Platinum", "Dominican", "Capsul", "JH Vend",
                "Smart Bites"
            ];

            $select = '<select name="VMS[]">';
            foreach ($options as $key => $value) {
                $select .= '<option value="Opción ' . ($key + 1) . '">' . $value . '</option>';
            }
            $select .= '</select>';

            return $select;
        }
        ?>

        // Función PHP para generar el select de Contenedor
        <?php
        function generarSelectContenedor() {
            $options = ["Bolsa", "Barra", "Botella", "Caja", "Carton", "Copa", "Paquete", "Tubo", "Lata"];

            $select = '<select name="contenedor[]">';
            foreach ($options as $key => $value) {
                $select .= '<option value="Opción ' . ($key + 1) . '">' . $value . '</option>';
            }
            $select .= '</select>';

            return $select;
        }
        ?>
    </script>
</head>
<body>

    <h2>Formato creación de Productos Parlevel LATAM</h2>

    <table border="1" id="tablaProductos">
        <thead>
            <tr>
                <th>VMS</th>
                <th>Nombre Producto</th>
                <th>Marca</th>
                <th>Fabricante</th>
                <th>Contenedor</th>
                <th>Contenido Neto/Peso</th>
                <th>Imagen</th>
                <th>Check</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <button type="button" onclick="agregarFila()">Agregar Fila</button>
    <br>
    <input type="submit" name="submit" value="Enviar">

</body>
</html>
