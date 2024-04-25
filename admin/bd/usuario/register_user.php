<?php
// Validate input
if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
  die('Name, email, and password are required');
}

// Connect to database
$db = new PDO('mysql:host=localhost;dbname=my_database', 'username', 'password');

// Insert new user into database
$stmt = $db->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_DEFAULT));
$stmt->execute();

// Redirect back to form
header('Location: register_user.php');
exit;
?>