<?php
$host = 'localhost'; 
$dbname = 'qrs'; 
$user = 'root'; 
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $pdo->exec("CREATE TABLE IF NOT EXISTS users (           
        id INT PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(100) NOT NULL UNIQUE ,
        password VARCHAR(50) NOT NULL 
      
    )");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
