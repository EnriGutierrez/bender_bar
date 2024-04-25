<?php
// Validate input
if (empty($_POST['category_name'])) {
  die('Category name is required');
}

// Connect to database
$db = new PDO('mysql:host=localhost;dbname=my_database', 'username', 'password');

// Update category in database
$stmt = $db->prepare('UPDATE categories SET name = :name WHERE id = :id');
$stmt->bindParam(':name', $_POST['category_name']);
$stmt->bindParam(':id', $_POST['category_id']);
$stmt->execute();

// Redirect back to form
header('Location: update_category.php?id='. $_POST['category_id']);
exit;
?>