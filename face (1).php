<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['content'];
    $description = $_POST['description'];
    $content_picture = '';
    $item_id = isset($_POST['item_id']) ? $_POST['item_id'] : null;

    $uploadDir = __DIR__ . '/uploads/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (isset($_FILES['fileInput']) && $_FILES['fileInput']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['fileInput']['tmp_name'];
        $fileName = $_FILES['fileInput']['name'];
        $destination = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $destination)) {
            $content_picture = 'uploads/' . $fileName;
        } else {
            echo "<script>alert('Error uploading file.');</script>";
            exit;
        }
    } else if (!empty($_POST['imageLink'])) {
        $content_picture = $_POST['imageLink'];
    }

    if (!empty($content) && !empty($content_picture) && !empty($description)) {
        try {
            if (!$item_id) {
                $stmt = $pdo->prepare("INSERT INTO face (content, content_picture, description) VALUES (:content, :content_picture, :description)");
                $stmt->execute([
                    ':content' => $content,
                    ':content_picture' => $content_picture,
                    ':description' => $description
                ]);
                echo "<script>alert('Content Created Successfully');</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('Error: " . addslashes($e->getMessage()) . "');</script>";
        }
    } else {
        echo "<script>alert('Please provide all fields');</script>";
    }
}

$pdo = null;
?>
