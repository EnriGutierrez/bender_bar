<?php include '../config.php';?>

<?php
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$fecha_expiracion = $_POST["fecha_expiracion"];
$precio = $_POST["precio"];

$sql = "UPDATE licoreria SET codigo='$codigo', nombre='$nombre', descripcion='$descripcion', fecha_expiracion='$fecha_expiracion', precio='$precio' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Oferta actualizado exitosamente.";
} else {
  echo "Error al actualizar la oferta: ". $conn->error;
}

$conn->close();
?>

