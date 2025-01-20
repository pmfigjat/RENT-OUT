<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;800&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/how_it_works.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>RENT OUT | How It Works</title>
</head>
<body>
    <header class="header">
        <nav>
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
     </header>
     <div class="hero">
            <div class="content1">
                <h2>Find your, affordable equipment — available by the week, month or year.</h2>
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
     </div>

     <main>
        <div class="container1">
            <h2>How RENT OUT Works</h2>
            <div class="full-content">
                <div class="upper-part">
                    <div class="images">
                        <img src="img/alianz.png" alt="alianz" width="120" height="auto">
                        <img src="img/30.png" alt="30" width="120" height="auto">
                    </div>

                    <div class="first">
                        <h4>01</h4>
                        <h4>Find your desireable product.</h4>
                        <p>Find all the tools and information you need to make the most of your studies 
                            – from course planning and cordinate advice, to internships and ...</p>
                    </div>
                </div>

                <div class="bottom-part">
                    <div class="second">
                        <h4>02</h4>
                        <h4>Book your product</h4>
                        <p>Find all the tools and information you need to make the most of your studies 
                            – from course planning and cordinate advice, to internships and</p>
                    </div>
                    <div class="third">
                        <h4>03</h4>
                        <h4>Received quckily & enjoy</h4>
                        <p>Find all the tools and information you need to make the most of your studies 
                            – from course planning and cordinate advice, to internships and</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="container2">
            <div class="why-rentOut">
                <h3>Why Rent Out?</h3>
                <p>Find all the tools and information you need to make the most of your studies
                     – from course planning and cordinate advice, to internships and</p>
                <p>- Lorem ipsum dorom</p> 
                <p>- Lorem ipsum dorom</p>   
                <p>- Lorem ipsum dorom</p> 
                <p>- Lorem ipsum dorom</p>        
            </div>
        </div>

        <div class="container3">
            <h3>Frequently Asked Questions</h3>

            <div class="questions">
                <p class="question" id="q1">How to order my product?</p>
                <p class="answer" id="a1">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor...</p>
                <p class="question" id="q2">What is the payment procedure for booking?</p>
                <p class="answer" id="a2">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor...</p>
                <p class="question" id="q3">If I subscribe in the middle of the month, when do I get my report?</p>
                <p class="answer" id="a3">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor...</p>
            </div>
        </div>
     </main>
</body>
</html>