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
let productsPerPage = 3; // Default to 3 products per page
let products = document.querySelectorAll(".product"); // Initially get all products
const totalProducts = products.length;

function adjustProductsPerPage() {
    const screenWidth = window.innerWidth;
    if (screenWidth <= 768) {
        productsPerPage = 1; // Show 1 product per row on small screens
    } else if (screenWidth <= 1090) {
        productsPerPage = 2; // Show 2 products per row on medium screens
    } else {
        productsPerPage = 3; // Show 3 products per row on large screens
    }
    currentIndex = 0; // Reset index to start
    products = document.querySelectorAll(".product"); // Update the product elements after resizing
    showProducts(); // Display products based on new productsPerPage
}

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
adjustProductsPerPage(); // Adjust and show products on page load

// Adjust on window resize
window.addEventListener("resize", adjustProductsPerPage);


const btn = document.getElementById("btn");

btn.addEventListener('click', function() {
    // Check if the sidebar is open, and toggle accordingly
    const sidebar = document.getElementById("mySidebar");
    if (sidebar.style.width === "250px") {
        closeNav();  // If it's open, close it
    } else {
        openNav();  // If it's closed, open it
    }
});

// Function to open the sidebar
function openNav() {
    document.getElementById("mySidebar").style.width = "250px";  
}

// Function to close the sidebar
function closeNav() {
    document.getElementById("mySidebar").style.width = "0";  
}


