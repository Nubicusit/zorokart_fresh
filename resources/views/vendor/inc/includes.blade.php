<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Vendor Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css')}}">
</head>

<body>
<div class="sidebar">
    <div class="logo mb-4">
        <a href="/vendor/dashboard">
            <img src="{{ asset('zorologo.svg') }}" alt="Zorokart Logo" class="img-fluid" />
        </a>
    </div>
    
    <nav class="nav flex-column">

        <a href="/vendor/dashboard" class="nav-link active">
            <i class="fas fa-home me-2"></i> Dashboard
        </a>

        <a href="/" class="nav-link submenu-toggle">
            <i class="fa fa-globe"></i> Go to Website
        </a>

        <a href="{{ route('vendor.productList') }}" class="nav-link submenu-toggle" >
            <i class="fas fa-box me-2"></i> Products Management
        </a>

        <a href="{{ route('vendor.offerList') }}" class="nav-link submenu-toggle" >
            <i class="fas fa-box me-2"></i> Offers Management
        </a>

        <a href="#" class="nav-link submenu-toggle" >
            <i class="fas fa-ad"></i> Adds Management
        </a>

        <a href="{{ route('vendor.enquiryList') }}" class="nav-link">
            <i class="fa fa-question-circle"></i> Enquiries
        </a>

        <a href="#" class="nav-link">
            <i class="fa fa-star"></i> User Ratings
        </a>

        <a href="#" class="nav-link">
            <i class="fa fa-comment"></i> User Comments
        </a>

        <a class="nav-link submenu-toggle" data-target="productSubmenu">
            <i class="fa fa-plus"></i> Request
            <i class="fas fa-chevron-down float-end mt-1"></i>
        </a>
        <ul id="productSubmenu" class="submenu">
            <li><a href="{{ route('vendor.categoryRequest') }}" class="nav-link">Category</a></li>
            <li><a href="{{ route('vendor.subCategoryRequest') }}" class="nav-link">Sub Category</a></li>
        </ul>

        <a href="#" class="nav-link">
            <i class="fas fa-cogs me-2"></i> Settings
        </a>

    </nav>
</div>

<button class="sidebar-toggle">
    <i class="fas fa-bars"></i>
</button>

<div class="sidebar-overlay"></div>


@yield('content')

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Sidebar Toggle Functionality
    document.querySelector('.sidebar-toggle').addEventListener('click', function() {
        document.querySelector('.sidebar').classList.toggle('active');
        document.querySelector('.sidebar-overlay').classList.toggle('active');
    });

    // Close sidebar when clicking overlay
    document.querySelector('.sidebar-overlay').addEventListener('click', function() {
        document.querySelector('.sidebar').classList.remove('active');
        document.querySelector('.sidebar-overlay').classList.remove('active');
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 992) {
            document.querySelector('.sidebar').classList.remove('active');
            document.querySelector('.sidebar-overlay').classList.remove('active');
        }
    });

    // Toggle submenu
    document.querySelectorAll('.submenu-toggle').forEach(toggle => {
        toggle.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const submenu = document.getElementById(targetId);
            submenu.classList.toggle('show');
            
           
            const chevron = this.querySelector('.fa-chevron-down');
            chevron.style.transform = submenu.classList.contains('show') ? 'rotate(180deg)' : 'rotate(0)';
        });
    });
</script>
</html>