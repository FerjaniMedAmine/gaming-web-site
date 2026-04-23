var monitorsContainer =document.getElementById("monitorsContainer");
async function loadMonitors(){
    try{
        var response = await fetch("/PROJETWEB/backend/API/monitorAPI.php");
        if(!response.ok){
            throw new Error("monitor API error");
        }   
        var monitors =await response.json();
        var html = "<div class='product-grid'>";
        for (let monitor of monitors){
            let stockClass = monitor.stock ==0 ? "availability-tag soldout" : "availability-tag available";
            let stockLabel = monitor.stock ==0 ? "sold out" : "in stock";
            html +="<article class='tile-card product-row'>";
            html +="<div class='product-media'>";
            html +="<img src='"+monitor.imgPath+"'>";
            html +="</div>";
            html +="<div class='product-body'>";
            html +="<div class='product-head'>";
            html +="<h3>"+monitor.brand+" "+monitor.model+"</h3>";
            html +="<span class='product-price'>"+monitor.price+" DT"+"</span>";
            html +="</div>";
            html +="<p class='product-description'>"+monitor.description+"</p>";
            html +="<div class='product-meta'>";
            html +="<span class='"+stockClass+"'>"+stockLabel+"</span>";
            html +="<span class='product-tag'>monitor</span>";
            html +="</div>";
            html +="<dl class='product-specs'>";
            html +="<div><dt>refresh_rate</dt><dd>"+monitor.refreshRate+"</dd></div>";
            html +="<div><dt>RESPONSE TIME</dt><dd>"+monitor.responseTime+" ms"+"</dd></div>";
            html +="<div><dt>PANEL</dt><dd>"+monitor.panel+"</dd></div>";
            html +="<div><dt>RESOLUTION</dt><dd>"+monitor.resolution+"</dd></div>";
            html +="<div><dt>Size</dt><dd>"+monitor.size+"</dd></div>";
            html +="<div><dt>ports</dt><dd>"+monitor.ports+"</dd></div>";
            html +="</dl>";
            html +="</div>";
            html +="</article>";


        }
        html +="</div>";
        monitorsContainer.innerHTML =html;
    }catch(error){
        console.error("error " + error);

    }
}
loadMonitors();



