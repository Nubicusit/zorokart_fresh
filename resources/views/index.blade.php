<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZoroKart </title>
    <script src="https://kit.fontawesome.com/29d1847fa7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<style>
    
</style>
<body>
    <nav class="navbar navbar-light navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{asset('zerokart/home/Assets/Img/logo-01.svg')}}" alt="" width="120" height="50" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active text-white" aria-current="page" ><i class="p-0 bi-geo-alt"></i>&nbsp;Deliver to India</a>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            all
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                            <li><button class="dropdown-item" type="button">Category 1</button></li>
                            <li><button class="dropdown-item" type="button">Category 2</button></li>
                        </ul>
                    </div>
                    <form class="d-flex">
                        <input class="form-control me-2 custom-search" type="search" aria-label="Search">
                        <button class="btn text-white" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle text-white" type="button" id="dropdownLang" data-bs-toggle="dropdown" aria-expanded="false">
                            lang
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownLang">
                            <li><button class="dropdown-item" type="button">English</button></li>
                            <li><button class="dropdown-item" type="button">Hindi</button></li>
                        </ul>
                    </div>
                     <div class="dropdown">
                        <button class="btn dropdown-toggle text-white" type="button" id="dropdownLog" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-circle-user fa-xl" style="color: #ffffff;"></i>&nbsp;Login
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownLog">
                            <li><button class="dropdown-item" type="button">Login</button></li>
                            <li><button class="dropdown-item" type="button">Register</button></li>
                        </ul>
                    </div>
                    <a class="nav-link  text-white" aria-current="page" href="#"><i class="fa-solid fa-cart-shopping fa-xl" style="color: #ffffff;"></i>&nbsp;Cart</a>
                    &nbsp;
                    <a class="nav-link  text-white" aria-current="page" href="#"><i class="fa-solid fa-shop fa-xl" style="color: #ffffff;"></i>&nbsp; Become a Seller</a>
                </div>
            <div>
        </div>
    </nav>
     <!-- Category items section starts -->
<div class="container-fluid my-4 px-0">
  <button id="scroll-left" class="scroll-btn">⬅</button>
  <div class="scroll-container" id="scroll-container">
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Women's"><p>Women's</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Men's"><p>Men's</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Kids"><p>Kids</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Newborn"><p>Newborn</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Groceries"><p>Groceries</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Beauty & Personal Care"><p>Beauty & Personal Care</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Footwear"><p>Footwear</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Watches"><p>Watches</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Accessories"><p>Accessories</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Electronics"><p>Electronics</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Appliances"><p>Appliances</p></div>
  </div>
  <button id="scroll-right" class="scroll-btn">➡</button>
</div>
<!-- Category items section ends -->

<!-- Main carousel section starts -->
<div class="container-fluid px-0 my-4">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 img-fluid" src="{{asset('images/banners/2024112014501280px-Sunflower_from_Silesia2.jpg')}}" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 img-fluid" src="{{asset('images/banners/2024112014501280px-Sunflower_from_Silesia2.jpg')}}" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 img-fluid" src="{{asset('images/banners/202411201449isometric-ab-testing-comparison-concept-split-testing-web-page-vector-id1141235861-1.jpg')}}" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<!-- Main carousel section ends -->

<!-- Offers and discounts heading starts -->
<div class="container my-4">
<h3>
  Avail Best Offers & Discounts
  <br>
  <small class="text-body-secondary"><a href="#">All Offers</a></small>
</h3>
</div>
<!-- Offers and discounts heading ends -->

<!-- Offers and discounts section starts -->
<div class="container my-2">
  <div class="row">
    @for ($i=1; $i <= 6; $i++)
      <div class="col-6 col-sm-4 col-md-2 mb-4">
        <div class="card border">
          <img class="card-img-top img-fluid" src="https://via.placeholder.com/100" alt="Card image cap">
        </div>
      </div>
    @endfor
  </div>
</div>

<!-- Offers and discounts section ends -->

<!-- top fashion deals starts -->
<!-- top fashion deals starts -->
<div class="container my-4 fashion-container">
  <div class="row">
    <!-- Left Column: Offers or Categories -->
    <div class="col-md-4 col-sm-12 mb-4">
      <div class="sidebar">
        <h3>Fashion Top Deals</h3>
        <div class="row justify-content-center">
          <!-- Row 1 -->
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="https://via.placeholder.com/150" alt="Men's Jackets" class="img-fluid">
            </div>
          </div>
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="https://via.placeholder.com/150" alt="Men's Sweaters" class="img-fluid">
            </div>
          </div>

          <!-- Row 2 -->
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="https://via.placeholder.com/150" alt="Women's Jackets" class="img-fluid">
            </div>
          </div>
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="https://via.placeholder.com/150" alt="Women's Sweaters" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Column: Main Banner -->
    <div class="col-md-8 col-sm-12">
      <div class="fashionadd-banner">
        <img class="fashionadd-banner-img img-fluid" src="https://via.placeholder.com/600x300" alt="Fashion">
        <div class="fashionadd-banner-text">
          <h2>Fashion Items</h2>
          <p>Latest Collection, Best Brands</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Top Deals section starts -->
<div class="container my-4">
<h3>
  Top Deals
  <br>
  <!-- <small class="text-body-secondary"><a href="#">All Offers</a></small> -->
</h3>
</div>
<div class="container my-2">
  <div class="row">
    @for ($i=1; $i <= 6; $i++)
      <div class="col-6 col-sm-4 col-md-2 mb-4">
        <div class="card border">
          <img class="card-img-top img-fluid" src="https://via.placeholder.com/100" alt="Card image cap">
        </div>
      </div>
    @endfor
  </div>
</div>
<!-- Top Deals section ends -->
 <!--Add -->
 <div class="container py-5">
        <div class="row">
            <!-- First Image -->
            <div class="col-md-6 col-sm-12 image-container">
                <img src="https://via.placeholder.com/860x350" alt="Image 1" class="img-fluid">
            </div>
            <!-- Second Image -->
            <div class="col-md-6 col-sm-12 image-container">
                <img src="https://via.placeholder.com/860x350" alt="Image 2" class="img-fluid">
            </div>
        </div>
    </div>
<!-- Pic your styles section starts -->
<div class="container my-4">
<h3>
  Pic Your Styles
  <br>
  <!-- <small class="text-body-secondary"><a href="#">All Offers</a></small> -->
</h3>
</div>
<div class="container my-2">
  <div class="row">
    @for ($i=1; $i <= 6; $i++)
      <div class="col-6 col-sm-4 col-md-2 mb-4">
        <div class="card border">
          <img class="card-img-top img-fluid" src="https://via.placeholder.com/100" alt="Card image cap">
        </div>
      </div>
    @endfor
  </div>
</div>
<!-- Pic your styles section ends -->
<!-- Top Deals on TV & Appliances starts -->
<div class="container my-4 fashion-container">
  <div class="row">
    <!-- Left Column: Offers or Categories -->
    <div class="col-md-4 col-sm-12 mb-4">
      <div class="sidebar">
        <h3>Top Deals on TV & Appliances</h3>
        <div class="row justify-content-center">
          <!-- Row 1 -->
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="https://via.placeholder.com/150" alt="Men's Jackets" class="img-fluid">
            </div>
          </div>
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="https://via.placeholder.com/150" alt="Men's Sweaters" class="img-fluid">
            </div>
          </div>

          <!-- Row 2 -->
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="https://via.placeholder.com/150" alt="Women's Jackets" class="img-fluid">
            </div>
          </div>
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="https://via.placeholder.com/150" alt="Women's Sweaters" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Column: Main Banner -->
    <div class="col-md-8 col-sm-12">
      <div class="fashionadd-banner">
        <img class="fashionadd-banner-img img-fluid" src="https://via.placeholder.com/600x300" alt="Fashion">
        <div class="fashionadd-banner-text">
          <h2>Fashion Items</h2>
          <p>Latest Collection, Best Brands</p>
        </div>
      </div>
    </div>
  </div>
</div>
     <footer class="text-center text-lg-start">
        <section class="footer-section">
            <div class="container footer-container">

                <div class="footer-column">
                    <h6>About</h6>
                    <hr>
                    <p><a href="#!">Contact Us About Us</a></p>
                    <p><a href="#!">Careers</a></p>
                    <p><a href="#!">Flipkart Stories Press Corporate information</a></p>
                </div>

                <div class="footer-column">
                    <h6>Group Companies</h6>
                    <hr>
                    <p><a href="#!">Myntra</a></p>
                    <p><a href="#!">Cleartrip</a></p>
                    <p><a href="#!">Shopsy</a></p>
                </div>

                <div class="footer-column">
                    <h6>Help</h6>
                    <hr>
                    <p><a href="#!">Payments</a></p>
                    <p><a href="#!">Shipping</a></p>
                    <p><a href="#!">Cancellation &amp; Returns</a></p>
                    <p><a href="#!">FAQ</a></p>
                </div>

                <div class="footer-column">
                    <h6>Consumer Policy</h6>
                    <hr>
                    <p><a href="#!">Cancellation &amp; Returns</a></p>
                    <p><a href="#!">Terms Of Use</a></p>
                    <p><a href="#!">Security</a></p>
                    <p><a href="#!">Privacy</a></p>
                    <p><a href="#!">Sitemap</a></p>
                    <p><a href="#!">Grievance Redressal EPR Compliance</a></p>
                </div>

                <div class="footer-column">
                    <h6>Registered Office Address</h6>
                    <hr>
                    <p><i class="fa-home fas"></i> Flipkart Internet Private Limited, Buildings Alyssa, Begonia &amp;
                        Cieve
                        Embassy Tech Village, Outer Ring Road, Devarabeesananalli Village, Bengaluru, 560103, Karnataka,
                        India</p>
                    <p><i class="fa-envelope fas"></i> CIN: U51100KA2012PTC066107</p>
                    <p><i class="fa-phone fas"></i> 044-4561478</p>
                    <p><i class="fa-print fas"></i> 044-67415800</p>
                </div>

            </div>
        </section>

        <div class="bottom-links">
            <a href="#!">Become a Seller</a>
            <a href="#!">Advertise</a>
            <a href="#!">Gift Cards</a>
            <a href="#!">Help Center</a>
            <span>© 2007-2024 this.com</span>
        </div>
    </footer>
    <script src="{{asset('zerokart/home/script.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>