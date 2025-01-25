<?php
// signup.php - Signup functionality
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $passwordConfirm = trim($_POST['password_confirm']);

    // Basic validation
    if (empty($username) || empty($email) || empty($password) || empty($passwordConfirm)) {
        echo "Please fill in all fields.";
    } elseif ($password !== $passwordConfirm) {
        echo "Passwords do not match.";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into the database
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        try {
            $stmt->execute();
            echo "Signup successful! You can now <a href='login.php'>login</a>.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

<!-- HTML form for Signup -->
<form method="POST" action="signup.php">
    <label for="username">Username:</label><br>
    <input type="text" name="username" id="username" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email" required><br><br>

    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password" required><br><br>

    <label for="password_confirm">Confirm Password:</label><br>
    <input type="password" name="password_confirm" id="password_confirm" required><br><br>

    <input type="submit" value="Sign Up">
</form>