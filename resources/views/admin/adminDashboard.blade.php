<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 250px;
            --sidebar-width-collapsed: 70px;
        }
        
        body {
            overflow-x: hidden;
            background-color: #f8f9fa;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #fff;
            border-right: 1px solid #eee;
            padding: 1rem;
            transition: all 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
        }
        
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2rem;
            transition: all 0.3s ease;
            min-height: 100vh;
        }

        /* Sidebar Toggle */
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1001;
            background: #fff;
            border: 1px solid #eee;
            padding: 0.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            cursor: pointer;
        }

        .nav-link {
            color: #666;
            padding: 0.75rem 1rem;
            margin: 0.2rem 0;
            border-radius: 0.5rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            transition: all 0.2s ease;
        }
        
        .nav-link:hover {
            background: #f8f9fa;
            color: #0d6efd;
        }
        
        .nav-link.active {
            background: #e7f1ff;
            color: #0d6efd;
        }

        .submenu {
            list-style: none;
            padding-left: 2rem;
            margin: 0;
            display: none;
            transition: all 0.3s ease;
        }

        .submenu.show {
            display: block;
        }

        .submenu .nav-link {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
        }

        .submenu-toggle {
            cursor: pointer;
        }

        .submenu-toggle .fa-chevron-down {
            transition: transform 0.3s ease;
        }

        /* Stats and Charts */
        .stats-grid {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: repeat(4, 1fr);
            margin: 2rem 0;
            padding: 0 2rem;
        }

        .stat-card {
            background: #fff;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: transform 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-right: 1rem;
        }

        .chart-container {
            background: #fff;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            margin-bottom: 1.5rem;
        }

        /* Header Section */
        .header-section {
            background: #fff;
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .user-section i {
            font-size: 1.2rem;
            color: #666;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .user-section i:hover {
            color: #0d6efd;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e7f1ff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0d6efd;
        }

        /* Responsive Design */
        @media (max-width: 1400px) {
            .stats-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                padding: 0 1rem;
            }
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .sidebar-toggle {
                display: block;
            }

            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0,0,0,0.5);
                z-index: 999;
            }

            .sidebar-overlay.active {
                display: block;
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
                padding: 0;
            }
            
            .header-section {
                padding: 1rem;
            }
            
            .user-section {
                margin-top: 1rem;
            }

            .main-content {
                padding: 1rem;
            }
        }

        @media (max-width: 576px) {
            .stat-card {
                padding: 1rem;
            }
            
            .chart-container {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <button class="sidebar-toggle">
        <i class="fas fa-bars"></i>
    </button>

    <div class="sidebar-overlay"></div>

    <div class="sidebar">
        <div class="logo mb-4">
        <a href="#">
        <img src="{{ asset('zorologo.svg') }}" alt="Zorokart Admin Logo" class="img-fluid" />
    </a>
        </div>
        
        <nav class="nav flex-column">
            <a href="#" class="nav-link active">
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

            <a class="nav-link submenu-toggle" data-target="categorySubmenu">
                <i class="fas fa-th-large me-2"></i> Category
                <i class="fas fa-chevron-down float-end mt-1"></i>
            </a>
            <ul id="categorySubmenu" class="submenu">
                <li><a href="#" class="nav-link">Add Category</a></li>
                <li><a href="#" class="nav-link">Category List</a></li>
            </ul>

            <a class="nav-link submenu-toggle" data-target="subcategorySubmenu">
                <i class="fas fa-th-list me-2"></i> Sub Category
                <i class="fas fa-chevron-down float-end mt-1"></i>
            </a>
            <ul id="subcategorySubmenu" class="submenu">
                <li><a href="#" class="nav-link">Add Sub Category</a></li>
                <li><a href="#" class="nav-link">Sub Category List</a></li>
            </ul>

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

    <div class="main-content">
        <div class="header-section d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Welcome Admin</h2>
            <div class="user-section">
                <i class="fas fa-bell"></i>
                <i class="fas fa-cog"></i>
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <strong>Admin</strong>
                    <div class="text-muted small">Administrator</div>
                </div>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-primary-subtle text-primary">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">New Orders</h6>
                        <h3 class="mb-0">34,567</h3>
                        <small class="text-success">
                            <i class="fas fa-arrow-up"></i> 2.00% (30 days)
                        </small>
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-success-subtle text-success">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">Total Income</h6>
                        <h3 class="mb-0">$74,567</h3>
                        <small class="text-success">
                            <i class="fas fa-arrow-up"></i> 5.45% Increased
                        </small>
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-info-subtle text-info">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">Total Expense</h6>
                        <h3 class="mb-0">$24,567</h3>
                        <small class="text-danger">
                            <i class="fas fa-arrow-down"></i> 2.00% Expense
                        </small>
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-warning-subtle text-warning">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">New Users</h6>
                        <h3 class="mb-0">34,567</h3>
                        <small class="text-danger">
                            <i class="fas fa-arrow-down"></i> 25.00% Earning
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="chart-container">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h5 class="mb-1">Yearly Stats</h5>
                            <h3 class="mb-0">$245,479</h3>
                        </div>
                        <select class="form-select" style="width: auto;">
                            <option>Yearly</option>
                            <option>Monthly</option>
                            <option>Weekly</option>
                        </select>
                    </div>
                    <div style="height: 300px; background: #f8f9fa; border-radius: 8px;"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="chart-container h-100">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Sales/Revenue</h5>
                        <select class="form-select" style="width: auto;">
                            <option>Yearly</option>
                            <option>Monthly</option>
                            <option>Weekly</option>
                        </select>
                    </div>
                    <div style="height: 300px; background: #f8f9fa; border-radius: 8px;"></div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
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
                
                // Toggle chevron icon
                const chevron = this.querySelector('.fa-chevron-down');
                chevron.style.transform = submenu.classList.contains('show') ? 'rotate(180deg)' : 'rotate(0)';
            });
        });

        // Toggle sidebar on mobile
        document.querySelector('.sidebar-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar');
            const sidebarToggle = document.querySelector('.sidebar-toggle');
            
            if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                sidebar.classList.remove('show');
            }
        });
    </script>
</body>
</html>