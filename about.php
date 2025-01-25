<?php
session_start();
require_once 'db.php';

$is_logged_in = isset($_SESSION['user_id']);

$error_message = "";
$success_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $firstname = trim($_POST['first_name']);
  $lastname = trim($_POST['last_name']);
  $email = trim($_POST['email']);
  $message = trim($_POST['message']);

  if (empty($firstname) || empty($email) || empty($lastname) || empty($message)) {
    $error_message = "Please fill in all fields.";
  } else {

    $sql = "INSERT INTO contacts (firstname, lastname, email, message) VALUES (:firstname, :lastname, :email, :message)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);

    try {
      $stmt->execute();
      $success_message = "Your request is submitted successfully.";
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
  <title>About | Roaming Rachel's Adventures | Traveler | Blogger</title>

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
  <header class="header container">
    <a href="./index.php"><img src="./assets/img/logo.png" alt="Logo" /></a>
    <nav class="menu__large">
      <ul>
        <li><a href="./index.php">Home</a></li>
        <li><a href="./about.php">About</a></li>
        <?php if (!$is_logged_in): ?><li><a href="./login.php">Login</a></li><?php endif; ?>
        <?php if (!$is_logged_in): ?><li><a href="./signup.php">Signup</a></li><?php endif; ?>
        <?php if ($is_logged_in): ?><li><a href="./logout.php">Logout</a></li><?php endif; ?>
      </ul>
    </nav>
    <button class="burger__menu"><i class="fa-solid fa-bars"></i></button>
    <button class="cancel__button"><i class="fa-solid fa-xmark"></i></button>
  </header>
  <nav class="menu__small">
    <ul>
      <li class="nav_item"><a href="./index.php">Home</a></li>
      <li class="nav_item"><a href="./about.php"> About</a></li>
      <?php if (!$is_logged_in): ?><li class="nav_item"><a href="./login.php">Login</a></li><?php endif; ?>
      <?php if (!$is_logged_in): ?><li class="nav_item"><a href="./signup.php">Signup</a></li><?php endif; ?>
      <?php if ($is_logged_in): ?><li class="nav_item"><a href="./logout.php">Logout</a></li><?php endif; ?>
    </ul>
  </nav>
  <main class="container">
    <div class="about__section">
      <div class="about__description">
        <h1>About</h1>
        <span>The Adventurous Traveler</span>
        <p>
          I’m a solo traveler, adventurer, and storyteller who believes that
          travel is more than just visiting new places—it’s about discovering
          new parts of yourself and the world around you. Over the years, I’ve
          explored everything from bustling cities to quiet corners of the
          world, always seeking authentic experiences, hidden gems, and
          meaningful connections.<br />
          <br />My journey began years ago when I decided to step outside my
          comfort zone and embark on my first solo trip. Since then, travel
          has become not only a way of life but also a path to personal
          growth. Each destination I visit teaches me something new about
          myself, the people I meet, and the cultures I encounter.
        </p>
      </div>
      <img src="./assets/img/profile.jpg" alt="Profile Picture" />
    </div>
    <div class="contact__section">
      <h2>Contact me</h2>
      <form method="POST" class="contact__form" action="about.php">
        <div class="firstname">
          <label for="">First name</label>
          <input type="text" placeholder="Jane" name="first_name" />
        </div>
        <div class="lastname">
          <label for="">Last name</label>
          <input type="text" placeholder="Smitherton" name="last_name" />
        </div>
        <div class="emailAddress">
          <label for="">Email address</label>
          <input type="email" placeholder="email@janesfakedomain.net" name="email" />
        </div>
        <div class="message">
          <label for="">Your message</label>
          <textarea name="message" rows="4" cols="50"> </textarea>
        </div>
        <input type="submit" value="Submit" id="submit__btn">
      </form>
    </div>
  </main>
  <footer class="container">
    <img src="./assets/img/logo.png" alt="Logo" />
    <span class="">© 2024 <a href="#">Budhathoki</a>. All Rights Reserved.</span>
    <ul class="social__list">
      <li class="">
        <a href=""><i class="fa-brands fa-facebook"></i></a>
      </li>
      <li class="">
        <a href=""><i class="fa-brands fa-instagram"></i></a>
      </li>
      <li class="">
        <a href=""><i class="fa-brands fa-youtube"></i></a>
      </li>
    </ul>
  </footer>
</body>

</html>