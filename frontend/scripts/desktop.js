var desktopsContainer = document.getElementById("desktopsContainer");




async function loadDesktops() {
  try {
    var response = await fetch("/PROJETWEB/backend/API/desktopAPI.php");
    if (!response.ok) {
      throw new Error("desktop API error " );
    }
    var desktops = await response.json();

   
    var html = "<div class='product-grid'>";
    for (let d of desktops) {
      let stockClass = d.stock == 0 ? "availability-tag soldout" : "availability-tag available";
      let stockLabel = d.stock == 0 ? "sold out" : "in stock";

      html += "<article class='tile-card product-row'>";

      html +=   "<div class='product-media'>";
      html +=     "<img src='" + d.imgPath + "'>";
      html +=   "</div>";

      html +=   "<div class='product-body'>";
      html +=     "<div class='product-head'>";
      html +=       "<h3>" + d.cpu + "</h3>";
      html +=       "<span class='product-price'>" + d.price + " DT</span>";
      html +=     "</div>";
      html +=     "<p class='product-description'>" + d.description + "</p>";
      html +=     "<div class='product-meta'><span class='" + stockClass + "'>" + stockLabel + "</span></div>";
      html +=     "<dl class='product-specs'>";
      html +=     "<div><dt>GPU</dt><dd>" + d.gpu + "</dd></div>";
      html +=     "<div><dt>RAM</dt><dd>" + d.ram + "</dd></div>";
      html +=     "<div><dt>Storage</dt><dd>" + d.storages + "</dd></div>";
      html +=     "<div><dt>Motherboard</dt><dd>" + d.motherboard + "</dd></div>";
      html +=     "<div><dt>PSU</dt><dd>" + d.psu + "</dd></div>";
      html +=     "<div><dt>Cooler</dt><dd>" + d.cooler + "</dd></div>";
      html +=     "<div><dt>Tower</dt><dd>" + d.tower + "</dd></div>";
      html +=     "</dl>";
      html +=   "</div>";
      html += "</article>";
    }
    html += "</div>";
    desktopsContainer.innerHTML = html;
  } catch (error) {
    console.error(error);
  }
}
loadDesktops();
