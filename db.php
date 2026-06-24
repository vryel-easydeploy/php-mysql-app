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
<?php

$sql = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100)
)";

$pdo->exec($sql);

echo "Table created successfully!";
?>
