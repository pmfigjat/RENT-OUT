const email = document.getElementById('email');
const password = document.getElementById('password');
const form = document.getElementById('form');

form.addEventListener('submit', (e) => {
    if (email.value == '' || email.value == null) {
        e.preventDefault();
        alert("Email nuk duhet te jete e thate");
        return;
    }


    if (password.value.length < 8) {
        e.preventDefault();
        alert("Passwordi duhet te kete se paku 8 karaktere");
        return;
    }
});

// let currentIndex = 3;
//     const products = document.querySelectorAll(".product");

//     function showNextProducts() {
//         for (let i = 0; i < products.length; i++) {
//             products[i].style.display = (i >= currentIndex && i < currentIndex + 3) ? "block" : "none";
//         }
//         currentIndex += 3;
//         if (currentIndex >= products.length) currentIndex = 0; // Restart after last set
//     }

//     setInterval(showNextProducts, 10000); // Switch every 10 seconds


let currentIndex = 0;
const products = document.querySelectorAll(".product");
const totalProducts = products.length;
const productsPerPage = 3;

// Function to show the current set of products
function showProducts() {
    products.forEach((product, index) => {
        product.style.display = (index >= currentIndex && index < currentIndex + productsPerPage) ? "block" : "none";
    });
}

// Right arrow click event
document.getElementById("arrow-right").addEventListener("click", () => {
    if (currentIndex + productsPerPage < totalProducts) {
        currentIndex += productsPerPage;
    } else {
        currentIndex = 0; // Restart from the beginning
    }
    showProducts();
});

// Left arrow click event
document.getElementById("arrow-left").addEventListener("click", () => {
    if (currentIndex - productsPerPage >= 0) {
        currentIndex -= productsPerPage;
    } else {
        currentIndex = Math.max(totalProducts - productsPerPage, 0); // Go to the last set
    }
    showProducts();
});

// Initial display of products
showProducts();