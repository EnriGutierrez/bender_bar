<?php include '../config.php';?>

<?php
$nomb = $_POST["nombre"];
$des = $_POST["description"];
$pre = $_POST["precio"];
$expdate = $_POST["fecha_expiracion"];

$sql = "INSERT INTO ofertas (nombre_o, descripcion, precio, dia_exp_o) VALUES ('$nomb', '$des', '$pre', '$expdate')";

if ($conn->query($sql) === TRUE) {
  echo "<script>". "alert('oferta agregado exitosamente');". "</script>";
  echo "<script>". "window.location.href='../../index.php'". "</script>";
} else {
  echo "<script>". "alert('No se pudo agregar la oferta'); ". $conn->error;
}

$conn->close();
?>


  

