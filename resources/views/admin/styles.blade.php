<style>
    :root {
        --sidebar-width: 250px;
        --sidebar-width-collapsed: 70px;
    }
    
    body {
        overflow-x: hidden;
        background-color: #f8f9fa;
    }

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
            color: #002162;
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
            color:#002162;
        }
        
        .nav-link.active {
            background: #e7f1ff;
            color: #002162;
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

        breadcrumb {
        background-color: #fff;
        padding: 1rem;
        border-radius: 0.75rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
    }

    .breadcrumb-item a {
        color: #6c757d;
        text-decoration: none;
    }

    .breadcrumb-item a:hover {
        color: #0d6efd;
    }

    .breadcrumb-item.active {
        color: #495057;
        font-weight: 500;
    }

    .breadcrumb-item + .breadcrumb-item::before {
        content: ">";
        color: #6c757d;
    }

        .card {
        border-radius: 0.75rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.04);
        border: none;
    }

    .table {
        margin-bottom: 0;
    }

    .table thead th {
        background-color: #f8f9fa;
        border-bottom: 2px solid #dee2e6;
        color: #495057;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.875rem;
    }

    .table tbody td {
        vertical-align: middle;
        color: #495057;
        font-size: 0.875rem;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
    }

    .modal-content {
        border-radius: 0.75rem;
        border: none;
    }

    .modal-header {
        border-bottom: 1px solid #dee2e6;
        background-color: #f8f9fa;
        border-radius: 0.75rem 0.75rem 0 0;
    }

    .modal-footer {
        border-top: 1px solid #dee2e6;
        background-color: #f8f9fa;
        border-radius: 0 0 0.75rem 0.75rem;
    }

    .form-label {
        font-weight: 500;
        color: #495057;
    }

    .form-control {
        border-radius: 0.5rem;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.1);
    }
</style>