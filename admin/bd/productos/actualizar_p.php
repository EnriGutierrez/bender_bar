<?php include '../config.php';?>

<?php
$id = $_POST["id"];
$cod = $_POST["codigo"];
$non = $_POST["nombre"];
$categ = $_POST["categoria"];
$pre = $_POST["precio"];
$f_ingre = $_POST["fecha_ingreso"];
$f_exp = $_POST["fecha_expiracion"];
$imagen = $_FILES["imagen"]["name"];
$tmp_name = $_FILES["imagen"]["tmp_name"];

$sql = "UPDATE productos SET codigo='$cod', nombre='$nom', categoria='$categ', precio='$pre', fecha_ingreso='$f_ingre', fecha_expiracion='$f_exp', imagen='$imagen' WHERE id_producto=$id";

if ($conn->query($sql) === TRUE) {
  move_uploaded_file($tmp_name, "../../imagenes/$imagen");
  echo " <script>". "alert('Producto actualizado exitosamente');". "</script>";
  echo "<script>". "window.location.href='../../index.php'". "</script>";
} else {
  echo "Error al actualizar producto: ". $conn->error;
}

$conn->close();
?>

