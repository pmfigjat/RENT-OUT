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
    <link rel="stylesheet" href="style/product_details.css">
    <title>RENT OUT | More Products</title>
</head>
<body>
    <header class="header">
       <nav>
        <h2>RENT OUT</h2>
        <div class="links">
            <a href="home.php">Home</a>
            <a href="product_details.php">More Products</a>
            <a href="how_it_works.php">How It Works</a>
            <div class="dropdown">
                <button class="icon"><i class="fa-solid fa-user"></i></button><br>
                <div class="dropdown-content">
                    <a href="SignIn.php">Sign In</a><br>
                    <a href="login.php">Log In</a><br>
                    <a href="dashboard.php">Dashboard</a>
                </div>
             </div>
        </div>
       </nav> 
    </header>

    <main>
        <div class="search">
            <div class="inputs">
                <div class="name_input">
                    <h3>Product Name</h3>
                    <input type="text" id="p_name" placeholder="Type here...">
                </div>
                <div class="location_input">
                    <h3>Location</h3>
                    <input type="text" id="p_location" placeholder="Type here...">
                </div>
            </div>

            <div class="buttons-searcher">
                <button type="button" id="search">Search</button>
                <button type="button" id="clear">Clear</button>
            </div>
        </div>

        <div class="option">
            <select name="sort" id="sortby">
                <option value="sortby">Sort By</option>
                <option value="creationDate">Creation Date</option>
                <option value="priceAsc">Price Ascending</option>
                <option value="priceDsc">Price Descending</option>
            </select>
            <select name="priceperH" id="priceperH">
                <option value="priceperH">Price per hour</option>
                <option value="5">&lt; 5$</option>
                <option value="5-10">5$ - 10$</option>
                <option value="10-20">10$ - 20$</option>
                <option value="20+">20$+</option>
            </select>
            <select name="cat" id="category">
                <option value="category">Category</option>
                <option value="cameras">Cameras</option>
                <option value="Electronics">Electronics</option>
                <option value="Sports">Sports</option>
            </select>
            <select name="condition" id="condition">
                <option value="condition">Condition</option>
                <option value="bad">Bad</option>
                <option value="good">Good</option>
                <option value="excellent">Excellent</option>
            </select>
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
            <div class="product" id="product4">
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