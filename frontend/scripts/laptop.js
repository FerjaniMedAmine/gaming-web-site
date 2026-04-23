var laptopsContainer =document.getElementById("laptopsContainer");
async function loadLaptops(){
    try{
        var response = await fetch("/PROJETWEB/backend/API/laptopAPI.php");
        if(!response.ok){
            throw new Error("laptop api error");
        }
        var laptops= await response.json();
        var html = "<div class='product-grid'>";
        for(var laptop of laptops){
            var stockClass = laptop.stock ==0 ? "availability-tag soldout" : "availability-tag available";
            var stockLabel = laptop.stock ==0 ? "sold out" : "in stock";
            html +="<article class='tile-card product-row'>";
            html +="<div class='product-media'>";
            html +="<img src='"+laptop.imgPath+"'>";
            html +="</div>";
            html +="<div class='product-body'>";
            html +="<div class='product-head'>";
            html +="<h3>"+laptop.brand+" "+laptop.model+"</h3>";
            html +="<span class='product-price'>"+laptop.price+" DT</span>";
            html +="</div>";
            html +="<p class='product-description'>"+laptop.description+"</p>";
            html +="<div class='product-meta'>";
            html +="<span class='"+stockClass+"'>"+stockLabel+"</span>";
            html +="</div>";
            html +="<dl class='product-specs'>";
            html +="<div><dt>CPU</dt><dd>"+laptop.cpu+"</dd></div>";
            html +="<div><dt>GPU</dt><dd>"+laptop.gpu+"</dd></div>";
            html +="<div><dt>RAM</dt><dd>"+laptop.ram+"</dd></div>";
            html +="<div><dt>Storage</dt><dd>"+laptop.storages+"</dd></div>";
            html +="<div><dt>Size</dt><dd>"+laptop.size+"</dd></div>";
            html +="<div><dt>Keyboard</dt><dd>"+laptop.keyboard+"</dd></div>";
            html +="<div><dt>Camera</dt><dd>"+laptop.camera+"</dd></div>";
            html +="<div><dt>Ports</dt><dd>"+laptop.ports+"</dd></div>";
            html +="<div><dt>Charger</dt><dd>"+laptop.charger+"</dd></div>";
            html +="</dl>";
            html +="</div>";
            html +="</article>"; 
        }
        html +="</div>";
        laptopsContainer.innerHTML =html;



    }catch(error){
        console.error("error loading laptops:" ,error);
    }
}
loadLaptops();
