<?php include '../config.php';?>

<?php
// Retrieve offer from database
$stmt = $db->prepare('SELECT * FROM ofertas WHERE id = :id');
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
$offer = $stmt->fetch();

// Display offer in a form
echo '<h1>Edit offer</h1>';
echo '<form action="edit_offer.php" method="post">';
echo '<label for="name">Name:</label>';
echo '<input type="text" id="name" name="name" value="'.$offer['name'].'" required><br>';
echo '<label for="description">Description:</label>';
echo '<textarea id="description" name="description" rows="4" cols="50" required>'.$offer['description'].'</textarea><br>';
echo '<label for="price">Price:</label>';
echo '<input type="number" step="0.01" id="price" name="price" value="'.$offer['price'].'" required><br>';
echo '<input type="hidden" name="id" value="'.$offer['id'].'">';
echo '<button type="submit">Edit offer</button>';
echo '</form>';
?>