<?php include '../config.php'; ?>

<?php
$id = $_GET["id"];

$sql = "SELECT * FROM productos WHERE id_producto=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
} else {
  echo "Error al obtener el producto.";
  exit();
}


?>

<!DOCTYPE html>
<html>

<head>
  <title>Librería</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <h1>Actualice el producto</h1>


  <form action="actualizar_p.php" method="post">
    <div class="container">
      <div class="row g-3 align-items-center">
        <input type="hidden" name="id" value="<?php echo $row["id_producto"]; ?>">
        <label for="codigo">Código:</label>
        <input type="text" name="codigo" id="codigo" value="<?php echo $row["codigo"]; ?>" required>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $row["nombre"]; ?>" required>
        <select type="text" name="categoria" require>
          <option value="">-Seleccione categoria</option>
          <?php
          $categ = "SELECT * from categoria";
          $resul = $conn->query($categ);
          while ($valores = mysqli_fetch_array($resul)) {
            echo '<option value="' . $valores['nombre'] . '">' . $valores['nombre'] . '</option>';
          }
          ?>
        </select>
        <label for="precio">Precio:</label>
        <input type="number" step="0.01" name="precio" id="precio" value="<?php echo $row["precio"]; ?>" required>
        <label for="fecha_edicion">Fecha de elaboración:</label>
        <input type="date" name="fecha_ingreso" id="fecha_ingreso" value="<?php echo $row["fecha_ingreso"]; ?>" required>
        <label for="fecha_edicion">Fecha expiraciónn:</label>
        <input type="date" name="fecha_expiracion" id="fecha_expiracion" value="<?php echo $row["fecha_expiracion"]; ?>" required>

        <input type="file" class="btn btn-light" name="imagen" accept="image/*">
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </form>
</body>

</html>