<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>CONSULTA PROVEEDOR</title>
    <!--========================================================== -->
    <!-- ENCABEZADO -->
    <!--========================================================== 
  <header class="container-fluid bg-primary d-flex justify-content-center">
    <p class="text-light mb-0 p-2 fs-6">INVENTARIO DE FUNDAS</p>
</header>-->

    <nav class="navbar navbar-expand-lg navbar-light p-3" id="menu">
        <div class="container">
            <a class="navbar-brand" href="#">
                <span class="fs-5 text-primary fw-bold">FundasMx</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="alta_producto.html">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="alta_proveedor.html">Proveedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="alta_material.html">Materiales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="alta_modelo_celular.html">Modelo de Celular</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="alta_usuario.html">Usuarios</a>
                    </li>
                </ul>
                <!--<form class="d-flex">
                    <input class="form-control me-2" type="email" placeholder="Correo Electronico" aria-label="Suscribete">
                    <button class="btn btn-primary btn-primary-outline-success" type="button">Suscribete</button>
                </form>-->
            </div>

        </div>
    </nav>
</head>
</head>

<body>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <br>
            </div>
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-3">
                        <h2>Modificar o Eliminar</h2>
                        <form method="post">
                            <table>
                                <tr>
                                    <td><input type="hidden" value="<?php echo $_GET['id_proveedor'] ?>" id="id_proveedor" placeholder="ID Proveedor"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control mb-3" id="nombre" placeholder="Nombre"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control mb-3" id="apellido_p" placeholder="Apellido Paterno"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control mb-3" id="apellido_m" placeholder="Apellido Materno"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control mb-3" id="direccion" placeholder="Direccion"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control mb-3" id="cod_postal" placeholder="Código Postal"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control mb-3" id="telefono" placeholder="Teléfono"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control mb-3" id="razon_social" placeholder="Razón Social"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control mb-3" id="rfc" placeholder="RFC"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="button" class="btn btn-info" value="Modificar" id="btM">
                                        <input type="button" class="btn btn-danger" value="Eliminar" id="btE">
                                    </td>
                                </tr>
                            </table>
                        </form>

                        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>


</body>
<script>
    //****************CONSULTAR********************* */
    $.ajax({
        type: 'GET',
        url: 'http://localhost/alsa_dwi_9ids1/controlador/apis/read_proveedor.php?id_proveedor=' + $('#id_proveedor').val(),
        dataType: 'JSON'
    }).done(function(resp) {
        var datos = resp;
        $('#nombre').val(datos.nombre);
        $('#apellido_p').val(datos.apellido_p);
        $('#apellido_m').val(datos.apellido_m);
        $('#direccion').val(datos.direccion);
        $('#cod_postal').val(datos.cod_postal);
        $('#telefono').val(datos.telefono);
        $('#razon_social').val(datos.razon_social);
        $('#rfc').val(datos.rfc);
    });
    /***************ELIMINAR***************** */
    $('#btE').click(function() {
        //cuando creamos un objeto de tipo articulo
        var js_obj = {
            "id_proveedor": $('#id_proveedor').val()
        };
        var texto = JSON.stringify(js_obj);
        var dato = texto;
        //sin objetos
        $.ajax({
            data: dato,
            url: 'http://localhost/alsa_dwi_9ids1/controlador/apis/delete_proveedor_id.php?id_proveedor=' + $('#id_proveedor').val(),
            type: "DELETE",
            success: function(resp) {}
        })
        location.assign("alta_proveedor.html");
    });

    //****MODIFICAR */
    $('#btM').click(function() {
        //cuando creamos un objeto de tipo articulo
        var js_obj = {

            "id_proveedor": $('#id_proveedor').val(),
            "nombre": $('#nombre').val(),
            "apellido_p": $('#apellido_p').val(),
            "apellido_m": $('#apellido_m').val(),
            "direccion": $('#direccion').val(),
            "cod_postal": $('#cod_postal').val(),
            "telefono": $('#telefono').val(),
            "razon_social": $('#razon_social').val(),
            "rfc": $('#rfc').val()
        };
        var texto = JSON.stringify(js_obj);
        var dato = texto;
        $.ajax({
            data: dato,
            url: 'http://localhost/alsa_dwi_9ids1/controlador/apis/update_proveedor.php',
            type: "POST",
            success: function(resp) {}
        })
        location.assign("alta_proveedor.html");
    });
</script>

</html>