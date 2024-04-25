<?php
// Validate input
if (empty($_POST['name']) || empty($_POST['email'])) {
  die('Name and email are required');
}

// Connect to database
$db = new PDO('mysql:host=localhost;dbname=my_database', 'username', 'password');

// Update user in database
$stmt = $db->prepare('UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id');
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_DEFAULT));
$stmt->bindParam(':id', $_POST['user_id']);
$stmt->execute();

// Redirect back to form
header('Location: edit_user.php?id='. $_POST['user_id']);
exit;
?>