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
        <form method="GET" action="laptop.php">
          <div class="filter-group">
            <label for="brand">Brand</label>
            <input type="text" name="brand" id="brand" placeholder="Brand name" value="<?php echo $_GET['brand'] ?? ''; ?>">
          </div>

          <div class="filter-group">
            <label for="model">Model</label>
            <input type="text" name="model" id="model" placeholder="Laptop model" value="<?php echo $_GET['model'] ?? ''; ?>">
          </div>

          <div class="filter-group">
            <label for="cpu">CPU</label>
            <input type="text" name="cpu" id="cpu" placeholder="CPU model" value="<?php echo $_GET['cpu'] ?? ''; ?>">
          </div>

          <div class="filter-group">
            <label for="gpu">GPU</label>
            <input type="text" name="gpu" id="gpu" placeholder="GPU model" value="<?php echo $_GET['gpu'] ?? ''; ?>">
          </div>

          <div class="filter-group">
            <label for="keyboard">Keyboard</label>
            <input type="text" name="keyboard" id="keyboard" placeholder="Keyboard layout" value="<?php echo $_GET['keyboard'] ?? ''; ?>">
          </div>

          <div class="filter-group">
            <label for="size">Screen Size</label>
            <input type="text" name="size" id="size" placeholder='15.6"' value="<?php echo $_GET['size'] ?? ''; ?>">
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
        <h2>laptops</h2>
      </div>

      <div class="products-section">
        <?php
          include_once "../backend/API/LaptopAPI.php";
          
          $laptops = getAllLaptops($_GET);
          echo "<div class='product-grid'>";
          foreach($laptops as $laptop){
            $stockClass = $laptop['stock'] > 0 ? 'in-stock' : 'out-of-stock';
          
            echo "<article class='tile-card product-row'>
                    <div class='product-media'>
                      <img src='".$laptop['imgPath']."'>
                    </div>
                    <div class='product-body'>
                      <div class='product-head'>
                        <h3>".$laptop['brand']." ".$laptop['model']."</h3>
                        <span class='product-price'>".$laptop['price']." DT</span>
                      </div>
                      <div class='product-meta'>
                        <p class='product-description'>".$laptop['description']."</p>
                        <span class='".$stockClass."'>".$stockClass."</span>
                      </div>
                      <dl class='product-specs'>
                        <div><dt>CPU</dt><dd>".$laptop['cpu']."</dd></div>
                        <div><dt>GPU</dt><dd>".$laptop['gpu']."</dd></div>
                        <div><dt>RAM</dt><dd>".$laptop['ram']."</dd></div>
                        <div><dt>Storage</dt><dd>".$laptop['storages']."</dd></div>
                        <div><dt>Keyboard</dt><dd>".$laptop['keyboard']."</dd></div>
                        <div><dt>Camera</dt><dd>".$laptop['camera']."</dd></div>
                        <div><dt>Ports</dt><dd>".$laptop['ports']."</dd></div>
                        <div><dt>Charger</dt><dd>".$laptop['charger']."</dd></div>
                      </dl>
                      <button class='add-to-cart-btn'>Add to Cart</button>
                    </div>
                  </article>";
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