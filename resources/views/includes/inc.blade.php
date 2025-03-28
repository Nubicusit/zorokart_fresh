<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZoroKart Home Page</title>
    <script src="https://kit.fontawesome.com/29d1847fa7.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon2.svg') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<style>
    /* navbar starts */
    
    .mob-img{
        width: 155px;
    }

    .bi-x-lg::before{
        content: "\f659";
    color: #ff5b00;
    outline: none;
    border: none;
    }
    

    .sidebar-menu {
        position: fixed;
        top: 0;
        right: -100%;
        width: 300px;
        max-width: 100%;
        height: 100%;
        background-color: white;
        transition: right 0.3s ease-in-out;
        z-index: 1050;
        display: flex;
        flex-direction: column;
    }

    .sidebar-menu.active {
        right: 0;
    }

    .sidebar-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1040;
        display: none;
    }

    .sidebar-overlay.active {
        display: block;
    }

  .navbar-toggler-icon {
    background-image: none !important; 
    width: 30px; 
    height: 3px; 
    background-color: #ff5b00; 
    display: block;
    position: relative;
}

.navbar-toggler-icon::before,
.navbar-toggler-icon::after {
    content: "";
    width: 30px;
    height: 3px;
    background-color: #ff5b00;
    position: absolute;
    left: 0;
}

.navbar-toggler-icon::before {
    top: -8px; 
}

.navbar-toggler-icon::after {
    top: 8px; 
}




    /* Navigation Styles */
    .nav {
        margin-top: 60px;
    }

    .menu-nav {
        overflow-y: auto;
        flex-grow: 1;
    }

    .nav-link {
        color: black;
        font-size: 16px;
        padding: 12px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .nav-link:hover {
        background-color: #ff5b00;
        color: black;
  
    }

    .nav-link i {
        width: 20px;
        text-align: center;
    }

    /* Dropdown Styles */
    .dropdown-menu {
        background-color: white;
        border: none;
        border-radius: 0;
        margin-top: 0;
        padding: 0;
    }

    .dropdown-item {
        color: #ff5b00;
        padding: 10px 20px 10px 50px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .dropdown-item:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: #ff5b00;
    }


    /* navbar ends */
    .searchbar {
        margin-bottom: auto;
        margin-top: auto;
        height: 40px;
        background-color: white;
        border-radius: 10px;
        border: 1px solid #ff5b00;
        padding: 10px;
        display: flex;
        align-items: center;
        width: 100%;
        max-width: 100%;
    }

    .search_input {
        border: none;
        outline: none;
        background: none;
        color: black;
        width: 100%;
        margin-left: 10px;
        font-size: 16px;
    }

    .search_input::placeholder {
        color: black;
    }

    .search_icon {
        height: 40px;
        width: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #000000;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .search_icon:hover {
        background-color: #616575;
        color: white;
    }

    /* Ensure proper alignment on mobile */
    .container {
        padding: 0 15px;
    }
</style>

<!-- Navbar Starts -->
<!-- Desktop Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <a class="navbar-brand" href="#">
        <img alt="Zorokart logo" class="d-inline-block align-top" height="50" src="{{ asset('img/logo-01.svg') }}"
            width="50" />
    </a>
    <div class="navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-map-marker-alt"></i>
                        Pincode
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/products" role="button">
                        Products
                    </a>
                    <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                    </div> -->
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input  class="form-control mr-sm-2" placeholder="Search" />
            </form>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="langDropdown" role="button">
                        Lang
                    </a>
                    <div class="dropdown-menu" aria-labelledby="langDropdown">
                        <a class="dropdown-item" href="#">English</a>
                        <a class="dropdown-item" href="#">Hindi</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button">
                        <i class="fas fa-user-circle"></i>
                        Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="loginDropdown">
                        <a class="dropdown-item" href="{{ route('login') }}">Sign In</a>
                        <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.cart') }}">
                        <i class="fas fa-shopping-cart"></i>
                        Cart
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register-vendor') }}">
                        <i class="fas fa-store"></i>
                        Become a Seller
                    </a>
                </li>
            </ul>
        </div>
</nav>


<!-- Mobile Navbar -->
<nav class="navbar d-lg-none mob-navbar p-1"> 
    <div class="container-fluid align-items-center p-0">
        <!-- Logo -->
        <a class="navbar-brand p-0" href="/"> <!-- Added p-0 -->
            <img src="{{ asset('img/navbar/zorologo.svg') }}" alt="Logo" width="120" height="50"
                class="d-inline-block align-text-top mob-img">
        </a>

        <!-- Mobile Menu Toggle -->
        <button class="navbar-toggler p-0 px-2 ms-auto" type="button" id="sidebarToggle"> <!-- Added p-0 -->
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<!-- Sidebar Menu -->
<div class="sidebar-overlay d-lg-none" id="sidebarOverlay"></div>
<div class="sidebar-menu d-lg-none" id="sidebarMenu">
    <!-- <button class="close-btn" id="closeSidebar" aria-label="Close menu">&times;</button> -->
    <div class="sidebar-content">
        <!-- Menu Links -->
        <nav class="menu-nav">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-geo-alt"></i>Deliver to India
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('products') }}" role="button">
                        Products
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="collapse"
                        aria-expanded="false">
                        <i class="bi bi-translate"></i>Language
                    </a>
                    <ul class="dropdown-menu w-100"> <!-- Added w-100 for full width -->
                        <li><a class="dropdown-item" href="#">English</a></li>
                        <li><a class="dropdown-item" href="#">Hindi</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button">
                        <i class="fas fa-user-circle"></i>
                        Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="loginDropdown">
                        <a class="dropdown-item" href="{{ route('login') }}">Sign In</a>
                        <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.cart') }}">
                        <i class="fas fa-shopping-cart"></i>
                        Cart
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register-vendor') }}">
                        <i class="fas fa-store"></i>
                        Become a Seller
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</div>

<!-- Search Bar -->
<div class="container d-lg-none mt-2 h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="searchbar">
            <input class="search_input" type="text" name="" placeholder="Search...">
            <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
        </div>
    </div>
</div>



<!-- Bottom Navbar -->
<div class="footer-navbar d-lg-none fixed-bottom">
    <div class="toolbar toolbar-bottom-md">
        <div class="toolbar-inner">
            <a href="#" class="link">
                <i class="bi bi-house"></i>
                <small>Home</small>
            </a>
            <a href="{{ route('products') }}" class="link">
                <i class="bi bi-list"></i>
                <small>Products</small>
            </a>
            <a href="{{ route('products.cart') }}" class="link">
                <i class="bi bi-cart"></i>
                <small>Cart</small>
            </a>
            <a href="{{ route('products.wishlist') }}" class="link">
                <i class="fa-regular fa-heart"></i>
                <small>Wishlist</small>
            </a>
            <a href="{{ route('products.profile') }}" class="link">
                <i class="bi bi-person"></i>
                <small>Profile</small>
            </a>
        </div>
    </div>
</div>



<!-- Navbar Ends  -->
@yield('content')


</div>
<!-- Footer -->
<footer class="footer-body">
    <div class="container">
        <!-- Content in Columns -->
        <div class="row justify-content-center">
            <!-- Column 1: Description -->
            <div class="col-12 col-md-4 text-center text-md-start mb-4 mb-md-0">
                <p class="footer-description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum repellat quaerat
                    voluptatibus placeat nam, commodi optio pariatur est quia magnam.
                </p>
            </div>

            <!-- Column 2: Links -->
            <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
                <div class="row footer-links">
                    <div class="col-6">
                        <div class="link-column">
                            <h5>Quick Links</h5>
                            <a href="{{ route('products.cart') }}">Cart</a>
                            <a href="{{ route('products.wishlist') }}">Wishlist</a>
                            <a href="{{ route('products.orders') }}">Orders</a>
                            <a href="#">FAQ</a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="link-column">
                            <h5>Resources</h5>
                            <a href="#">Blog</a>
                            <a href="#">Documentation</a>
                            <a href="#">Support</a>
                            <a href="#">Privacy Policy</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Column 3: Social Icons -->
            <div class="col-12 col-md-4 text-center">
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-google"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>
        </div>

        <!-- Copyright and Payment Icons -->
        <div class="row footer-bottom align-items-center mt-4">
            <div class="col-12 col-md-6 copyright">
                <p>© copyright all right reserved 2025 ZoroKart Designed and Developed by Nubicus</p>
            </div>
            <div class="col-12 col-md-6">
                <div class="payment-icons">
                    <img src="{{ asset('./img/svg/payment/PAYMENT-01.svg') }}" alt="Payment 1">
                    <img src="{{ asset('./img/svg/payment/PAYMENT-02.svg') }}" alt="Payment 2">
                    <img src="{{ asset('./img/svg/payment/PAYMENT-03.svg') }}" alt="Payment 3">
                    <img src="{{ asset('./img/svg/payment/PAYMENT-04.svg') }}" alt="Payment 4">
                    <img src="{{ asset('./img/svg/payment/PAYMENT-05.svg') }}" alt="Payment 5">
                    <img src="{{ asset('./img/svg/payment/PAYMENT-06.svg') }}" alt="Payment 6">
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Ends -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get DOM elements
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarMenu = document.getElementById('sidebarMenu');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const closeSidebarBtn = document.getElementById('closeSidebar');

        // Function to toggle sidebar visibility
        function toggleSidebar() {
            const isActive = sidebarMenu.classList.contains('active');
            if (isActive) {
                closeSidebar();
            } else {
                openSidebar();
            }
        }
        // Function to open sidebar
        function openSidebar() {
            sidebarMenu.classList.add('active');
            sidebarOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
            if (sidebarToggle) {
                sidebarToggle.innerHTML = '<i class="bi bi-x-lg"></i>'; // Update toggle button icon
            }
        }

        // Function to close sidebar
        function closeSidebar() {
            sidebarMenu.classList.remove('active');
            sidebarOverlay.classList.remove('active');
            document.body.style.overflow = ''; // Re-enable scrolling
            if (sidebarToggle) {
                sidebarToggle.innerHTML = '<span class="navbar-toggler-icon"></span>'; // Reset toggle button icon
            }
        }

        // Event Listeners for sidebar toggle and close
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', toggleSidebar);
        }

        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', closeSidebar);
        }

        if (closeSidebarBtn) {
            closeSidebarBtn.addEventListener('click', closeSidebar);
        }

        // Close on escape key
        // Handle dropdowns in the sidebar
        const dropdownToggles = document.querySelectorAll('.sidebar-menu .dropdown-toggle');

        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function (e) {
                e.preventDefault();

                // Get the parent dropdown item and the dropdown menu
                const parent = this.closest('.nav-item');
                const dropdownMenu = parent.querySelector('.dropdown-menu');
                const isExpanded = dropdownMenu.classList.contains('show');

                // Close other open dropdowns first
                dropdownToggles.forEach(otherToggle => {
                    if (otherToggle !== toggle) {
                        const otherParent = otherToggle.closest('.nav-item');
                        const otherMenu = otherParent.querySelector('.dropdown-menu');
                        if (otherMenu && otherMenu.classList.contains('show')) {
                            otherMenu.classList.remove('show');
                            otherToggle.setAttribute('aria-expanded', 'false');
                        }
                    }
                });

                // Toggle the clicked dropdown
                dropdownMenu.classList.toggle('show');
                this.setAttribute('aria-expanded', !isExpanded);
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function (event) {
            if (!event.target.closest('.dropdown')) {
                dropdownToggles.forEach(toggle => {
                    const parent = toggle.closest('.nav-item');
                    const dropdownMenu = parent.querySelector('.dropdown-menu');
                    if (dropdownMenu && dropdownMenu.classList.contains('show')) {
                        dropdownMenu.classList.remove('show');
                        toggle.setAttribute('aria-expanded', 'false');
                    }
                });
            }
        });
    });
</script>
<script src="{{asset('zerokart/home/script.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>