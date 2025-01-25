<?php
require_once 'db.php';

session_start();

if ($_SESSION['user_id'] === 9) {
    header("Location: dashboard.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        echo "Please fill in all fields.";
    } elseif ($email != "admin@g.com") {
        echo "You dont have any permission.";
        header('Location: admin-login.php');
    } else {
        $sql = "SELECT id, username, password FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: dashboard.php');
            exit();
        } else {
            echo "Invalid email or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html? lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Login</title>

        <link rel="icon" type="image/x-icon" href="./assets/img/favicon.png">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="./css/index.css" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
            rel="stylesheet" />
        <!-- Icons -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
        <script src="./js/index.js" defer></script>
    </head>

    <body>
        <form method="POST" action="admin-login.php" class="login-form">
            <h2 class="form-title">Admin Login</h2>
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" required class="form-input">
            </div>
            <div>
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" required class="form-input">
            </div>

            <input type="submit" value="Login" class="form-submit">
        </form>
    </body>
</html?