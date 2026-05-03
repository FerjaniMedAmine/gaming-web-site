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
            <input type="text" name="brand" id="brand" placeholder="Brand name" value="<?php echo $_GET['brand'] ?? ''; ?>">
          </div>

          <div class="filter-group">
            <label for="model">Model</label>
            <input type="text" name="model" id="model" placeholder="Monitor model" value="<?php echo $_GET['model'] ?? ''; ?>">
          </div>

          <div class="filter-group">
            <label for="panel">Panel</label>
            <input type="text" name="panel" id="panel" placeholder="Panel type" value="<?php echo $_GET['panel'] ?? ''; ?>">
          </div>

          <div class="filter-group">
            <label for="refreshRate">Refresh Rate</label>
            <select name="refreshRate" id="refreshRate">
              <option value="" <?php echo (($_GET['refreshRate'] ?? '') === '') ? 'selected' : ''; ?>>Any Refresh Rate</option>
              <option value="165" <?php echo (($_GET['refreshRate'] ?? '') === '165') ? 'selected' : ''; ?>>165 Hz</option>
              <option value="180" <?php echo (($_GET['refreshRate'] ?? '') === '180') ? 'selected' : ''; ?>>180 Hz</option>
              <option value="240" <?php echo (($_GET['refreshRate'] ?? '') === '240') ? 'selected' : ''; ?>>240 Hz</option>
            </select>
          </div>

          <div class="filter-group">
            <label for="resolution">Resolution</label>
            <input type="text" name="resolution" id="resolution" placeholder="Resolution" value="<?php echo $_GET['resolution'] ?? ''; ?>">
          </div>

          <div class="filter-group">
            <label for="stock">Stock</label>
            <select name="stock" id="stock">
              <option value="" <?php echo (($_GET['stock'] ?? '') === '') ? 'selected' : ''; ?>>All</option>
              <option value=">0" <?php echo (($_GET['stock'] ?? '') === '>0') ? 'selected' : ''; ?>>In stock</option>
              <option value="=0" <?php echo (($_GET['stock'] ?? '') === '=0') ? 'selected' : ''; ?>>Out of stock</option>
            </select>
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
        $monitors = getAllMonitors($_GET);
        echo '<div class="product-grid">';
        foreach ($monitors as $monitor) {
          $stockClass = $monitor['stock'] > 0 ? 'in-stock' : 'out-of-stock';
          
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
                  <span class="'. $stockClass .'">'. $stockClass .'</span>
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