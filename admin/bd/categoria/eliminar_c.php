
<?php include '../config.php';?>

<?php
$id = $_GET["id"];

$sql = "DELETE FROM categoria WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "<script>". "alert('Eliminado exitosamente');". "</script>";
} else {
  echo "<script>". "alert('Error al agregar producto');". "</script> ". $conn->error;
}

$conn->close();
?>