<?php
// Connect to database
$db = new PDO('mysql:host=localhost;dbname=my_database', 'username', 'password');

// Delete category from database
$stmt = $db->prepare('DELETE FROM categories WHERE id = :id');
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();

// Redirect back to form
header('Location: categories.php');
exit;
?>