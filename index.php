<?php
require 'db.php';

$result = $pdo->query("SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="mb-4">User CRUD App</h2>

    <!-- ADD USER FORM -->
    <form class="mb-4" method="POST" action="add.php">
        <div class="row">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="col">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="col">
                <button class="btn btn-primary">Add User</button>
            </div>
        </div>
    </form>

    <!-- TABLE -->
    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>

        <?php while($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        <?php } ?>

    </table>

</div>

</body>
</html>
