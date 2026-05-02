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
        <form method="GET" action="monitor.php">
          <div class="filter-group">
            <label for="brand">Brand</label>
            <select name="brand" id="brand">
              <option value="">All Brands</option>
              <option value="Samsung">Samsung</option>
              <option value="LG">LG</option>
              <option value="AOC">AOC</option>
              <option value="ASUS">ASUS</option>
              <option value="MSI">MSI</option>
            </select>
          </div>

          <div class="filter-group">
            <label for="refresh_rate">Min Refresh Rate (Hz)</label>
            <select name="refresh_rate" id="refresh_rate">
              <option value="">Any</option>
              <option value="60">60 Hz</option>
              <option value="120">120 Hz</option>
              <option value="144">144 Hz</option>
              <option value="165">165 Hz+</option>
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
        <h2>monitors</h2>
      </div>

      <div class="products-section">
     <?php
        require_once "../backend/API/monitorAPI.php";
        $filters = array();
        if (!empty($_GET['brand'])) {
          $filters['brand'] = $_GET['brand'];
        }
        $monitors = getAllMonitors($filters);
        
        // Client-side filtering for refresh rate and price
        if (!empty($_GET['refresh_rate']) || !empty($_GET['price_min']) || !empty($_GET['price_max'])) {
          $monitors = array_filter($monitors, function($item) {
            if (!empty($_GET['refresh_rate']) && $item['refreshRate'] < $_GET['refresh_rate']) {
              return false;
            }
            if (!empty($_GET['price_min']) && $item['price'] < $_GET['price_min']) {
              return false;
            }
            if (!empty($_GET['price_max']) && $item['price'] > $_GET['price_max']) {
              return false;
            }
            return true;
          });
        }
        echo '<div class="product-grid">';
        foreach ($monitors as $monitor) {
          $stockClass = $monitor['stock'] > 0 ? 'in-stock' : 'out-of-stock';
          $stockLabel = $monitor['stock'] > 0 ? 'In Stock' : 'Out of Stock';
          echo '
            <article class="tile-card product-row">
              <div class="product-media">
                <img src="'. $monitor['imgPath'] .'" alt="'. htmlspecialchars($monitor['brand'].' '.$monitor['model']) .'">
              </div>
              <div class="product-body">
                <div class="product-head">
                  <h3>'. htmlspecialchars($monitor['brand'].' '.$monitor['model']) .'</h3>
                  <span class="product-price">'. htmlspecialchars($monitor['price']) .' DT</span>
                </div>
                <p class="product-description">'. htmlspecialchars($monitor['description']) .'</p>
                <div class="product-meta">
                  <span class="'. $stockClass .'">'. $stockLabel .'</span>
                  <span class="product-tag">monitor</span>
                </div>
                <dl class="product-specs">
                  <div><dt>Refresh Rate</dt><dd>'. htmlspecialchars($monitor['refreshRate']) .'</dd></div>
                  <div><dt>Response Time</dt><dd>'. htmlspecialchars($monitor['responseTime']) .' ms</dd></div>
                  <div><dt>Panel</dt><dd>'. htmlspecialchars($monitor['panel']) .'</dd></div>
                  <div><dt>Resolution</dt><dd>'. htmlspecialchars($monitor['resolution']) .'</dd></div>
                  <div><dt>Size</dt><dd>'. htmlspecialchars($monitor['size']) .'</dd></div>
                  <div><dt>Ports</dt><dd>'. htmlspecialchars($monitor['ports']) .'</dd></div>
                </dl>
                <button class="add-to-cart-btn">Add to Cart</button>
              </div>
            </article>
          ';
        }
        echo '</div>';
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