@extends('includes.inc')
@section('content')
    <style>
        .orders-container {
            padding: 20px;
            max-width: 1600px;
            margin: 0 auto;
        }

        /* Sidebar Styles */
        .filters-sidebar {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            padding: 20px;
        }

        .filters-sidebar h2 {
            color: #ff5b00;
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .filters-sidebar .form-check {
            margin-bottom: 0.75rem;
        }

        .filters-sidebar .form-check-input:checked {
            background-color: #ff5b00;
            border-color: #ff5b00;
        }

        .filter-section {
            margin-bottom: 2rem;
        }

        .filter-section h3 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #333;
        }

        /* Search Bar */
        .search-container {
            margin-bottom: 1.5rem;
        }

        .search-container .form-control {
            border-radius: 6px;
            padding: 0.75rem 1rem;
            border: 1px solid #dee2e6;
        }

        .search-container .form-control:focus {
            border-color: #ff5b00;
            box-shadow: 0 0 0 0.2rem rgba(255, 91, 0, 0.25);
        }

        .search-btn {
            background-color: #ff5b00;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            color: white;
            transition: background-color 0.3s;
        }

        .search-btn:hover {
            background-color: #e65100;
        }

        /* Order Card */
        .order-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
            transition: box-shadow 0.3s;
        }

        .order-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .order-header {
            padding: 1rem;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .order-body {
            padding: 1rem;
        }

        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
        }

        .product-details {
            flex: 1;
            padding: 0 1rem;
        }

        .product-name {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.25rem;
        }

        .product-meta {
            color: #666;
            font-size: 0.9rem;
        }

        .product-price {
            color: #ff5b00;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .status-box {
            padding: 0.75rem;
            border-radius: 6px;
            margin: 1rem 0;
        }

        .status-delivered {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .status-cancelled {
            background-color: #ffebee;
            color: #c62828;
        }

        .status-refunded {
            background-color: #f3e5f5;
            color: #6a1b9a;
        }

        .action-link {
            color: #ff5b00;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .action-link:hover {
            color: #e65100;
        }

        .load-more-btn {
            background-color: #e9ecef;
            color: #495057;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 6px;
            transition: background-color 0.3s;
        }

        .load-more-btn:hover {
            background-color: #dee2e6;
        }

        @media (max-width: 768px) {
            .orders-container {
                padding: 10px;
            }

            .product-image {
                width: 60px;
                height: 60px;
            }

            .order-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .product-details {
                padding: 0.5rem 0;
            }
        }
    </style>

    <div class="orders-container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 mb-4">
                <div class="filters-sidebar">
                    <h2>Filters</h2>
                    <div class="filter-section">
                        <h3>ORDER STATUS</h3>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="onTheWay">
                            <label class="form-check-label" for="onTheWay">On the way</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="delivered">
                            <label class="form-check-label" for="delivered">Delivered</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="cancelled">
                            <label class="form-check-label" for="cancelled">Cancelled</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="returned">
                            <label class="form-check-label" for="returned">Returned</label>
                        </div>
                    </div>
                    <div class="filter-section">
                        <h3>ORDER TIME</h3>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="last30Days">
                            <label class="form-check-label" for="last30Days">Last 30 days</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="2023">
                            <label class="form-check-label" for="2023">2024</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="2022">
                            <label class="form-check-label" for="2022">2023</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="older">
                            <label class="form-check-label" for="older">Older</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                <!-- Search Bar -->
                <div class="search-container">
                    <div class="row">
                        <div class="col-sm-9 mb-3 mb-sm-0">
                            <input type="text" class="form-control" placeholder="Search your orders here">
                        </div>
                        <div class="col-sm-3">
                            <button class="search-btn w-100">Search Orders</button>
                        </div>
                    </div>
                </div>

                <!-- Orders List -->
                <div class="orders-list">
                    <!-- Order 1 -->
                    <div class="order-card">
                        <div class="order-body">
                            <div class="d-flex flex-wrap">
                                <img src="{{ asset('./img/products/whitered.jfif') }}" alt="Product" class="product-image">
                                <div class="product-details">
                                    <h4 class="product-name">Menka Women White & Red Printed Kurta</h4>
                                    <p class="product-meta">Color: White & Red, Size: L</p>
                                </div>
                                <div class="product-price">₹421</div>
                            </div>
                            <div class="status-box status-refunded">
                                <p class="mb-1"><strong>Refund Completed</strong> (Refund ID: 12203754554235930234)</p>
                                <small>The money was sent to your Bank Account linked with UPI ID ************u_01@oksbi
                                    on jan 03 2025, 12:47 PM</small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">You returned this order because you needed it in a larger
                                    size.</small>
                                <a href="#" class="action-link"><i class="fas fa-star"></i> Rate & Review Product</a>
                            </div>
                        </div>
                    </div>

                    <!-- Order 2 -->
                    <div class="order-card">
                        <div class="order-body">
                            <div class="d-flex flex-wrap">
                                <img src="{{ asset('./img/products/redkurti.webp') }}" alt="Product" class="product-image">
                                <div class="product-details">
                                    <h4 class="product-name">Anouk Paisley Printed Straight Kurta</h4>
                                    <p class="product-meta">Color: Red</p>
                                </div>
                                <div class="product-price">₹999</div>
                            </div>
                            <div class="status-box status-delivered">
                                <p class="mb-0">Delivered on Feb 07, 2025</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">Your item has been delivered</small>
                                <a href="#" class="action-link"><i class="fas fa-star"></i> Rate & Review Product</a>
                            </div>
                        </div>
                    </div>

                    <!-- Load More -->
                    <div class="text-center mt-4">
                        <button class="load-more-btn">No More Results To Display</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection