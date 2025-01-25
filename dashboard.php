<?php
session_start();

if (!isset($_SESSION['user_id']) && $_SESSION['user_id'] != 9) {
    header("Location: admin-login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/index.css" />

</head>

<body>
    <div class="sidebar">
        <div>
            <a href="dashboard.php">Dashboard</a>
            <a href="articles.php">Articles</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="article_content">
        <h1>Dashboard Overview</h1>
        <p>Welcome to your admin dashboard. You can manage all website content here.</p>
    </div>
</body>

</html>