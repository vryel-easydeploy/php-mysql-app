<?php
require 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

/* Prevent duplicate email (except same user) */
$stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ? AND id != ?");
$stmt->execute([$email, $id]);

if ($stmt->fetchColumn() > 0) {
    die("Email already exists!");
}

$stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
$stmt->execute([$name, $email, $id]);

header("Location: index.php");
exit;
?>
