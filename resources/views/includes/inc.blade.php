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

    @yield('content')

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