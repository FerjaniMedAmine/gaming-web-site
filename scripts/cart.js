// Simple array to hold cart items
let cart = [];

function setupCart() {

    const buttons = document.querySelectorAll('.add-to-cart-btn');
    const cartLink = document.getElementById('cart-nav-link');
    const cartBadge = document.getElementById('cart-badge');

    // Cart icon click
    if (cartLink) {
        cartLink.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent page jump

            if (cart.length === 0) {
                alert("Your cart is empty!");
            } else {
                let message = "Items in your cart:\n\n";
                for (let i = 0; i < cart.length; i++) {
                    message += `- ${cart[i].name} (${cart[i].price})\n`;
                }
                alert(message);
            }
        });
    }

    // Add-to-cart buttons
    for (let i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', function () {

            // Find the closest product container
            const productBody = this.closest('.product-body');

            // Extract product info
            const productName = productBody.querySelector('h3').innerText;
            const productPrice = productBody.querySelector('.product-price').innerText;

            const item = {
                name: productName,
                price: productPrice
            };

            // Add to cart array
            cart.push(item);

            // Update badge
            if (cartBadge) {
                cartBadge.innerText = cart.length;
            }

            console.log("Item added!", item);
        });
    }
}

// Run when page finishes loading
window.addEventListener('load', setupCart);