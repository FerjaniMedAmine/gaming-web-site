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
        <form method="GET" action="desktop.php">
          <div class="filter-group">
            <label for="min_price">Min Price (DT)</label>
            <input type="number" name="price_min" id="min_price" placeholder="0" min="0">
          </div>

          <div class="filter-group">
            <label for="max_price">Max Price (DT)</label>
            <input type="number" name="price_max" id="max_price" placeholder="9999" min="0">
          </div>

          <div class="filter-group">
            <label for="stock">Stock Status</label>
            <select name="stock_status" id="stock">
              <option value="">All Items</option>
              <option value="in-stock">In Stock Only</option>
              <option value="out-of-stock">Out of Stock</option>
            </select>
          </div>

          <button type="submit" class="filter-btn">Apply Filters</button>
        </form>
    </aside>

    <!-- Products Section -->
    <section class="catalog-block">
      <div class="block-title">
        <h2>desktops</h2>
      </div>

      <div class="products-section">
<?php
  include_once "../backend/API/desktopAPI.php";

  $desktops = getAllDesktops();

  // Client-side filtering
  $filtered_desktops = $desktops;
  
  if (!empty($_GET['price_min']) || !empty($_GET['price_max'])) {
    $filtered_desktops = array_filter($filtered_desktops, function($item) {
      if (!empty($_GET['price_min']) && $item['price'] < $_GET['price_min']) {
        return false;
      }
      if (!empty($_GET['price_max']) && $item['price'] > $_GET['price_max']) {
        return false;
      }
      return true;
    });
  }
  
  if (!empty($_GET['stock_status'])) {
    $filtered_desktops = array_filter($filtered_desktops, function($item) {
      if ($_GET['stock_status'] === 'in-stock' && $item['stock'] <= 0) {
        return false;
      }
      if ($_GET['stock_status'] === 'out-of-stock' && $item['stock'] > 0) {
        return false;
      }
      return true;
    });
  }

  echo "<div class='product-grid'>";

  foreach ($filtered_desktops as $desktop) {
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
  </div>
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