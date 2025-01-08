<div class="sidebar">
    <div class="logo mb-4">
        <a href="#">
            <img src="{{ asset('zorologo.svg') }}" alt="Zorokart Admin Logo" class="img-fluid" />
        </a>
    </div>
    
    <nav class="nav flex-column">
        <a href="/admin" class="nav-link active">
            <i class="fas fa-home me-2"></i> Dashboard
        </a>

        <a class="nav-link submenu-toggle" data-target="productSubmenu">
            <i class="fas fa-box me-2"></i> Product
            <i class="fas fa-chevron-down float-end mt-1"></i>
        </a>
        <ul id="productSubmenu" class="submenu">
            <li><a href="#" class="nav-link">Add Product</a></li>
            <li><a href="#" class="nav-link">Product List</a></li>
        </ul>

        <a href="/category" class="nav-link submenu-toggle" data-target="categorySubmenu">
            <i class="fas fa-th-large me-2"></i> Category
        </a>

        <a href="/subcategory" class="nav-link submenu-toggle" data-target="subcategorySubmenu">
            <i class="fas fa-th-list me-2"></i> Sub Category
        </a>

        <a class="nav-link submenu-toggle" data-target="masterSubmenu">
            <i class="fas fa-database me-2"></i> Master
            <i class="fas fa-chevron-down float-end mt-1"></i>
        </a>
        <ul id="masterSubmenu" class="submenu">
            <li><a href="#" class="nav-link">Add Master</a></li>
            <li><a href="#" class="nav-link">Master List</a></li>
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