<?php
require 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

<h2>Edit User</h2>

<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">

    <input class="form-control mb-2" name="name" value="<?= $user['name'] ?>" required>
    <input class="form-control mb-2" name="email" value="<?= $user['email'] ?>" required>

    <button class="btn btn-success">Update</button>
</form>

</body>
</html>
