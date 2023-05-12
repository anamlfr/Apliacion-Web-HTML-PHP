<?php
include("../modelo/conexion.php");
$c = new Conexion();
$foto_name = $_FILES["foto"]["name"];
$foto_temporal = $_FILES["foto"]["tmp_name"];

$id_producto_r = $_POST['id_producto'];
$cve_producto_r = $_POST['cve_producto'];
$nombre_r = $_POST['nombre'];
$precio_r = $_POST['precio'];
$cantidad_r = $_POST['cantidad'];
$id_material_fk_r = $_POST['id_material_fk'];


//copiar el archivo local a la carpeta de nuestro servidor
$foto="img/".$foto_name;

if (move_uploaded_file($_FILES['foto']['tmp_name'], $foto)) {
    //echo "El fichero es válido y se subió con éxito.\n";
} else {
    echo "¡Posible ataque de subida de ficheros!\n";
}

$dir_img = "img/";
$f = $dir_img.basename($_FILES['foto']['name']);
$data = file_get_contents($f);
$escaped = bin2hex($data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>PRODUCTOS</title>
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
                        <h2>Ingrese datos</h2>

                        <form>
                            <?php
                            echo "<input type='hidden' value='$id_producto_r' name='id_producto' id='id_producto'>"
                            ?>
                            <?php
                            echo "<input type='hidden' value='$cve_producto_r' name='cve_producto' id='cve_producto'>"
                            ?>
                            <?php
                            echo "<input type='hidden' value='$nombre_r' name='nombre' id='nombre'>"
                            ?>
                            <?php
                            echo "<input type='hidden' value='$precio_r' name='precio' id='precio'>"
                            ?>
                            <?php
                            echo "<input type='hidden' value='$cantidad_r' name='cantidad' id='cantidad'>"
                            ?>
                            <?php
                            echo "<input type='hidden' value='$foto_name' name='img_nombre' id='img_nombre'>"
                            ?>
                            <?php
                            echo "<input type='hidden' value='$foto' name='img_ruta' id='img_ruta'>"
                            ?>
                            <?php
                            echo "<input type='hidden' value='$id_material_fk_r' name='id_material_fk' id='id_material_fk'>"
                            ?>

                            <input type="hidden" value="Registrar" id="btA" name="btA" class="btn btn-info">
                            <input type="hidden" value="Modificar" id="btM" name="btM" class="btn btn-danger">
                        </form>
                    </div>

                    <div class="col-md-8">
                        <button type="hidden" value="Aceptar" id="btA" class="btn btn-primary" onclick="getMostrar()">Mostrar Productos</button>
                        <div class="row" id="mostrarArt"></div>
                    </div>


                    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>


</body>

<script>
    $('#btA').click(function() {
        //cuando creamos un objeto de tipo articulo
        var js_obj = {
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
            url: 'http://localhost/alsa_dwi_9ids1/controlador/apis/create_producto.php',
            type: "POST",
            success: function(resp) {}
        })
        location.assign("alta_producto.html");
    });

    function getMostrar(){
          $.ajax({
             type:'GET',
             url:'http://localhost/alsa_dwi_9ids1/controlador/apis/read_productos.php',
             dataType: 'JSON'
         }).done(function(resp){
             let cadena="";
             for(datos of resp){
                 cadena +=
          '<div class="col-md-3" style="margin-top:5px">'+
         '<div class="card">'+
        '<h5 class="card-header">'+datos.cve_producto+'</h5>'+
        '<h5 class="card-header">'+datos.nombre+'</h5>'+
        '<div class="card-body">'+
        '<img width="60" height="60" src="'+datos.img_ruta+'">'+
   ' <a href="consulta_producto.php?id_producto='+datos.id_producto+
   '" class="btn btn-primary">VER</a>'+
  '</div>'+
'</div></div>';
             }//for
             document.getElementById("mostrarArt").innerHTML = cadena;
         });
      }//getMostrar

//****MODIFICAR */
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
    });

    $(document).ready(function(){
		if($('#id_producto').val() > 0){
			$("#btM").click();

		}else{
			$("#btA").click();

		}

});
</script>

</html>