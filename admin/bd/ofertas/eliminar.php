<?php include '../config.php';?>

<?php
$id = $_GET["id"];

$sql = "DELETE FROM ofertas WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Oferta eliminado exitosamente.";
} else {
  echo "Error al eliminar la oferta: ". $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Librería</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <h1>Librería</h1>
  <p>Libro eliminado exitosamente.</p>
  <a href="//index.php">Volver</a>
</body>
</html>