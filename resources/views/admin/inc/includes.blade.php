<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css')}}">
</head>

<body>
<div class="sidebar">
    <div class="logo mb-4">
        <a href="/admin/dashboard">
            <img src="{{ asset('zorologo.svg') }}" alt="Zorokart Admin Logo" class="img-fluid" />
        </a>
    </div>
    
    <nav class="nav flex-column">
        <a href="{{ route('admin.dashboard') }}" class="nav-link active">
            <i class="fas fa-home me-2"></i> Dashboard
        </a>
        
        <a href="{{ route('admin.vendor_verification') }}" class="nav-link submenu-toggle" data-target="categorySubmenu">
            <i class="fas fa-user me-2"></i> Vendor Verification
        </a>

        <a href="{{ route('admin.category') }}" class="nav-link submenu-toggle" data-target="categorySubmenu">
            <i class="fas fa-th-large me-2"></i> Category
        </a>

        <a href="{{ route('admin.subcategory') }}" class="nav-link submenu-toggle" data-target="subcategorySubmenu">
            <i class="fas fa-th-list me-2"></i> Sub Category
        </a>

        <a class="nav-link submenu-toggle" data-target="productSubmenu">
            <i class="fas fa-box me-2"></i> Product
            <i class="fas fa-chevron-down float-end mt-1"></i>
        </a>
        <ul id="productSubmenu" class="submenu">
            <!--<li><a href="{{ route('admin.addoffer') }}" class="nav-link">Add Offers</a></li>-->
            <!--<li><a href="{{ route('admin.addproduct') }}" class="nav-link">Add Product By Admin</a></li>-->
            <li><a href="{{ route('admin.view-products') }}" class="nav-link">Product List</a></li>
        </ul>

        <a class="nav-link submenu-toggle" data-target="masterSubmenu">
            <i class="fas fa-database me-2"></i> Master
            <i class="fas fa-chevron-down float-end mt-1"></i>
        </a>
        <ul id="masterSubmenu" class="submenu">
            <li><a href="{{ route('admin.banner') }}" class="nav-link">Add Banner</a></li>
            <li><a href="{{ route('admin.enquires') }}" class="nav-link">Enquiries</a></li>
            <li><a href="{{ route('admin.categoryRequests') }}" class="nav-link">Category Requests</a></li>
            <li><a href="{{ route('admin.subCategoryRequests') }}" class="nav-link">Sub Category Requests</a></li>
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