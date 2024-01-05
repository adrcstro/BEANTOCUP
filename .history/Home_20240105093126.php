
<!DOCTYPE html>
<html lang="en">
<head>   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="images/webiconss.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
    <title>BEAN to CUP</title>
</head>
<body>
 
<!-- NAvvar-->
<nav class="navbar navbar-expand-lg navbar-light  bg-white shadow">
    <div class="container">
      <a style="color: #E48F45;" class="navbar-brand" href="#">BEAN TO CUP<i style="margin-left: 10px;" class="fas fa-mug-hot" aria-hidden="true"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" onclick="showHome()">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page"onclick="showAbout()" >ABOUT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" onclick="showMenu()" >MENU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" onclick="showReviews()" >REVIEWS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" onclick="showContact()" >CONTACT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" onclick="showBlogs()" >BLOGS&NEWS</a>
          </li>
         
        </ul>
        <form class="d-flex" id="btn-phonenavbar">
    <button class="btn btn-brand" type="button" name="login" onclick="redirectToLogin()">Login</button>
    <button class="btn-signup" type="button" onclick="redirectToSignUp()">Sign up</button>
</form>
<script>
    function redirectToLogin() {
        window.location.href = "login.php";
    }

    function redirectToSignUp() {
        // Replace "yourSignUpFile.php" with the actual filename you want to redirect to
        window.location.href = "signup.php";
    }
</script>

        
      </div>
    </div>
  </nav>

<!--home copntent-->
<div id="carouselExampleDark" class="carousel carousel-light slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">



      <div class="carousel-item text-center bg-cover vh-100 active slide-1" data-bs-interval="3000">

        <div class="container h-100 d-flex align-items-center justify-content-center"> 
        <div class="row justify-content-center">
            <div class="col-lg-8">
            <h1 class="display-1 fw-bold text-white">FRESH COFFE IN THE MORNING</h1>
            <h6 class="text-white">"Indulge in the rich, aromatic embrace of our handcrafted coffee blends, meticulously curated to awaken your senses and elevate your daily brew. Experience the perfect harmony of robust flavors and smooth textures, delivering an unparalleled coffee journey that transcends ordinary sips."</h6>
            <a href="#" style="margin-top: 10px;" class="btn btn-brand" onclick="showAbout()">EXPLORE</a>
            <a href="#" style="margin-top: 10px;" class="btn btn-secondary"onclick="redirectToSignUp()">ORDER</a>
        </div>
      </div>
    </div>
  </div>


      <div class="carousel-item text-center bg-cover vh-100 slide-2 " data-bs-interval="2000">
        
        <div class="container h-100 d-flex align-items-center justify-content-center"> 
        <div class="row justify-content-center">
            <div class="col-lg-8">
              <h1 class="display-1 fw-bold text-white">FRESH COFFE IN THE MORNING</h1>
            <h6 class="text-white">"Indulge in the rich, aromatic embrace of our handcrafted coffee blends, meticulously curated to awaken your senses and elevate your daily brew. Experience the perfect harmony of robust flavors and smooth textures, delivering an unparalleled coffee journey that transcends ordinary sips."</h6>
            <a href="#" style="margin-top: 10px;" class="btn btn-brand" onclick="showAbout()">EXPLORE</a>
            <a href="#" style="margin-top: 10px;" class="btn btn-secondary"onclick="redirectToSignUp()">ORDER</a>
        </div>
        </div>
      </div>
    </div>

 

      <div class="carousel-item text-center bg-cover vh-100 slide-3"data-bs-interval="1000">

        <div class="container h-100 d-flex align-items-center justify-content-center"> 
        <div class="row justify-content-center">
            <div class="col-lg-8">
              <h1 class="display-1 fw-bold text-white">FRESH COFFE IN THE MORNING</h1>
              <h6 class="text-white">"Indulge in the rich, aromatic embrace of our handcrafted coffee blends, meticulously curated to awaken your senses and elevate your daily brew. Experience the perfect harmony of robust flavors and smooth textures, delivering an unparalleled coffee journey that transcends ordinary sips."</h6>
              <a href="#" style="margin-top: 10px;" class="btn btn-brand" onclick="showAbout()">EXPLORE</a>
            <a href="#" style="margin-top: 10px;" class="btn btn-secondary"onclick="redirectToSignUp()">ORDER</a>
        </div>
        </div>
      </div>
    </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


 





<!--About Section-->
<section style="display: none;" class="aboutsection" id="aboutsection"> 
<div class="Heading" id="aboutus" >
<h1>About Us</h1>
<p>"Sip, savor, and elevate your moments with our expertly crafted coffees"</p>
</div>
<div class="abt-container">
<section class="about">
  <div class="about-images">
<img style="border-radius: 20px;" src="Images/co4.jpg">
  </div>
<div class="about-content">
  <h2>Organic products made with love.
    That's what you get from us.</h2>
<p>Welcome to "Bean to Cup," a haven for discerning coffee enthusiasts. Here at Bean to Cup, 
  we're dedicated to the art of bringing you the perfect cup of coffee, starting from the bean 
  and ending with an exquisite sip. Our commitment to excellence is reflected in the carefully 
  curated selection of ethically sourced beans from across the globe. Our skilled baristas, true 
  maestros of the coffee craft, artfully brew each cup, ensuring a harmonious blend of flavors 
  and aromas that dance on your palate. Beyond the exceptional coffee, Bean to Cup is a vibrant 
  community space where conversations flow as smoothly as our freshly ground beans, and the cozy 
  atmosphere beckons you to unwind and savor the moment.</p>
  <a href="https://www.facebook.com/beantocupph/" target="_blank" style="background-color: #E48F45;" class="read-more">Read More</a>
</div>
</section>
</div>




</section>

<!--Menu start------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->






 
<section style="display: none;" class = "menus" id="menu">
  <div class = "menu-container">
    <div class = "menu-head">
      <h2>Our Menu</h2>
      
    </div>

    <div class="menu-btns">
      <button type="button" class="menu-btn active-btn" id="featured"><i class="fa-solid fa-mug-hot"></i></i>Hot Coffee's</button>
      <button type="button" class="menu-btn" id="today-special"><i class="fa-solid fa-cake-candles"></i>Pastries</button>
      <button type="button" class="menu-btn" id="new-arrival"><i class="fa-solid fa-mug-saucer"></i>Ice Coffee's</button>
      <button type="button" class="menu-btn" id="Blended-Coffee"><i class="fa-solid fa-blender"></i>Blended Coffee's</button>
      <button type="button" class="menu-btn" id="Hot-tea"><i class="fa-brands fa-envira"></i>Hot Tea's</button>
  </div>

    <div class = "food-items">
      <div class = "food-item featured">
        <div class = "food-img">
          <img src = "Images/hotcoffee1.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Caramel Macchiato</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$25.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Featured</span></p>
        </div>
      </div>
      <div class = "food-item today-special">
        <div class = "food-img">
          <img src = "Images/pastreis5.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Lemon Cake</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$20.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Today's Special</span></p>
        </div>
      </div>

      <div class = "food-item new-arrival">
        <div class = "food-img">
          <img src = "Images/icecofee1.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Frosty Frappé</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$35.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>New Arrivals</span></p>
        </div>
      </div>
      <!-- end of item -->
      <div class = "food-item featured">
        <div class = "food-img">
          <img src = "Images/hotcoffee2.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Caramel Comfort</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$27.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Featured</span></p>
        </div>
      </div>

      <div class = "food-item today-special">
        <div class = "food-img">
          <img src = "Images/pastreis1.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Chocolate Sandwich</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$15.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Today's Special</span></p>
        </div>
      </div>
      <!-- end of item -->

      <!-- item -->
      <div class = "food-item new-arrival">
        <div class = "food-img">
          <img src = "Images/icecofee2.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Ice Elixir</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$10.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>New Arrivals</span></p>
        </div>
      </div>
      <!-- end of item -->

      <!-- item -->
      <div class = "food-item featured">
        <div class = "food-img">
          <img src = "Images/hotcoffee3.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Hazelnut Heaven</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$15.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Featured</span></p>
        </div>
      </div>
      <!-- end of item -->

      <!-- item -->
      <div class = "food-item today-special">
        <div class = "food-img">
          <img src = "Images/pastreis2.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Strawberry Pancake's</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$29.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Today's Special</span></p>
        </div>
      </div>
      <!-- end of item -->

      <!-- item -->
      <div class = "food-item new-arrival">
        <div class = "food-img">
          <img src = "Images/icecofee3.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Chai Chill</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$35.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>New Arrivals</span></p>
        </div>
      </div>
      <!-- end of item -->

      <!-- item -->
      <div class = "food-item featured">
        <div class = "food-img">
          <img src = "Images/hotcoffee4.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Hazelnut Heaven</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$9.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Featured</span></p>
        </div>
      </div>
      <!-- end of item -->

      <!-- item -->
      <div class = "food-item today-special">
        <div class = "food-img">
          <img src = "Images/pastreis3.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Chocolate Cake</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$5.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Today's Special</span></p>
        </div>
      </div>
      <!-- end of item -->

      <!-- item -->
      <div class = "food-item new-arrival">
        <div class = "food-img">
          <img src = "Images/icecofee4.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Frozen Tiramisu</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$11.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>New Arrivals</span></p>
        </div>
      </div>
      <!-- end of item -->

      <!-- item -->
      <div class = "food-item featured">
        <div class = "food-img">
          <img src = "Images/hotcoffee5.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Almond Bliss</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$5.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Featured</span></p>
        </div>
      </div>
      <!-- end of item -->

      <!-- item -->
      <div class = "food-item today-special">
        <div class = "food-img">
          <img src = "Images/pastreis4.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Waffle's</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$12.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Today's Special</span></p>
        </div>
      </div>
      <!-- end of item -->

      <!-- item -->
      <div class = "food-item new-arrival">
        <div class = "food-img">
          <img src = "Images/icecofee5.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Peach Permafrost</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$14.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>New Arrivals</span></p>
        </div>
      </div>
      <!-- end of item -->

      <!-- item -->
      <div class = "food-item featured">
        <div class = "food-img">
          <img src = "Images/hotcoffee6.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Colombian Cloud</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$22.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Featured</span></p>
        </div>
      </div>
      <!-- end of item -->

      <!-- item -->
      <div class = "food-item today-special">
        <div class = "food-img">
          <img src = "Images/pastreis6.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Croissant's</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$7.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Today's Special</span></p>
        </div>
      </div>
      <!-- end of item -->

      <!-- item -->
      <div class = "food-item new-arrival">
        <div class = "food-img">
          <img src = "Images/icecofee6.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Mint Chocolate Chill</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$26.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>New Arrivals</span></p>
        </div>
      </div>







   
      <div class = "food-item Blended-Coffee">
        <div class = "food-img">
          <img src = "Images/blended1.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Mocha Bliss Blend</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$26.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Blended Coffee</span></p>
        </div>
      </div>

      <div class = "food-item Blended-Coffee">
        <div class = "food-img">
          <img src = "Images/blended2.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Caramel Fusion Delight</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$26.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Blended Coffee</span></p>
        </div>
      </div>

      <div class = "food-item Blended-Coffee">
        <div class = "food-img">
          <img src = "Images/blended3.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Hazelnut Harmony Elixir</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$26.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Blended Coffee</span></p>
        </div>
      </div>


      <div class = "food-item Blended-Coffee">
        <div class = "food-img">
          <img src = "Images/blended4.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Espresso Dream Blend</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$26.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Blended Coffee</span></p>
        </div>
      </div>

      <div class = "food-item Blended-Coffee">
        <div class = "food-img">
          <img src = "Images/blended5.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Coconut Cream Symphony</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$26.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Blended Coffee</span></p>
        </div>
      </div>

      <div class = "food-item Blended-Coffee">
        <div class = "food-img">
          <img src = "Images/blended6.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Vanilla Velvet Swirl</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$26.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Blended Coffee</span></p>
        </div>
      </div>







  
      <div class = "food-item Hot-tea">
        <div class = "food-img">
          <img src = "Images/hottea1.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Spiced Chai Serenity</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$26.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Hot tea</span></p>
        </div>
      </div>
      <div class = "food-item Hot-tea">
        <div class = "food-img">
          <img src = "Images/hottea2.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Peppermint Tranquili-Tea</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$26.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Hot tea</span></p>
        </div>
      </div>
      <div class = "food-item Hot-tea">
        <div class = "food-img">
          <img src = "Images/hottea3.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Lemon Ginger Zest Infusion</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$26.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Hot tea</span></p>
        </div>
      </div>
      <div class = "food-item Hot-tea">
        <div class = "food-img">
          <img src = "Images/hottea4.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Earl Grey Elegance</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$26.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Hot tea</span></p>
        </div>
      </div>
      <div class = "food-item Hot-tea">
        <div class = "food-img">
          <img src = "Images/hottea5.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Hibiscus Berry Harmony</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$26.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Hot tea</span></p>
        </div>
      </div>
      <div class = "food-item Hot-tea">
        <div class = "food-img">
          <img src = "Images/hottea6.jpg" alt = "food image">
        </div>
        <div class = "food-content">
          <h2 class = "food-name">Green Jasmine Joyburst</h2>
          <div class = "line"></div>
          <h3 class = "food-price">$26.00</h3>
          <ul class = "rating">
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "fas fa-star"></i></li>
            <li><i class = "far fa-star"></i></li>
          </ul>
          <p class = "category">Categories: <span>Hot tea</span></p>
        </div>
      </div>



    </div>
</div>


</section>

<!--Menu part------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->




<!--testimonials------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->




<div  style="display: none;" class="outerdiv" id="reviews">
  <h2>Reviews From Popular Coffee Enthusiasts</h2>
  <div class="innerdiv">
    <!-- div1 -->
    <div class="div1 eachdiv">
      <div class="userdetails">
        <div class="imgbox">
          <img src="https://raw.githubusercontent.com/RahulSahOfficial/testimonials_grid_section/5532c958b7d3c9b910a216b198fdd21c73112d84/images/image-daniel.jpg" alt="">
        </div>
        <div class="detbox">
          <p class="name">Daniel Clifford</p>
          <p class="designation">Coffee Enthusiast</p>
        </div>
      </div>
      <div class="review">
        <h4>"A Culinary Symphony The Gourmet Palette"</h4>
      <p>“Indulge in the refined artistry of culinary delights at The Gourmet Palette, where each dish is a meticulously orchestrated
         symphony of flavors. From the avant-garde appetizers to the sublime desserts, the chef's innovative approach transforms traditional
          ingredients into a gastronomic masterpiece. The harmonious fusion of taste, texture, and presentation, coupled with the attentive
           staff and elegant ambiance, ensures that every visit to The Gourmet Palette is a symphony for the senses, leaving patrons with a lingering 
           appreciation for culinary excellence. ”</p>
      </div>
    </div>
    <!-- div2 -->
    <div class="div2 eachdiv">
      <div class="userdetails">
        <div class="imgbox">
          <img src="https://raw.githubusercontent.com/RahulSahOfficial/testimonials_grid_section/5532c958b7d3c9b910a216b198fdd21c73112d84/images/image-jonathan.jpg" alt="">
        </div>
        <div class="detbox">
          <p class="name">Jonathan Walters</p>
          <p class="designation">Coffee Enthusiast</p>
        </div>
      </div>
      <div class="review">
        <h4>"Tranquil Tea Haven: A Serene Escape in the City"</h4>
      <p>“ Step into Tranquil Tea Haven and experience a peaceful retreat amidst the urban chaos. The minimalist decor and soothing ambiance create an inviting atmosphere ”</p>
      </div>
    </div>
    <!-- div3 -->
    <div class="div3 eachdiv">
      <div class="userdetails">
        <div class="imgbox">
          <img src="https://raw.githubusercontent.com/RahulSahOfficial/testimonials_grid_section/5532c958b7d3c9b910a216b198fdd21c73112d84/images/image-kira.jpg" alt="">
        </div>
        <div class="detbox">
          <p class="name dark">Kira Whittle</p>
          <p class="designation dark">Coffee Enthusiast</p>
        </div>
      </div>
      <div class="review dark">
        <h4>"Urban Bites: A Culinary Adventure Unleashed"</h4>
        <p>“ Embark on a culinary odyssey at Urban Bites, where the menu is a thrilling adventure of bold and unexpected flavors. The fusion of diverse cuisines and imaginative ingredients transforms each dish into a gastronomic exploration. The visually stunning presentations and the chefs' audacious creativity make Urban Bites a haven for those who crave a dining experience that transcends the ordinary, inviting patrons to savor the excitement of culinary boundaries pushed to their limits. ”</p>
      </div>
    </div>
    <!-- div4 -->
    <div class="div4 eachdiv">
      <div class="userdetails">
        <div class="imgbox">
          <img src="https://raw.githubusercontent.com/RahulSahOfficial/testimonials_grid_section/5532c958b7d3c9b910a216b198fdd21c73112d84/images/image-jeanette.jpg" alt="">
        </div>
        <div class="detbox">
          <p class="name">Jeanette Harmon</p>
          <p class="designation">Coffee Enthusiast</p>
        </div>
      </div>
      <div class="review">
        <h4>"Cozy Corner Cafe: A Home Away From Home"</h4>
      <p>“ Find comfort and familiarity at Cozy Corner Cafe, a charming establishment that feels like a cherished home away from home. ”</p>
      </div>
    </div>
    <!-- div5 -->
    <div class="div5 eachdiv">
      <div class="userdetails">
        <div class="imgbox">
          <img src="https://raw.githubusercontent.com/RahulSahOfficial/testimonials_grid_section/5532c958b7d3c9b910a216b198fdd21c73112d84/images/image-patrick.jpg" alt="">
        </div>
        <div class="detbox">
          <p class="name">Patrick Abrams</p>
          <p class="designation">Coffee Enthusiast</p>
        </div>
      </div>
      <div class="review">
        <h4>"Artistic Elegance at Gallery Gastronomy"</h4>
      <p>“Immerse yourself in the intersection of culinary excellence and visual artistry at Gallery Gastronomy, where each dish is a masterpiece on a plate. The meticulous fusion of flavors, textures, and presentation creates an unparalleled dining experience that stimulates both the palate and the senses. The sophisticated ambiance, reminiscent of an upscale art gallery, enhances the overall aesthetic appeal, making Gallery Gastronomy a destination for those who appreciate the artful marriage of exquisite cuisine and visual elegance.
        ”</p>
      </div>
    </div>
  </div>
</div>






<!--testimonials------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->




<!--contact------------------------------------------------------------------------------------------>
  

<!--contact  end------------------------------------------------------------------------------------------>





<!--blogs------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


  
<section  style="display: none;" id="gallery">

  <div class = "gallery-head">
    <h2 style="margin-top: 2rem;">Blogs</h2>
    
  </div>


  <div class="container">
    
  <div class="container mt-5 mb-5">
    <div class="row">
    <?php
        // Replace these with your actual database connection details
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "beantocup";

        // Create a database connection
        $your_db_connection = mysqli_connect($host, $username, $password, $database);

        // Check the connection
        if (!$your_db_connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch data from the "newsandevents" table
        $query = "SELECT NewsID, Header,Time, Date, Body, Image FROM shopnews";
        $result = mysqli_query($your_db_connection, $query);

        // Check if the query was successful
        if ($result) { 
            // Fetch data row by row
            while ($row = mysqli_fetch_assoc($result)) {
                $header = $row['Header'];
                $time = $row['Time'];
                $date = $row['Date'];
                $body = $row['Body'];
                $image = $row['Image'];

                // Display data in Bootstrap cards
                echo '<div class="col-md-4 mb-4 newscard">';
                echo '<div class="card h-100 border rounded shadow-sm d-flex flex-column align-items-stretch">';
                echo '<img src="uploads/' . $image . '" class="card-img-top img-fluid" style="height: 200px;" alt="Card Image">';
                echo '<div class="card-body mt-0 flex-grow-1">';
                echo '<div class="d-flex justify-content-between">';
                echo '<p class="card-text"><small class="text-muted">' . date('F j, Y', strtotime($date)) . ' | ' . date('g:i A', strtotime($time)) . '</small></p>';
                echo '</div>';
                echo '<h5 class="card-title">' . $header . '</h5>';
                $trimmed_body = strlen($body) > 90 ? substr($body, 0, 90) . '...' : $body;
                echo '<p class="card-text">' . $trimmed_body . '</p>';
                echo '</div>';
                echo '<div style="border:none;" class="card-footer text-center bg-transparent">';
                echo '<a href="#" class="read-more-btn btn btn" data-toggle="modal" data-target="#readMoreModal' . $row['NewsID'] . '">Read More  <i class="bi bi-arrow-right-square"></i></a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                
                // Rest of your code remains the same...
                
                // Modal for full text
                echo '<div class="modal fade newscard" id="readMoreModal' . $row['NewsID'] . '" tabindex="-1" role="dialog" aria-labelledby="readMoreModalLabel' . $row['NewsID'] . '" aria-hidden="true">';
                echo '<div class="modal-dialog" role="document">';
                echo '<div class="modal-content">';
                echo '<div style="background-color: #E48F45;" class="modal-header">';
                echo '<h5 style="color: #fff;" class="modal-title">' . $header . '</h5>';
                echo '<button style="background-color: #E48F45; color: #fff; border:none;" type="button" class="close" data-dismiss="modal" aria-label="Close">';
                echo '<span aria-hidden="true">&times;</span>';
                echo '</button>';
                echo '</div>';
                echo '<div class="modal-body">';
                echo '<img src="uploads/' . $image . '" class="card-img-top img-fluid" style="height: 200px;" alt="Card Image">';
                echo '<div>';
                echo '<p class="card-text mt-4"><small class="text-muted">' . date('F j, Y', strtotime($date)) . ' | ' . date('g:i A', strtotime($time)) . '</small></p>';
                echo '</div>';
                echo '<p class="lead">' . $body . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                

                
                
                

            }

            // Free result set
            mysqli_free_result($result);
        } else {
            // Handle the error if the query fails
            echo "Error: " . mysqli_error($your_db_connection);
        }

        // Close the database connection
        mysqli_close($your_db_connection);
    ?>

    </div>
</div>
    




  </div>
</section>


<!--blogs-------------------------------------------------------------------------------------------------->


<section style="display: none;" id="Contact">
  <h2 style="margin-top: 30px; text-align: center;">Contact</h2>
  <div class="contact-container bg-white custom-shadow mt-n6">
    <div class="form-container">
      <h3>Message Us</h3>
      <form action="Home.php" class="contact-form">
        <input type="text" name="Name" id="Name" placeholder="Your Name" required>
        <input type="email" name="Email" id="Email" placeholder="Enter Your Email..." required>
        <textarea name="Emailcon" id="Emailcon" cols="30" rows="10" placeholder="Write Message Here"></textarea>
        <input style="color: #fff;" type="submit" value="Send" class="send-button" id="messagesent">
      </form>
    </div>
    <!-- maps-->
    <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61774.573266469764!2d121.04906712167968!3d14.604155300000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b9e0aaae72f7%3A0x366ad7b41f98981e!2sLove%2C%20Coffee%20and%20Breakfast!5e0!3m2!1sen!2sph!4v1701085837788!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</section>

<script>
  $(document).ready(function () {
    $("#messagesent").click(function (e) {
      e.preventDefault();
      var Name = $("input[name='Name']").val();
      var Email = $("input[name='Email']").val();
      var Emailcon = $("textarea[name='Emailcon']").val();
      $.post("inserttdbs.php",
        {
          Name: Name,
          Email: Email,
          Emailcon: Emailcon
        },
        function (data, status) {
          Swal.fire({
            title: 'Success!',
            text: 'Message Sent Successfully',
            icon: 'success',
            confirmButtonText: 'Okay',
          });
          // Apply custom class for light theme
          $(".swal2-popup").addClass('light-theme');
        });
    });
  });
</script>








<style>
    .modal {
        animation: bounceIn 0.5s;
    }

    @keyframes bounceIn {
        from { transform: scale(0.5); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }
</style>




<!--footer section-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>
</html>