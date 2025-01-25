<?php

require_once 'db.php';
session_start();


if (!isset($_SESSION['user_id']) && $_SESSION['user_id'] != 9) {
    header("Location: admin-login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $slug = trim($_POST['slug']);
    $content = trim($_POST['content']);
    $image = $_FILES['image'];

    // Validate the form fields
    if (empty($title) || empty($slug) || empty($content) || empty($image['name'])) {
        echo "<p style='color: red;'>All fields are required.</p>";
    } else {
        // Process the image upload
        $image_name = basename($image['name']);
        $target_dir = "./uploads/";
        $target_file = $target_dir . $image_name;
        $image_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the image is valid
        if (in_array($image_type, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($image['tmp_name'], $target_file)) {
        

                // Insert article data into the database
                $sql = "INSERT INTO articles (title, slug, image, content) VALUES (:title, :slug, :image, :content)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':slug', $slug);
                $stmt->bindParam(':image', $image_name);
                $stmt->bindParam(':content', $content);

                try {
                    $stmt->execute();
                    echo "<p style='color: green;'>Article created successfully.</p>";
                } catch (PDOException $e) {
                    echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
                }
            } else {
                echo "<p style='color: red;'>Image upload failed.</p>";
            }
        } else {
            echo "<p style='color: red;'>Only JPG, JPEG, PNG, and GIF images are allowed.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/index.css" />
</head>

<body>
    <div class="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="articles.php">Articles</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="article_content">
        <h1>Create New Article</h1>

        <form class="article-form" method="POST" action="articles.php" enctype="multipart/form-data">
            <label for="title">Article Title</label>
            <input type="text" id="title" name="title" required>

            <label for="slug">Article Slug</label>
            <input type="text" id="slug" name="slug" required>

            <label for="image">Upload Image</label>
            <input type="file" id="image" name="image" required>

            <label for="content">Article Content</label>
            <textarea id="content" name="content" rows="10" required></textarea>

            <button type="submit" name="submit">Create Article</button>
        </form>
    </div>
</body>

</html>