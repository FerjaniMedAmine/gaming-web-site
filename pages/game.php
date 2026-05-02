<!DOCTYPE html>
<html>
<head>
  <title>LevelUpZone</title>
  <link rel="stylesheet" href="../styles/base.css">
  <link rel="stylesheet" href="../styles/catalog.css">
</head>

<body>

<header class="top-nav">
  <a class="store-brand" href="../index.html">
    <img class="brand-logo" src="../images/logo.jpg">
    LevelUpZone
  </a>
  <nav class="nav-links">
    <a href="../index.html">Home</a>
    <a href="../index.html#contact">Contact</a>
    <a href="#" id="cart-nav-link" class="cart-container">
      <img src="../images/icons/3225209.png" class="cart-icon" alt="Cart">
      <span id="cart-badge" class="cart-badge">0</span>
    </a>
  </nav>
</header>

<main id="main">
  <section class="catalog-block">
    <div class="block-title">
      <h2>games</h2>
    </div>

    <div id="accessoriesContainer">
      <?php
        include_once "../backend/API/gamesAPI.php";

        $games = getAllGames();

        echo "<div class='product-grid'>";

        foreach ($games as $game) {
          echo "
          <article class='tile-card product-row'>
            <div class='product-media'>
              <img src='{$game['imgPath']}'>
            </div>

            <div class='product-body'>
              <div class='product-head'>
                <h3>{$game['name']}</h3>
                <span class='product-price'>{$game['price']} DT</span>
              </div>
              <button class='add-to-cart-btn'>Add to Cart</button>
            </div>
          </article>
          ";
        }

        echo "</div>";
      ?>
    </div>
  </section>
</main>

 <footer class="page-footer" >
    <p>2026 LevelUpZone. All rights reserved.</p>
   <div class="footer-links">
      <a href="https://www.facebook.com/chaieb.info">Facebook</a>
      <a href="https://www.instagram.com/chaieb.info">Instagram</a>
      <a href="https://www.youtube.com/@chaieb_info">YouTube</a>
    </div>
  </footer>

  <script src="../scripts/cart.js"></script>
</body>

</html>