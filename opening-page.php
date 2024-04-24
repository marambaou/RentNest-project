<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="top.nav.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="footer.css">
    <title>Rent Nest Project</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: Arial;
        }
        body {
            background: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.1));
        }
        .media {
    position: absolute;
    right: 0;
    z-index: 999;
    justify-content: right;
    background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8));
    margin-right: 15px;
    height: 80%;
    width: 250px;
    padding-left: 10px;
    display: none;
}
.media li {
    list-style: none;
}
.media li a {
    text-decoration: none;
    color: white;
    line-height: 3;
    font-weight: bold;
    text-align: start;
}
.media li a:hover {
    color: wheat;
}

.fa-xmark {
    font-size: 28px;
    color: white;
    text-align: end;
}
.fa-xmark:hover {
    cursor: pointer;
    color: wheat;
}
@media all and (max-width: 1246px) {
    .top-right li i {
        display: block;
    }
    .links {
        display: none;
    }

}
@media all and (max-width: 712px) {
    .top-right li i {
        display: block;
    }
    .top-right {
        display: none;
    }
   
}
    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">RENT NEST</div>
            <ul class="links">
                <li><a href="">Home</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="">Contact Us</a></li>
                <li><a href="">Get Started</a></li>
            </ul>
            
            <ul class="top-right">
                <li><a href="house-seekers-sign-up.php" id="search">Search House</a></li>
                <li><a href="listing-login.php" id="list">Create Listing</a></li>
                <li><i class="fa-solid fa-list" id="menu"></i></li>
            </ul>
            
        
        </div>

        <div class="media links" id="display">
            <li><i class="fa-solid fa-xmark" id="xmark"></i></li>
            <li><a href="" >Home</a></li>
            <li><a href="">About Us</a></li>
            <li><a href="">Contact Us</a></li>
            <li><a href="">Get Started</a></li>
        </div>

        <div class="header-content">
            <h2>Finding You New <br>Home is simple.</h2>
            <p class="piri">Rent Nest if your go to destination for finding the perferct <br> rental home to suite your needs. With thousands of properties listed across the world. <br> Your comfortability is our first priority</p>
            <input type="button" value="Get started" class="btn">

            <div class="cont-search">
                <input type="text" placeholder="Category">
                <input type="text" placeholder="Location/ town/ County">
                <input type="text" placeholder="Maximum Price">
                <button class="btn-search"><i class="fa-solid fa-magnifying-glass-location"></i> Search</button>
            </div>

        </div>
        
    </header>
    <section class="events">
        <div class="title">
            <h1>MOST VIEWED</h1>
            <div class="line"><p>Discover a range of homes worldwide book securely and get expert customer support. RentNest is your ultimate house seeking solution</p></div>
        </div>
        <div class="row">
            <div class="column">
                <img src="r-architecture-T6d96Qrb5MY-unsplash.jpg" alt="">
                <h4>LOCATION: juja CATEGORY:4 Bedroom <br> PRICE: Ksh.40,000 </h4>
                <p>This amenity is located in the vicnity of juja town, <br> whith maximum security measures in place. <br> Water is available 24/7. </p>
                <a href="" class="pic-btn">Book now</a>
            
            </div>
            <div class="column">
                <img src="r-architecture-wot0Q5sg91E-unsplash.jpg" alt="">
                <h4>LOCATION: kilimani CATEGORY:4 Bedroom <br> PRICE: Ksh.35,000 </h4>
                <p>This amenity is located in the vicnity of kilimani town,<br>whith maximum security measures in place. <br>Water is available 24/7, Book now. </p>
                <a href="" class="pic-btn">Book now</a>
            
            </div>
            <div class="column">
                <img src="outsite-co-R-LK3sqLiBw-unsplash.jpg" alt="">
                <h4>LOCATION: juja CATEGORY:4 Bedroom <br> PRICE: Ksh.40,000 </h4>
                <p>This amenity is located in the vicnity of juja town, <br> whith maximum security measures in place. <br> Water is available 24/7. </p>
                <a href="" class="pic-btn">Book now</a>
            
            </div>
        </div>
        <div class="row">
            <div class="column">
                <img src="r-architecture-Eh_It1hg4Hs-unsplash.jpg" alt="">
                <h4>LOCATION: juja CATEGORY:4 Bedroom <br> PRICE: Ksh.40,000 </h4>
                <p>This amenity is located in the vicnity of juja town, <br> whith maximum security measures in place. <br> Water is available 24/7. </p>
                <a href="" class="pic-btn">Book now</a>
            
            </div>
            <div class="column">
                <img src="jason-briscoe-UV81E0oXXWQ-unsplash.jpg" alt="">
                <h4>LOCATION: kilimani CATEGORY:4 Bedroom <br> PRICE: Ksh.35,000 </h4>
                <p>This amenity is located in the vicnity of kilimani town,<br>whith maximum security measures in place. <br>Water is available 24/7, Book now. </p>
                <a href="" class="pic-btn">Book now</a>
            
            </div>
            <div class="column">
                <img src="jason-briscoe-AQl-J19ocWE-unsplash.jpg" alt="">
                <h4>LOCATION: juja CATEGORY:4 Bedroom <br> PRICE: Ksh.40,000 </h4>
                <p>This amenity is located in the vicnity of juja town, <br> whith maximum security measures in place. <br> Water is available 24/7. </p>
                <a href="" class="pic-btn">Book now</a>
            
            </div> 
        </div><br><br><br>
        <a href="house-seeker-log-in.php" id="show">Show All</a>

        <hr>
        <div class="map">
        <p class="maping">Map navigation</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127641.17044272093!2d36.76499561793435!3d-1.3030359779430214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1172d84d49a7%3A0xf7cf0254b297924c!2sNairobi%2C%20Kenya!5e0!3m2!1sen!2sca!4v1710338248195!5m2!1sen!2sca" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="about">
            <div class="image">
                <img src="towfiqu-barbhuiya-joqWSI9u_XM-unsplash.jpg" alt="" class="phot">
                
            </div>
            <div class="image-text">
                <p class="text">ABOUT US</p>
                <p class="word">Welcome to RentNest, where we're redefining the way people search for rental properties. Our platform was born out of a deep understanding of the challenges faced by tenants and property owners in the traditional house-hunting process. We recognized the financial burdens, inefficiencies, and environmental impacts associated with the conventional approach to finding rental accommodations.

                    At RentNest, we leverage the power of technology to streamline the rental property search process. Our user-friendly platform allows tenants to explore a wide range of properties from the comfort of their homes, eliminating the need for extensive travel and costly advertising. For property owners, RentNest offers a cost-effective solution for promoting their available properties, reducing the need for traditional advertising methods and real estate agent fees.
                    
                    Our mission is to make the house-hunting experience more efficient, affordable, and environmentally friendly. By embracing technology, we're not only simplifying the rental property search process but also contributing to a more sustainable real estate market.
                    
                    Join us on our journey to revolutionize the way people find rental properties. Whether you're a tenant in search of your dream home or a property owner looking to fill your vacancies, RentNest is here to help you every step of the way."</p>
                
            </div>
        </div>
        <div class="steps">
            <h1>Our Work in 3 Steps</h1>
            <p>Discover a range of vacation homes worldwide book securely and get expert customer support for a stress free stay</p>
        </div>
        <div class="our-work">
            <div class="each-work">
                <i class="fa-solid fa-house"></i><br>
                <h5>Research Phase</h5><br>
                <p>Find Your Dream in just few clicks. Ensure to include precise information E.G location, category and price.</p>
            </div>
            <div class="each-work">
                <i class="fa-solid fa-cart-plus"></i><br>
                <h5>Book Your House</h5><br>
                <p>Find your vacation house booking with ease and piece of mind. View the house photos to your satisfaction before making the decision</p>
            </div>
            <div class="each-work">
                <i class="fa-solid fa-handshake"></i><br>
                <h5>Close the deal</h5><br>
                <p>Get the contact of the house owner or the caretaker of the house, to enable you get more information if needed and physical viewing of the house</p>
            </div>
        </div>
        <div class="app">
          <div class="contt">
                <div class="official">
                    <div class="txt">Dicover us in our app</div>
                    <div class="play-store"><i class="fa-brands fa-google-play"></i></div>
                    <div class="download">Download</div>
                </div>
                <p class="stxt">Discover a range of vacation homes woldwide, <br> book securely online and get expert customer care for a stress fee stay</p> 
          </div>
        </div>
        
    </section>
    <footer class="footer">
        <div class="row2">
            <div class="col">
                <h3>RENT NEST <div class="underline"><span></span></div></h3>
                <P>Discover a range of vacaton home woldwide, <br> book securely online and get a expert customer care for a stress free stay. Since we value your privacy all your data and search history will be kept secure.</P>
            </div>
            <div class="col">
                <h3>Office <div class="underline"><span></span></div></h3>
                <p>ITPL Road</p>
                <p>Whitefield,  Bangalore</p>
                <p>Karnataka, PIN 560066, Nairobi</p>
                <p class="email-id">rentnest africa@gmail.com</p>
                <h4>+254-0123456767</h4>
            </div>
            <div class="col">
                <h3>Links <div class="underline"><span></span></div></h3>
                
                <li><a href="">Home</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="">Contact Us</a></li>
                <li><a href="">Sign UP</a></li>
                <li><a href="">Log in</a></li>
               
               
            </div>
            <div class="col">
                <h3>News Letter <div class="underline"><span></span></div></h3>
                <form action="" id="foorm">
                     <i class="fa-regular fa-envelope"></i>
                    <input type="email" placeholder="Enter your email id" required>
                    <button type="button"><i class="fa-solid fa-arrow-right"></i></button>

                </form>
                <div class="social-icon">
                    <i class="fa-brands fa-whatsapp"></i>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-x-twitter"></i>
                    <i class="fa-brands fa-tiktok"></i>
                </div>
            </div>
        </div>
        <hr>
        <p class="copy-right">Rent Nest Africa ©  2024 - All Right reserverd</p>
    </footer>
    <script>

        const menu = document.getElementById('menu');
        const display = document.getElementById('display');
        const mark = document.getElementById('xmark');
        mark.addEventListener( 'click', function(){
            display.style.display = 'none';
        });

        menu.addEventListener('click', function(){
            display.style.display = 'block';
        });

    </script>
</body>
</html>