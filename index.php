<?php

session_start();
$is_logged_in = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Roaming Rachel's Adventures | Traveler | Blogger</title>
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
    </ul>
  </nav>
  <main>
    <section class="home">
      <div class="home__banner">
        <div class="home__container">
          <h1 class="home__title">Let's Travel With Me</h1>
          <p class="home__description">
            Ready to explore the world? Discover amazing destinations and
            exclusive deals just for you. Start your adventure today!
          </p>
          <button class="home-cta__button">Let's Go!</button>
        </div>
        <img
          class="home-banner__img"
          src="./assets/img/hero-image.jpg"
          alt="" />
        <div class="home__shadow"></div>
      </div>
    </section>
    <section class="popular-articles container">
      <h1 class="article-heading">Popular Articles</h1>
      <div class="popular-article__cards flex">
        <a href="./article.php" class="article__card">
          <img src="./assets/img/image1.png" alt="" class="card__img" />
          <div class="article__card-body">
            <h2 class="article__card-title">
              Top 10 Hidden Gems You Must Visit in 2024
            </h2>
            <p class="article__card-description">
              Discover lesser-known destinations that offer unforgettable
              experiences and stunning views.
            </p>
          </div>
        </a>
        <div class="article__card">
          <img src="./assets/img/image2.png" alt="" class="card__img" />
          <div class="article__card-body">
            <h2 class="article__card-title">
              <a href="./article.php"> The Ultimate Guide to Solo Travel </a>
            </h2>
            <p class="article__card-description">
              Everything you need to know to confidently explore the world on
              your own.
            </p>
          </div>
        </div>
        <div class="article__card">
          <img src="./assets/img/image3.png" alt="" class="card__img" />
          <div class="article__card-body">
            <h2 class="article__card-title">
              <a href="./article.php">
                How to Travel on a Budget Without Sacrificing Comfort
              </a>
            </h2>
            <p class="article__card-description">
              Learn tips and tricks to save money while enjoying a luxurious
              travel experience.
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="journey container">
      <div class="journey__left">
        <h1>Journey</h1>
        <div class="journey__inner--section">
          <h2>Embracing Solitude: The Power of Being Alone</h2>
          <p>
            Finding Comfort in Your Own Company
          </p>
        </div>
        <div class="journey__inner--section">
          <h2>Navigating Challenges: Building Confidence</h2>
          <p>
            Turning Obstacles into Opportunities
          </p>
        </div>
        <div class="journey__inner--section">
          <h2>Creating Connections: Meeting the World on Your Terms</h2>
          <p>
            Strangers Turned Friends
          </p>
        </div>
        <div class="buttons">
          <button class="primary__button">Start Your Solo Journey</button>
          <button class="secondary__button">Explore Travel Stories</button>
        </div>
      </div>
      <div class="journey__right">
        <img
          src="./assets/img/arturo-rodriguez-5S4ciibnbZo-unsplash.jpg"
          alt="" />
      </div>
    </section>
    <section class="you_may_like--section container">
      <h1>You May Like</h1>
      <div class="may_like--cards">
        <div class="may_like--card">
          <div class="may_like--card-img">
            <img
              src="./assets/img/le-sixieme-reve-PE9sKbktDM4-unsplash.jpg"
              alt="" />
          </div>
          <div class="may_like--card--body">
            <h2>Lost and Found: How Travel Redefines Your Identity</h2>
            <p>
              Discover how stepping into the unknown helps you find yourself.
            </p>
          </div>
        </div>
        <div class="may_like--card">
          <div class="may_like--card-img">
            <img
              src="./assets/img/silas-schneider-_x3ES9bWH7E-unsplash.jpg"
              alt="" />
          </div>
          <div class="may_like--card--body">
            <h2>Unexpected Friendships: Stories from the Road</h2>
            <p>
              Heartwarming tales of connections made while traveling the globe.
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="container feedback">
      <h1>People Thoughts</h1>
      <div class="feedbacks__items">
        <div class="feedback__item">
          <p class="feedback__item-title">"I was nervous about traveling alone, but this blog gave me the confidence and tips I needed. From packing guides to safety advice, everything was spot on!"</p>
          <div class="feedback__user-info">
            <img
              class="feedback__avatar"
              src="./assets/img/avatar1.jpg"
              alt="" />
            <div class="feedback__user-detail">
              <h3>Maria Johnson</h3>
              <p>A Lifesaver for First-Time Solo Travelers!</p>
            </div>
          </div>
        </div>
        <div class="feedback__item">
          <p class="feedback__item-title">"The blog on top destinations for solo travelers inspired my trip to Iceland. The detailed itinerary and personal stories made me feel like I was already there!"</p>
          <div class="feedback__user-info">
            <img
              class="feedback__avatar"
              src="./assets/img/avatar4.jpg"
              alt="" />
            <div class="feedback__user-detail">
              <h3>Rahul Mehta</h3>
              <p>Inspired My Next Adventure!</p>
            </div>
          </div>
        </div>
        <div class="feedback__item">
          <p class="feedback__item-title">"I love how personal and authentic this blog feels. The stories are real, and the advice comes from someone who’s truly experienced solo travel."</p>
          <div class="feedback__user-info">
            <img
              class="feedback__avatar"
              src="./assets/img/avatar3.jpg"
              alt="" />
            <div class="feedback__user-detail">
              <h3>Sophie Carter</h3>
              <p>Authentic and Relatable!</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="cta"></section>
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