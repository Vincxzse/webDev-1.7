<?php
include 'connection.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, :role)");
        $stmt->execute([
            ':username' => $_POST['username'],
            ':password' => $_POST['password'],
            ':role' => 'user'
        ]);

        echo "<script>
                alert('User registered successfully! Redirecting to login...');
                window.location.href = '2_login.html';
              </script>";
        exit();
    } catch (PDOException $e) {
        echo "<script>
                alert('Error: " . addslashes($e->getMessage()) . "');
              </script>";
    }
}

$pdo = null; 
?> 
