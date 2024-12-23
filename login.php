<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([
            ':username' => $_POST['username']
        ]);
        $user = $stmt->fetch();

        if ($user) {
            if ($_POST['password'] === $user['password']) {
                $role = $user['role'];

                if ($role === 'user') {
                    echo "<script>
                            alert('Login successful!');
                            window.location.href = '3_Website_Homepage.html';
                          </script>";
                } else if ($role === 'admin') {
                    echo "<script>
                            alert('Admin login successful!');
                            window.location.href = '4_admindb.php';
                          </script>";
                }
            } else {
                echo "<script>alert('Incorrect password!');</script>";
            }
        } else {
            echo "<script>alert('Username does not exist!');</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Error: " . addslashes($e->getMessage()) . "');</script>";
    }
}

$pdo = null;
?>