<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;800&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/dashboard.css">
    <title>RENT OUT | Dashboard</title>
</head>
<body>
    <header class="header">
        <div class="bg">
                <nav class="nav-bar">
                    <h2>RENT OUT</h2>
                    <div class="links">
                        <a href="home.php">Home</a>
                        <a href="product_details.php">More Products</a>
                        <a href="how_it_works.php">How It Works</a>
                        <div class="dropdown">
                            <button class="icon"><i class="fa-solid fa-user"></i></button><br>
                            <div class="dropdown-content">
                                <a href="SignIn.php">Sign In</a><br>
                                <a href="logIn.php">Log In</a><br>
                                <a href="dashboard.php">Dashboard</a>
                            </div>
                         </div>
                    </div>
                </nav>
        </div>
    </header>
    <main>
        <div class="topcontent">
            <h2>*User name*</h2>
            <a href="add_product.html"><i class="fa-regular fa-plus"></i> Add a product</a>
        </div>


        <div class="products">
            <div class="product" id="product1">
                <div class="product-image">
                    <img src="" alt="product image">
                </div>
            
                <div class="product-info">
                    <h3>*product name*</h3>
                    <p class="rented">*time rented*</p>
                    <hr>
                    <div class="lastpart">
                        <p class="product-price">*product price*</p>
                        <button class="btn-view">view</button>
                    </div>
                </div>
            </div>
            <div class="product" id="product2">
                <div class="product-image">
                    <img src="" alt="product image">
                </div>
            
                <div class="product-info">
                    <h3>*product name*</h3>
                    <p class="rented">*time rented*</p>
                    <hr>
                    <div class="lastpart">
                        <p class="product-price">*product price*</p>
                        <button class="btn-view">view</button>
                    </div>
                </div>
            </div>
            <div class="product" id="product2">
                <div class="product-image">
                    <img src="" alt="product image">
                </div>
            
                <div class="product-info">
                    <h3>*product name*</h3>
                    <p class="rented">*time rented*</p>
                    <hr>
                    <div class="lastpart">
                        <p class="product-price">*product price*</p>
                        <button class="btn-view">view</button>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
</body>
</html>