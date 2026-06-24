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

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Database connected successfully!<br><br>";

    // Insert a test user
    $stmt = $pdo->prepare(
        "INSERT INTO users (name, email)
         VALUES (?, ?)"
    );

    $stmt->execute([
        "John Doe",
        "john@example.com"
    ]);

    echo "User inserted successfully!<br><br>";

    // Display all users
    $result = $pdo->query("SELECT * FROM users");

    echo "<h2>Users Table</h2>";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $row['id'] .
             " | Name: " . $row['name'] .
             " | Email: " . $row['email'] .
             "<br>";
    }

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>
