<?php
require_once 'db.php';
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $passwordConfirm = trim($_POST['password_confirm']);

    if (empty($username) || empty($email) || empty($password) || empty($passwordConfirm)) {
        echo "Please fill in all fields.";
    } elseif ($password !== $passwordConfirm) {
        echo "Passwords do not match.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        try {
            $stmt->execute();
            header('Location: login.php');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup | Roaming Rachel's Adventures | Traveler | Blogger</title>

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
    <form method="POST" action="signup.php" class="signup-form">
        <h2 class="form-title">Create an Account</h2>
        <div>
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" required class="form-input">
        </div>
        <div>
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" required class="form-input">
        </div>
        <div>
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" required class="form-input">
        </div>
        <div>
            <label for="password_confirm" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirm" id="password_confirm" required class="form-input">
        </div>
        <input type="submit" value="Sign Up" class="form-submit">
        <div>
            <p>Already have account? <a class="login_btn" href="login.php">Login</a></p>
        </div>
    </form>
</body>

</html>