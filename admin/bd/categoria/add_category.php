<?php include '../config.php';?>

<?php

$nombre = $_POST["name_c"];
$descripcion = $_POST["description_c"];


$sql = "INSERT INTO categoria( nombre, descripcion) VALUES ('$nombre', '$descripcion')";

if ($conn->query($sql) === TRUE) {
  echo "<script>" . "alert('Agregado exitosamente');" . "</script>";
  echo "<script>" . "window.location.href='../../index.php'" . "</script>";
} else {
  echo "<script>" . "alert('Error al agregar categoria');" . "</script>". $conn->error;
}

$conn->close();
?>
