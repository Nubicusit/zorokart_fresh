@extends('includes.inc')
@section('content')
    <style>
    .product-list-container {
        padding-right: 15px;
        padding-left: 15px;
        max-width: 1600px;
        margin: 0 auto;
    }

    .filter-sidebar {
        background-color: #fff;
        padding: 1rem;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .filter-group {
        margin-bottom: 1.5rem;
    }

    .filter-title {
        font-weight: 600;
        margin-bottom: 0.75rem;
        color: #ff5b00;
        display: flex;
        justify-content: space-between;
        cursor: pointer;
    }

    .filter-content {
        display: none;
        padding: 0.5rem 0;
    }

    .filter-content.show {
        display: block;
    }

    .form-check-label {
            cursor: pointer;
            color: #333;
        }

        .form-check-input:checked {
            background-color: #ff5b00;
            border-color: #ff5b00;
        }

        .product-card {
            height: 100%;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            background: white;
        }

        .product-img {
            position: relative;
            padding-top: 100%;
            overflow: hidden;
            border-radius: 8px 8px 0 0;
        }

        .product-img img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .wishlist-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #fff;
            border: none;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1;
            cursor: pointer;
        }

        .btn-wishlist {
            outline: none;
        }

        .product-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #ff5b00;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 4px;
            font-size: 0.875rem;
        }

        .product-info {
            padding: 1rem;
        }

        .product-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .product-price {
            color: #ff5b00;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .original-price {
            color: #6c757d;
            text-decoration: line-through;
            margin-left: 0.5rem;
            font-size: 0.9rem;
        }

        .mobile-filters {
            display: none;
            background: #fff;
            padding: 15px;
            margin-bottom: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .mobile-quick-filters {
            padding: 10px 0;
            overflow-x: auto;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
            margin-bottom: 1rem;
            background: white;
            border-radius: 8px;
        }

        .quick-filter-btn {
            display: inline-block;
            padding: 8px 16px;
            margin-right: 10px;
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 20px;
            color: #495057;
            text-decoration: none;
            white-space: nowrap;
            transition: all 0.3s ease;
        }

        .quick-filter-btn.active {
            background: #ff5b00;
            color: white;
            border-color: #ff5b00;
        }

        .form-select {
            border-radius: 6px;
            border: 1px solid #dee2e6;
            padding: 0.5rem;
            cursor: pointer;
        }

        .form-select:focus {
            border-color: #ff5b00;
            box-shadow: 0 0 0 0.2rem rgba(255, 91, 0, 0.25);
        }

        @media (max-width: 991px) {
            .mobile-filters {
                display: block;
            }

            .mobile-quick-filters {
                display: block;
            }

            .filter-sidebar {
                display: none;
            }

            .product-list-container {
                padding-top: 1rem;
            }
        }
    </style>

    <div class="container-fluid product-list-container py-4">
        <!-- Mobile Filters -->
        <div class="mobile-filters">
            <div class="row g-2">
                <div class="col-6">
                    <select class="form-select">
                        <option selected>Filter by Price</option>
                        <option>Under ₹500</option>
                        <option>₹500 - ₹1000</option>
                        <option>₹1000 - ₹2000</option>
                        <option>Over ₹2000</option>
                    </select>
                </div>
                <div class="col-6">
                    <select class="form-select">
                        <option selected>Sort by</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Newest First</option>
                        <option>Popular</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Mobile Quick Filters -->
        <div class="mobile-quick-filters">
            <a href="#" class="quick-filter-btn active">Top Rated</a>
            <a href="#" class="quick-filter-btn">Best Sellers</a>
            <a href="#" class="quick-filter-btn">New Arrivals</a>
            <a href="#" class="quick-filter-btn">On Sale</a>
            <a href="#" class="quick-filter-btn">Featured</a>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">All Products</h4>
            <div class="d-flex gap-3 align-items-center">
                <select class="form-select" style="width: auto;">
                    <option>Sort by: Featured</option>
                    <option>Price: Low to High</option>
                    <option>Newest First</option>
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Filter Sidebar -->
            <div class="col-lg-3 d-none d-lg-block">
                <div class="filter-sidebar">
                    <div class="filter-group">
                        <div class="filter-title" onclick="toggleFilter(this)">
                            Price Range
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="filter-content">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="price1">
                                <label class="form-check-label" for="price1">Under ₹500</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="price2">
                                <label class="form-check-label" for="price2">₹500 - ₹1000</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="price3">
                                <label class="form-check-label" for="price3">₹1000 - ₹2000</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="price4">
                                <label class="form-check-label" for="price4">Over ₹2000</label>
                            </div>
                        </div>
                    </div>

                    <div class="filter-group">
                        <div class="filter-title" onclick="toggleFilter(this)">
                            Categories
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="filter-content">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="cat1">
                                <label class="form-check-label" for="cat1">Electronics</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="cat2">
                                <label class="form-check-label" for="cat2">Fashion</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="cat3">
                                <label class="form-check-label" for="cat3">Home & Living</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cat4">
                                <label class="form-check-label" for="cat4">Books</label>
                            </div>
                        </div>
                    </div>

                    <div class="filter-group">
                        <div class="filter-title" onclick="toggleFilter(this)">
                            Brand
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="filter-content">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="brand1">
                                <label class="form-check-label" for="brand1">Apple</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="brand2">
                                <label class="form-check-label" for="brand2">Samsung</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="brand3">
                                <label class="form-check-label" for="brand3">Sony</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="brand4">
                                <label class="form-check-label" for="brand4">Nike</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="col-lg-9">
                <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 g-4">
                    <!-- Product Card (repeat this for each product) -->
                    <div class="col mb-4">
                        <div class="product-card">
                            <div class="product-img">
                                <img src="{{asset('img/top deals/H.webp')}}" alt="product">
                                <button class="wishlist-btn btn-wishlist">
                                    <i class="far fa-heart"></i>
                                </button>
                                <span class="product-badge">20% OFF</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-title">Wireless Bluetooth Headphones</h5>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="ms-2 text-muted">(24)</span>
                                </div>
                                <div>
                                    <span class="product-price">$79.99</span>
                                    <span class="original-price">$99.99</span>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="col mb-4">
                        <div class="product-card">
                            <div class="product-img">
                                <img src="{{asset('img/top deals/H.webp')}}" alt="product">
                                <button class="wishlist-btn btn-wishlist">
                                    <i class="far fa-heart"></i>
                                </button>
                                <span class="product-badge">20% OFF</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-title">Wireless Bluetooth Headphones</h5>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="ms-2 text-muted">(24)</span>
                                </div>
                                <div>
                                    <span class="product-price">$79.99</span>
                                    <span class="original-price">$99.99</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="product-card">
                            <div class="product-img">
                                <img src="{{asset('img/top deals/H.webp')}}" alt="product">
                                <button class="wishlist-btn btn-wishlist">
                                    <i class="far fa-heart"></i>
                                </button>
                                <span class="product-badge">20% OFF</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-title">Wireless Bluetooth Headphones</h5>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="ms-2 text-muted">(24)</span>
                                </div>
                                <div>
                                    <span class="product-price">$79.99</span>
                                    <span class="original-price">$99.99</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="product-card">
                            <div class="product-img">
                                <img src="{{asset('img/top deals/H.webp')}}" alt="product">
                                <button class="wishlist-btn btn-wishlist">
                                    <i class="far fa-heart"></i>
                                </button>
                                <span class="product-badge">20% OFF</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-title">Wireless Bluetooth Headphones</h5>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="ms-2 text-muted">(24)</span>
                                </div>
                                <div>
                                    <span class="product-price">$79.99</span>
                                    <span class="original-price">$99.99</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="product-card">
                            <div class="product-img">
                                <img src="{{asset('img/top deals/H.webp')}}" alt="product">
                                <button class="wishlist-btn btn-wishlist">
                                    <i class="far fa-heart"></i>
                                </button>
                                <span class="product-badge">20% OFF</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-title">Wireless Bluetooth Headphones</h5>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="ms-2 text-muted">(24)</span>
                                </div>
                                <div>
                                    <span class="product-price">$79.99</span>
                                    <span class="original-price">$99.99</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-4">
                        <div class="product-card">
                            <div class="product-img">
                                <img src="{{asset('img/top deals/H.webp')}}" alt="product">
                                <button class="wishlist-btn btn-wishlist">
                                    <i class="far fa-heart"></i>
                                </button>
                                <span class="product-badge">20% OFF</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-title">Wireless Bluetooth Headphones</h5>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="ms-2 text-muted">(24)</span>
                                </div>
                                <div>
                                    <span class="product-price">$79.99</span>
                                    <span class="original-price">$99.99</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-4">
                        <div class="product-card">
                            <div class="product-img">
                                <img src="{{asset('img/top deals/H.webp')}}" alt="product">
                                <button class="wishlist-btn btn-wishlist">
                                    <i class="far fa-heart"></i>
                                </button>
                                <span class="product-badge">20% OFF</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-title">Wireless Bluetooth Headphones</h5>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="ms-2 text-muted">(24)</span>
                                </div>
                                <div>
                                    <span class="product-price">$79.99</span>
                                    <span class="original-price">$99.99</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-4">
                        <div class="product-card">
                            <div class="product-img">
                                <img src="{{asset('img/top deals/H.webp')}}" alt="product">
                                <button class="wishlist-btn btn-wishlist">
                                    <i class="far fa-heart"></i>
                                </button>
                                <span class="product-badge">20% OFF</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-title">Wireless Bluetooth Headphones</h5>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="ms-2 text-muted">(24)</span>
                                </div>
                                <div>
                                    <span class="product-price">$79.99</span>
                                    <span class="original-price">$99.99</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-4">
                        <div class="product-card">
                            <div class="product-img">
                                <img src="{{asset('img/top deals/H.webp')}}" alt="product">
                                <button class="wishlist-btn btn-wishlist">
                                    <i class="far fa-heart"></i>
                                </button>
                                <span class="product-badge">20% OFF</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-title">Wireless Bluetooth Headphones</h5>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="ms-2 text-muted">(24)</span>
                                </div>
                                <div>
                                    <span class="product-price">$79.99</span>
                                    <span class="original-price">$99.99</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Repeat product cards as needed -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle filter content
        function toggleFilter(element) {
            const content = element.nextElementSibling;
            element.classList.toggle('collapsed');
            content.classList.toggle('show');
        }

        // Mobile quick filter buttons
        document.querySelectorAll('.quick-filter-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                document.querySelectorAll('.quick-filter-btn').forEach(b =>
                    b.classList.remove('active'));
                btn.classList.add('active');
            });
        });

        // Wishlist button toggle
        document.querySelectorAll('.wishlist-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const icon = this.querySelector('i');
                icon.classList.toggle('far');
                icon.classList.toggle('fas');
                icon.classList.toggle('text-danger');
            });
        });
    </script>
@endsection