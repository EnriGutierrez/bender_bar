<?php
include('../datos.php');
// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Obtener ID del producto
$id = $_GET["id"];

// Eliminar producto de la base de datos
$sql = "DELETE FROM users WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "El usuario se ha eliminado exitosamente";
} else {
    echo "Error al eliminar el usuario: ". $conn->error;
}

// Cerrar conexión
$conn->close();
?>