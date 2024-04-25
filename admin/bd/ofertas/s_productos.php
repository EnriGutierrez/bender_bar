<?php
include ('../config.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $categoria = $_POST["categoria"];
    $precio = $_POST["precio"];
    $fecha_ingreso = $_POST["fecha_ingreso"];
    $fecha_expiracion = $_POST["fecha_expiracion"];
    $imagen = $_FILES["imagen"];

    $target_dir = "uploads/";
    $target_file = $target_dir. basename($imagen["name"]);
    $imaFgeileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (move_uploaded_file($imagen["tmp_name"], $target_file)) {
        $sql = "INSERT INTO productos (codigo, nombre, categoria, precio, fecha_ingreso, fecha_expiracion, imagen) VALUES ('$codigo','$nombre', '$categoria', '$precio', '$fecha_ingreso', '$fecha_expiracion', '$target_file')";
        if (mysqli_query($conn, $sql)) {
            echo "El producto se ha subido correctamente";
        } else {
            echo "Error al subir el producto: ". mysqli_error($conn);
        }
    } else {
        echo "Error al subir la imagen";
    }
}
?>