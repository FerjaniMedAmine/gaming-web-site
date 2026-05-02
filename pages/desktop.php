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
      <h2>desktops</h2>
    </div>

    <div id="accessoriesContainer">
<?php
  include_once "../backend/API/desktopAPI.php";

  $desktops = getAllDesktops();

  echo "<div class='product-grid'>";

  foreach ($desktops as $desktop) {
    $stockClass = $desktop['stock'] > 0 ? 'in-stock' : 'out-of-stock';
    $stockLabel = $desktop['stock'] > 0 ? 'In stock' : 'Out of stock';

    echo "
    <article class='tile-card product-row'>
      <div class='product-media'>
        <img src='{$desktop['imgPath']}'>
      </div>

      <div class='product-body'>
        <div class='product-head'>
          <h3>{$desktop['cpu']}</h3>
          <span class='product-price'>{$desktop['price']} DT</span>
        </div>

        <p class='product-description'>{$desktop['description']}</p>

        <div class='product-meta'>
          <span class='{$stockClass}'>{$stockLabel}</span>
        </div>

        <dl class='product-specs'>
          <div><dt>GPU</dt><dd>{$desktop['gpu']}</dd></div>
          <div><dt>RAM</dt><dd>{$desktop['ram']}</dd></div>
          <div><dt>Storage</dt><dd>{$desktop['storages']}</dd></div>
          <div><dt>Motherboard</dt><dd>{$desktop['motherboard']}</dd></div>
          <div><dt>PSU</dt><dd>{$desktop['psu']}</dd></div>
          <div><dt>Cooler</dt><dd>{$desktop['cooler']}</dd></div>
          <div><dt>Tower</dt><dd>{$desktop['tower']}</dd></div>
        </dl>
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