<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>CONSULTA PRODUCTO</title>
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
                <!-- <form class="d-flex">
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
                        <form action="guardar_imagen.php" method="post" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <td><input type="hidden" value="<?php echo $_GET['id_producto'] ?>" id="id_producto" name="id_producto" placeholder="ID Producto"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control mb-3" id="cve_producto" name="cve_producto" placeholder="Clave Producto"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control mb-3" id="nombre" name="nombre" placeholder="Nombre"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control mb-3" id="precio" name="precio" placeholder="Precio"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control mb-3" id="cantidad" name="cantidad" placeholder="Cantidad"></td>
                                </tr>
                                <tr>
                                    <td><input type="file" class="form-control mb-3" id="foto" name="foto" placeholder="Foto"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control mb-3" id="id_material_fk" name="id_material_fk" placeholder="Número de Material"></td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>
                                        <input type="submit" class="btn btn-info" value="Modificar" id="btM">
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
        url: 'http://localhost/alsa_dwi_9ids1/controlador/apis/read_producto.php?id_producto=' + $('#id_producto').val(),
        dataType: 'JSON'
    }).done(function(resp) {
        var datos = resp;
        $('#cve_producto').val(datos.cve_producto);
        $('#nombre').val(datos.nombre);
        $('#precio').val(datos.precio);
        $('#cantidad').val(datos.cantidad);
       /* $('#img_nombre').val(datos.img_nombre);*/
        $('#img_ruta').val(datos.img_ruta);
        $('#id_material_fk').val(datos.id_material_fk);
    });
    /***************ELIMINAR***************** */
    $('#btE').click(function() {
        //cuando creamos un objeto de tipo articulo
        var js_obj = {
            "id_producto": $('#id_producto').val()
        };
        var texto = JSON.stringify(js_obj);
        var dato = texto;
        //sin objetos
        $.ajax({
            data: dato,
            url: 'http://localhost/alsa_dwi_9ids1/controlador/apis/delete_producto_id.php?id_producto=' + $('#id_producto').val(),
            type: "DELETE",
            success: function(resp) {}
        })
        location.assign("alta_producto.html");
    });

    
    /*MODIFICAR 
    $('#btM').click(function() {
        //cuando creamos un objeto de tipo articulo
        var js_obj = {

            "id_producto": $('#id_producto').val(),
            "cve_producto": $('#cve_producto').val(),
            "nombre": $('#nombre').val(),
            "precio": $('#precio').val(),
            "cantidad": $('#cantidad').val(),
            "img_nombre": $('#img_nombre').val(),
            "img_ruta": $('#img_ruta').val(),
            "id_material_fk": $('#id_material_fk').val()
        };
        var texto = JSON.stringify(js_obj);
        var dato = texto;
        $.ajax({
            data: dato,
            url: 'http://localhost/alsa_dwi_9ids1/controlador/apis/update_producto.php',
            type: "POST",
            success: function(resp) {}
        })
        location.assign("alta_producto.html");
    });*/

</script>

</html>