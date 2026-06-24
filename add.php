<?php
require 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];

/* DUPLICATE CHECK */
$stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
$stmt->execute([$email]);

if ($stmt->fetchColumn() > 0) {
    die("Email already exists!");
}

/* INSERT */
$stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
$stmt->execute([$name, $email]);

header("Location: index.php");
exit;
?>
