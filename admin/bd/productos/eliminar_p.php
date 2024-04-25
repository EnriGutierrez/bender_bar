
<?php include '../config.php';?>

<?php
$id = $_GET["id"];

$sql = "DELETE FROM productos WHERE id_producto=$id";

if ($conn->query($sql) === TRUE) {
  echo "<script>". "alert('Eliminado exitosamente');". "</script>";
} else {
  echo "<script>". "alert('Error al agregar producto');". "</script> ". $conn->error;
}

$conn->close();
?>
