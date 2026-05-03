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
              <option value="" <?php echo (($_GET['categorie'] ?? '') === '') ? 'selected' : ''; ?>>All Categories</option>
              <option value="cpu" <?php echo (($_GET['categorie'] ?? '') === 'cpu') ? 'selected' : ''; ?>>CPU</option>
              <option value="gpu" <?php echo (($_GET['categorie'] ?? '') === 'gpu') ? 'selected' : ''; ?>>GPU</option>
              <option value="ram" <?php echo (($_GET['categorie'] ?? '') === 'ram') ? 'selected' : ''; ?>>RAM</option>
              <option value="storage" <?php echo (($_GET['categorie'] ?? '') === 'storage') ? 'selected' : ''; ?>>Storage</option>
              <option value="psu" <?php echo (($_GET['categorie'] ?? '') === 'psu') ? 'selected' : ''; ?>>PSU</option>
            </select>
          </div>

          <div class="filter-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Component name" value="<?php echo $_GET['name'] ?? ''; ?>">
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
        <h2>Components</h2>
      </div>

      <div class="products-section">
<?php
  include_once "../backend/API/componentAPI.php";

  $components = getAllComponents($_GET);

  echo "<div class='product-grid'>";

  foreach ($components as $component) {
    $stockClass = $component['stock'] > 0 ? 'in-stock' : 'out-of-stock';
 

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
          <span class='{$stockClass}'>{$stockClass}</span>
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