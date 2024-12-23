<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = 'SELECT * FROM skin WHERE id = :id';
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $skin = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

    if ($skin) {
        echo "<h3>Are you sure you want to delete this item?</h3>";
        echo "<form method='POST'>
                <input type='hidden' name='id' value='$id'>
                <input type='submit' value='Delete' name='delete'>
              </form>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $id = htmlspecialchars(trim($_POST['id']));

    $sql = 'DELETE FROM skin WHERE id = :id';
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        echo "Item deleted successfully.";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
