<?php
require_once 'db.php';

session_start();
$is_logged_in = isset($_SESSION['user_id']);

if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];

    $sql = "SELECT * FROM articles WHERE slug = :slug";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
    $stmt->execute();

    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        echo "<p>Article not found.</p>";
        exit();
    }
} else {
    echo "<p>Slug not provided.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo htmlspecialchars($article['title']); ?> | Roaming Rachel's Adventures | Traveler | Blogger</title>

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
        <div class="article">
            <h1 class="article__title body__margin"><?php echo htmlspecialchars($article['title']); ?></h1>
            <p class="subheading body__margin">
                Discover how stepping into the unknown helps you find yourself
            </p>
            <div class="article__thumbnail_box">
                <img class="article__thumbnail" src="./uploads/<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>" />
            </div>
            <p class="article__body body__margin">
            <?php echo nl2br(htmlspecialchars($article['content'])); ?>
            </p>
        </div>
        <div class="related__articles">
            <h1 class="related__articles--heading">Related Articles</h1>
            <div class="related__articles--items">
                <div class="related__articels--item">
                    <img src="./assets/img/article4.jpg" alt="Article 1">
                    <div class="related__article--item-detail">
                        <h3>Conquering Fear: My Journey as a First-Time Solo Traveler</h3>
                        <p>Emily Carter</p>
                    </div>
                </div>
                <div class="related__articels--item">
                    <img src="./assets/img/article5.jpg" alt="Article 2">
                    <div class="related__article--item-detail">
                        <h3>Wanderlust on a Budget: How to Save Money While Traveling Solo</h3>
                        <p>Maria Lopez</p>
                    </div>
                </div>
                <div class="related__articels--item">
                    <img src="./assets/img/article6.jpg" alt="Article 3">
                    <div class="related__article--item-detail">
                        <h3>Top 7 Apps Every Solo Traveler Should Download</h3>
                        <p>Rahul Singh</p>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <footer class="container">
        <img src="./assets/img/logo.png" alt="Logo" />
        <span class="">© 2024 <a href="#">Budhathoki</a>. All Rights Reserved.</span>
        <ul class="social__list">
            <li class=""><a href=""><i class="fa-brands fa-facebook"></i></a></li>
            <li class=""><a href=""><i class="fa-brands fa-instagram"></i></a></li>
            <li class=""><a href=""><i class="fa-brands fa-youtube"></i></a></li>
        </ul>
    </footer>
</body>

</html>