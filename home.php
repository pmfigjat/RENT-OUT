<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;800&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/home.css">
    <title>RENT OUT | Home</title>
</head>
<body>
    <header class="header">
        <div class="bg">
            <div class="try1">
                <nav class="nav-bar">
                    <h2>RENT OUT</h2>
                    <div class="links">
                        <a href="home.html">Home</a>
                        <a href="product_details.html">More Products</a>
                        <a href="how_it_works.html">How It Works</a>
                        <div class="dropdown">
                            <button class="icon"><i class="fa-solid fa-user"></i></button><br>
                            <div class="dropdown-content">
                                <a href="SignIn.html">Sign In</a><br>
                                <a href="logIn.html">Log In</a><br>
                                <a href="dashboard.html">Dashboard</a>
                            </div>
                         </div>
                    </div>
                </nav>
            </div>

            <div class="hero"><h2>Find your, affordable equipment - available by the week, month or year</h2></div>
        </div>
        <div class="search-inputs">
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
                </div>
            </div>
        </div>
    </header>


    <main>
        <div class="container-1">
            <h1 class="pR">Products to rent</h1>
            <div class="product-section">
                <div class="arrow-left"></div>
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
                    <div class="product" id="product3">
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
                <div class="arrow-right"></div>
            </div>
        </div>

        <div class="container-2">
            <div class="background1">
                <h2>Fill out a membership application</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo ipsa, 
                    fugit aut non maxime quod aspernatur voluptatum cupiditate corrupti asperiores odit nam officia minus, 
                    expedita in quas laborum dignissimos.
                </p>
            </div>
            <div class="picture">
                <img src="img/1.jpg" alt="img" width="300px" height="550px">
            </div>
            <div class="form">
                <h3>Subscribe</h3>
                <form id="form">
                    <input id="email" type="email" placeholder="Email" ><br>
                    <input id="password" type="password" placeholder="Password" ><br>
                    <button type="submit">Subscribe</button>
                </form>
            </div>

        </div>
    </main>
</body>
<script src="js/home.js"></script>
</html>