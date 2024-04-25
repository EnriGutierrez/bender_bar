<?php include('bd/config.php'); ?>
<?php include('bd/sales/sales.php'); ?>
<?php
# Initialize the session
session_start();

# If user is not logged in then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
  echo "<script>" . "window.location.href='bd/login/login.php';" . "</script>";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Administrador</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="style.css" />
  <script src="main.js" defer></script>
  <script src="bd/login/js/script.js" defer></script>


</head>

<body>
  <div class="back">
    <div class="menu container">
      <a href="#" class="logo">
        <img src="../img/logo.jpg" alt="" />
        <h2>Bender Bar</h2>
      </a>
      <input type="checkbox" id="menu" />
      <label for="menu">
        <img src="img/menu.svg" class="menu-icon" alt="" />
      </label>
      <nav class="navbar">
        <ul>
          <li><a data-target="#inicio">Inicio</a></li>
          <li><a data-target="#productos">Producos</a></li>
          <li><a data-target="#categoria">Categorias</a></li>
          <li><a data-target="#ofertas">Ofertas</a></li>
          <li><a data-target="#usuario">Usuarios</a></li>
          <li>
            <p class="my-4">Hola, <?= htmlspecialchars($_SESSION["username"]); ?></p>
          </li>
          <li><a href="bd/login/logout.php">Log Out</a></li>
        </ul>
      </nav>
    </div>
  </div>
  <!--comienza el contenido-->
  <div class="content">
    <!-- comienza el formulario de principal de inicio-->
    <div data-content id="inicio" class="active">
      <div class="container">
        <h1>Top de productos mas vendidos</h1>
        <table class="table">
          <tr>
            <th>Productos</th>
            <th>Total ventas</th>
          </tr>
          <?php // foreach ($top_products as $product) : ?>
            <tr>
              <td><?php // echo $product['name']; ?></td>
              <td><?php // echo $product['total_sold']; ?></td>
            </tr>
          <? //php  endforeach; ?>
        </table>
        <h1>Total de ventas</h1>
        <p>$<?php  // echo number_format($total_sales, 2); ?></p>
      </div>
    </div>
    <!-- comienza el formulario de productos-->
    <div data-content id="productos">
      <div class="container">
        <div class="form-container">
          <h2>Subir producto</h2>
          <form action="bd/productos/agregar_p.php" method="post" enctype="multipart/form-data">
            <label>Codigo del producto: </label>
            </br>
            <input type="number" name="codigo" placeholder="codigo del producto" class="form-control" required>
            </br>
            <label>Nombre del producto: </label>
            </br>
            <input type="text" name="nombre" placeholder="Nombre del producto" class="form-control" required>
            </br>
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
            <!--<input type="text" name="categoria" placeholder="Categoría" required>-->
            <input type="number" step="0.01" name="precio" placeholder="Precio" required>
            </br>
            </br>
            <label>Fecha de elaboración: </label>
            <input type="date" name="fecha_ingreso" placeholder="Fecha de ingreso" required>
            </br>
            </br>
            <label>Fecha de expiración: </label>
            <input type="date" name="fecha_expiracion" placeholder="Fecha de expiración" required>
            </br>
            </br>
            <input type="file" class="btn btn-light" name="imagen" accept="image/*">
            </br>
            </br>
            <button type="submit" class="btn btn-primary">Subir producto</button>
          </form>
          </br>
          <!--tabla de productos-->
          <table class="table" border="1">
            <tr class="table-danger">
              <th>Código</th>
              <th>Nombre</th>
              <th>Categoría</th>
              <th>Fecha de elaboración</th>
              <th>Fecha de expiración</th>
              <th>Imagen</th>
              <th>Precio $</th>

              <th>Acciones</th>
            </tr>
            <?php
            $sql = "SELECT * FROM productos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                  <td><?php echo $row["codigo"]; ?></td>
                  <td><?php echo $row["nombre"]; ?></td>
                  <td><?php echo $row["categoria"]; ?></td>
                  <td><?php echo $row["fecha_ingreso"]; ?></td>
                  <td><?php echo $row["fecha_expiracion"]; ?></td>
                  <td><?php echo $row["imagen"]; ?></td>
                  <td><?php echo $row["precio"]; ?></td>
                  <td>
                    <a href="bd/productos/editar_p.php?id=<?php echo $row["id_producto"];?>">Editar</a>
                    <a href="bd/productos/eliminar_p.php?id=<?php echo $row["id_producto"];?>">Eliminar</a>
                  </td>
                </tr>
            <?php
              }
            } else {
              echo "<tr><td colspan='6'>No hay producto registrados.</td></tr>";
            }
            //$conn->close();
            ?>
          </table>
        </div>
      </div>
    </div>
    <!--comienza el formulario de usuarios-->
    <div data-content id="usuario">

      <div class="container">
        <table class="table" border="1">
          <tr class="table-danger">
            <th>Username</th>
            <th>email</th>
            <th>password</th>
            <th>reg_date</th>
            <th>Acciones</th>
          </tr>
          <?php
          $sql = "SELECT * FROM users";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <tr>
                <td><?php echo $row["username"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["password"]; ?></td>
                <td><?php echo $row["reg_date"]; ?></td>
                <td>

                  <a href="bd/usuario/eliminar_u.php?php echo $row[" id"]; ?>Eliminar</a>
                </td>
              </tr>
          <?php
            }
          } else {
            echo "<tr><td colspan='6'>No hay producto registrados.</td></tr>";
          }

          ?>
        </table>
      </div>

    </div>

    <!--comienza el formulario de categorias-->
    <div data-content id="categoria">
      <div class="container">
        <form action="bd/categoria/add_category.php" method="post">
          <div class="mt-4">
            <label for="name">Nombre categoria:</label><br />
            <input type="text" id="name_c" name="name_c" required /><br />
          </div>
          <div class="mt-4">
            <label for="description">Descripción:</label><br />
            <textarea type="text" id="description" name="description_c" rows="4" cols="50" required></textarea>
          </div>
          <br />
          <div class=" mt-4">

            <label for="parent_id">Categorias principales</label><br />

            <select name="nombref" class="form-select">
              <option value="0" selected disabled>Seleccione una opción...</option>

              <?php
              $categ = "SELECT * from categoria";
              $resul = $conn->query($categ);
              while ($valores = mysqli_fetch_array($resul)) {
                echo '<option value="' . $valores['nombre'] . '">' . $valores['nombre'] . '</option>';
              }
              ?>


            </select>
          </div>
          <br />
          <div class="mt-4">
            <input type="submit" value="Registar" class="btn btn-primary" />
            <a href="categoria/wliminar_c.php?php echo $row[" id"]; ? class="btn btn-outline-danger">Eliminar</a>
           

          </div>

        </form>
      </div>
    </div>
    <!--comienza el formulario de usuarios-->
    <div data-content id="ofertas">
      <div class="container">
        <h1>Ofertas de productos <?php // echo $product_id; ?></h1>

        <table class="table" border="1">
          <tr class="table-danger">
            
            <th>Nombre</th>
            <th>Description</th>
            <th>Descuento</th>
            <th>Fin de ofertas</th>
            
            <th>Agredado</th>
            <th>Actions</th>
          </tr>

          <?php
          $sql = "SELECT * FROM ofertas";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <tr>
                
                <td><?php echo $row["nombre_o"]; ?></td>
                <td><?php echo $row["descripcion"]; ?></td>
                <td><?php echo $row["precio"]; ?></td>
                <td><?php echo $row["dia_exp_o"]; ?></td>
                <td><?php echo $row["reg_date"]; ?></td>
               
                <td>
                  <a href="editar.php?id=<?php echo $row["id"]; ?>" class="">Editar</a>
                  <a href="eliminar.php?id=<?php echo $row["id"]; ?>">Eliminar</a>
                </td>
              </tr>
          <?php
            }
          } else {
            echo "<tr><td colspan='6'>No hay ofertas registrados.</td></tr>";
          }
          $conn->close();
          ?>
          <?php //foreach ($offers as $offer) : ?>
            <tr>
              <td><?php // echo $offer['codigo']; ?></td>
              <td><?php // echo $offer['nombre']; ?></td>
              <td><?php // echo $offer['description']; ?></td>
              <td><?php // echo date('Y/m/d', strtotime($offer['fin'])); ?></td>
              <td><?php // echo number_format($offer['price'], 2); ?></td>
              <td>
               <!-- <a href="/database/ofertas/editar.php echo $offer['id'];?>">Edit</a>
                <a href="delete_offer.php?id=<?php echo $offer['id']; ?>" onclick="return confirm('Are you sure you want to delete this offer?')">Delete</a>
          --> </td>
            </tr>
          <?php // endforeach; ?>
        </table>

        <h2>Agregar nueva oferta</h2>
        <form action="bd/ofertas/agregar_o.php" method="post">
          <label for="name">Nombre:</label>
          <input type="text" id="nombre" name="nombre" required><br><br>
          <label for="description">Description:</label><br>
          <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
          <label for="price">Pricio:</label>
          <input type="number" step="0.01" id="precio" name="precio" required><br><br>
          <label>Fecha de expiración de oferta: </label>
            <input type="date" name="fecha_expiracion" placeholder="Fecha de expiración" required><br>
          
          
          <button type="submit" class="btn btn-primary">Agregar oferta</button>
        </form>
      </div>
    </div>

    <?php

    //$conn->close();
    ?>
  </div>
  <!--fin de contenido-->
</body>

</html>