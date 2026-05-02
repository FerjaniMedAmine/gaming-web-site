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
  <div class="catalog-wrapper">
    <!-- Filter Panel -->
    <aside class="filter-panel">
        <h3>Filters</h3>
        <form method="GET" action="component.php">
          <div class="filter-group">
            <label for="categorie">Category</label>
            <select name="categorie" id="categorie">
              <option value="">All Categories</option>
              <option value="cpu">CPU</option>
              <option value="gpu">GPU</option>
              <option value="ram">RAM</option>
              <option value="storage">Storage</option>
              <option value="psu">PSU</option>
            </select>
          </div>

          <div class="filter-group">
            <label for="min_price">Min Price (DT)</label>
            <input type="number" name="price_min" id="min_price" placeholder="0" min="0">
          </div>

          <div class="filter-group">
            <label for="max_price">Max Price (DT)</label>
            <input type="number" name="price_max" id="max_price" placeholder="9999" min="0">
          </div>

          <button type="submit" class="filter-btn">Apply Filters</button>
        </form>
    </aside>

    <!-- Products Section -->
    <section class="catalog-block">
      <div class="block-title">
        <h2>Components</h2>
      </div>

      <div class="products-section">
<?php
  include_once "../backend/API/componentAPI.php";

  $filters = array();
  
  if (!empty($_GET['categorie'])) {
    $filters['categorie'] = $_GET['categorie'];
  }

  $components = getAllComponents($filters);
  
  // Client-side price filtering
  if (!empty($_GET['price_min']) || !empty($_GET['price_max'])) {
    $components = array_filter($components, function($item) {
      if (!empty($_GET['price_min']) && $item['price'] < $_GET['price_min']) {
        return false;
      }
      if (!empty($_GET['price_max']) && $item['price'] > $_GET['price_max']) {
        return false;
      }
      return true;
    });
  }

  echo "<div class='product-grid'>";

  foreach ($components as $component) {
    $stockClass = $component['stock'] > 0 ? 'in-stock' : 'out-of-stock';
    $stockLabel = $component['stock'] > 0 ? 'In stock' : 'Out of stock';

    echo "
    <article class='tile-card product-row'>
      <div class='product-media'>
        <img src='{$component['imgPath']}'>
      </div>

      <div class='product-body'>
        <div class='product-head'>
          <h3>{$component['name']}</h3>
          <span class='product-price'>{$component['price']} DT</span>
        </div>

        <p class='product-description'>{$component['description']}</p>

        <div class='product-meta'>
          <span class='{$stockClass}'>{$stockLabel}</span>
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
  </div>
</main>

<footer class="page-footer">
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