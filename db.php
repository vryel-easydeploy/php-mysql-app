<?php

$host = getenv('DB_HOST');
$dbname = getenv('DB_DATABASE');
$user = getenv('DB_USERNAME');
$pass = getenv('DB_PASSWORD');

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname",
        $user,
        $pass
    );

    echo "Database connected successfully!";
}
catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>