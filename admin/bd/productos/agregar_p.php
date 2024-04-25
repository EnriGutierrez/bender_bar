<?php include('../config.php');?>
<?php
$cod = $_POST["codigo"];
$non = $_POST["nombre"];
$categ = $_POST["categoria"];
$pre = $_POST["precio"];
$f_ingre = $_POST["fecha_ingreso"];
$f_exp = $_POST["fecha_expiracion"];
$imagen = $_FILES["imagen"]["name"];
$tmp_name = $_FILES["imagen"]["tmp_name"];

$sql = "INSERT INTO productos(codigo, nombre, categoria, precio, fecha_ingreso, fecha_expiracion, imagen) VALUES 
('$cod', '$non','$categ','$pre','$f_ingre','$f_exp', '$imagen')";

if ($conn->query($sql) === TRUE) {
  move_uploaded_file($tmp_name, "../../imagenes/$imagen");
  echo "<script>". "alert('Agregado exitosamente');". "</script>";
  echo "<script>". "window.location.href='../../index.php'". "</script>";
} else {
  echo "<script>". "alert('Error al agregar producto');". "</script>". $conn->error;
}

$conn->close();
?>