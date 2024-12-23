<?php
include 'connection.php';


$content_name = $_GET['content'] ?? null;
$content_picture = $_POST['imageLink'] ?? null;
$description = htmlspecialchars(trim($_POST['description'] ?? ''));

if ($content_name) {
    $sql = 'SELECT * FROM makeup WHERE content = :content';
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':content' => $content_name]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = htmlspecialchars(trim($_POST['content'] ?? ''));

 
    if (empty($content)) {
        echo "<script>alert('Content cannot be empty');</script>";
        exit;
    }

   
    if (isset($_FILES['fileInput']) && $_FILES['fileInput']['error'] == 0) {
        $upload_dir = 'uploads/';
        $file_name = basename($_FILES['fileInput']['name']);
        $file_path = $upload_dir . $file_name;

      
        $allowed_file_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['fileInput']['type'], $allowed_file_types)) {
        
            if (move_uploaded_file($_FILES['fileInput']['tmp_name'], $file_path)) {
                $content_picture = $file_path;
            } else {
                echo "<script>alert('File upload failed.');</script>";
                exit;
            }
        } else {
            echo "<script>alert('Invalid file type. Only JPG, PNG, and GIF are allowed.');</script>";
            exit;
        }
    }

  
    $fields = [];
    $params = [':content' => $content];

    if ($content_picture) {
        $fields[] = 'content_picture = :content_picture';
        $params[':content_picture'] = $content_picture;
    }

    if ($description) {
        $fields[] = 'description = :description';
        $params[':description'] = $description;
    }


    if (!empty($fields)) {
        $sql = 'UPDATE makeup SET ' . implode(', ', $fields) . ' WHERE content = :content';
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            echo "<script>alert('Item updated successfully');</script>";
        } catch (PDOException $e) {
            echo "<script>alert('Error: " . addslashes($e->getMessage()) . "');</script>";
        }
    } else {
        echo "<script>alert('No changes made to the item.');</script>";
    }
}
?>
