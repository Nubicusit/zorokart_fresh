<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZoroKart Home Page</title>
    <script src="https://kit.fontawesome.com/29d1847fa7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<style>
    @media (max-width: 991px) {
    .navbar-nav {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }
    
    .navbar-nav .nav-link.active {
        order: 1; 
    }
}


.divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

       
        .h-custom {
            height: calc(100% - 73px);
        }

       
        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }

        .facebook-btn {
            background-color: #3b5998 !important; 
            transition: background 0.3s ease-in-out;
        }

        .facebook-btn:hover {
            background: linear-gradient(135deg, #3b5998 0%, #8b9dc3 100%) !important;
        }

        .google-btn {
            background-color: #db4437 !important;
            transition: background 0.3s ease-in-out;
        }

        .google-btn:hover {
            background: LINEAR-GRADIENT(-120DEG, #4285F4, #34A853, #FBBC05, #EA4335) !important; 
        }

        
        .btn-primary {
            background-color: #ff5c04 !important;
            border-color: #ff5c04 !important;
        }

        .btn-primary:hover {
            background-color: #e04c03 !important;
            border-color: #e04c03 !important;
        }

       
        .btn-floating {
            padding: 10px 15px;
            border-radius: 50%;
        }
</style>
<body>
<nav class="navbar navbar-light navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{asset('img/logo-01.svg')}}" alt="" width="120" height="50" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active text-white" aria-current="page" ><i class="p-0 bi-geo-alt"></i>&nbsp;Deliver to India</a>
                    <div class="dropdown ms-sm-negative-13">
                        <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            all
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                            <li><button class="dropdown-item" type="button"  onclick="window.location='{{ route('products') }}';">Category 2</button></li>
                            <li><button class="dropdown-item" type="button">Category 2</button></li>
                        </ul>
                    </div>
                    <form class="d-none d-lg-flex">
                        <input class="form-control me-2 custom-search" type="search" aria-label="Search">
                        <button class="btn text-white" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                    <div class="dropdown ms-sm-negative-13">
                        <button class="btn dropdown-toggle text-white" type="button" id="dropdownLang" data-bs-toggle="dropdown" aria-expanded="false">
                            lang
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownLang">
                            <li><button class="dropdown-item" type="button">English</button></li>
                            <li><button class="dropdown-item" type="button">Hindi</button></li>
                        </ul>
                    </div>
                     <div class="dropdown ms-sm-negative-13">
                        <button class="btn dropdown-toggle text-white" type="button" id="dropdownLog" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-circle-user fa-xl" style="color: #ffffff;"></i>&nbsp;Login
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownLog">
                            <li><a href="{{ url('/login') }}"><button class="dropdown-item" type="button">Login</button></a></li>
                            <li><a href="{{ url('/signup') }}"><button class="dropdown-item" type="button">Register</button></a></li>
                        </ul>
                    </div>
                    <a class="nav-link  text-white" aria-current="page" href="#"><i class="fa-solid fa-cart-shopping fa-xl" style="color: #ffffff;"></i>&nbsp;Cart</a>
                   
                    <a class="nav-link  text-white" aria-current="page" href="#"><i class="fa-solid fa-shop fa-xl" style="color: #ffffff;"></i>&nbsp; Become a Seller</a>
                </div>
            <div>
        </div>
    </nav>

    @yield('content')

   <!-- Footer -->
<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Company name
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>

<!-- Footer -->
    <script src="{{asset('zerokart/home/script.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>