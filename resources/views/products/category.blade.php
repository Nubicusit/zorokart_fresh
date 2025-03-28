@extends('includes.inc')
@section('content')
    <style>
        /* Navbar styles */
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: #ff5b00 !important;
            font-size: 1.8rem;
        }

        .nav-link {
            color: #000000 !important;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-link:hover,
        .dropdown-item:hover {
            color: #ff5b00 !important;
        }

        .search-box {
            border: 2px solid #ff5b00;
            border-radius: 50px;
            overflow: hidden;
        }

        .search-input {
            border: none;
            box-shadow: none !important;
        }

        .search-button {
            background-color: #ff5b00;
            color: #ffffff;
            border: none;
        }

        /* Banner styles */
        .banner {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/api/placeholder/1200/400') center/cover no-repeat;
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #ffffff;
            text-align: center;
            margin-bottom: 2rem;
        }

        .banner-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        /* Filter sidebar styles */
        .filters-section {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .filters-section h4 {
            color: #000000;
            font-weight: 600;
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        .filter-header {
            color: #ff5b00;
            font-weight: 600;
            font-size: 1rem;
            margin: 15px 0 10px;
        }

        .form-check-input:checked {
            background-color: #ff5b00;
            border-color: #ff5b00;
        }

        .price-range {
            margin-top: 10px;
            padding: 0 5px;
        }

        /* Product card styles */
        .product-card {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            height: 200px;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }

        .product-title {
            font-weight: 600;
            margin-top: 10px;
            color: #000000;
            font-size: 1rem;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .product-price {
            font-weight: 700;
            font-size: 1.2rem;
            color: #ff5b00;
            margin: 5px 0;
        }

        .product-rating {
            margin-bottom: 10px;
            color: #ff5b00;
        }

        .add-to-cart {
            background-color: #ff5b00;
            color: #ffffff;
            border: none;
            width: 100%;
            padding: 10px;
            font-weight: 600;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .add-to-cart:hover {
            background-color: #e55000;
            color: #ffffff;
        }

        .pagination .page-link {
            color: #000000;
        }

        .pagination .page-item.active .page-link {
            background-color: #ff5b00;
            border-color: #ff5b00;
        }

        .pagination .page-link:hover {
            color: #ff5b00;
        }

        .sort-dropdown {
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .sort-dropdown button {
            background-color: #ffffff;
            color: #000000;
            border: none;
        }

        .sort-dropdown .dropdown-item.active {
            background-color: #ff5b00;
        }
    </style>
    <div class="container">
        <div class="row">
          <!-- Filter Sidebar -->
          <div class="col-lg-3">
            <div class="filters-section">
              <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Filters</h4>
                <button class="btn btn-sm text-primary p-0">Clear All</button>
              </div>
              <hr>

              <!-- Categories Filter -->
              <div class="filter-group">
                <h5 class="filter-header">Category</h5>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="smartphones" checked>
                  <label class="form-check-label" for="smartphones">
                    Smartphones
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="laptops">
                  <label class="form-check-label" for="laptops">
                    Laptops
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="tablets">
                  <label class="form-check-label" for="tablets">
                    Tablets
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="smartwatches">
                  <label class="form-check-label" for="smartwatches">
                    Smartwatches
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="accessories">
                  <label class="form-check-label" for="accessories">
                    Accessories
                  </label>
                </div>
              </div>

              <!-- Brand Filter -->
              <div class="filter-group mt-3">
                <h5 class="filter-header">Brand</h5>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="apple">
                  <label class="form-check-label" for="apple">
                    Apple
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="samsung">
                  <label class="form-check-label" for="samsung">
                    Samsung
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="sony">
                  <label class="form-check-label" for="sony">
                    Sony
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="google">
                  <label class="form-check-label" for="google">
                    Google
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="dell">
                  <label class="form-check-label" for="dell">
                    Dell
                  </label>
                </div>
              </div>

              <!-- Price Range Filter -->
              <div class="filter-group mt-3">
                <h5 class="filter-header">Price Range</h5>
                <div class="price-range">
                  <input type="range" class="form-range" min="0" max="2000" step="100" id="priceRange">
                  <div class="d-flex justify-content-between">
                    <span>$0</span>
                    <span>$2000</span>
                  </div>
                  <div class="mt-2 d-flex">
                    <div class="input-group input-group-sm me-2">
                      <span class="input-group-text">$</span>
                      <input type="number" class="form-control" placeholder="Min" min="0">
                    </div>
                    <div class="input-group input-group-sm">
                      <span class="input-group-text">$</span>
                      <input type="number" class="form-control" placeholder="Max" min="0">
                    </div>
                  </div>
                </div>
              </div>

              <!-- Rating Filter -->
              <div class="filter-group mt-3">
                <h5 class="filter-header">Rating</h5>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="rating4">
                  <label class="form-check-label" for="rating4">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star text-warning"></i> & Up
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="rating3">
                  <label class="form-check-label" for="rating3">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star text-warning"></i>
                    <i class="bi bi-star text-warning"></i> & Up
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="rating2">
                  <label class="form-check-label" for="rating2">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star text-warning"></i>
                    <i class="bi bi-star text-warning"></i>
                    <i class="bi bi-star text-warning"></i> & Up
                  </label>
                </div>
              </div>

              <!-- Availability Filter -->
              <div class="filter-group mt-3">
                <h5 class="filter-header">Availability</h5>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="inStock">
                  <label class="form-check-label" for="inStock">
                    In Stock
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="outOfStock">
                  <label class="form-check-label" for="outOfStock">
                    Out of Stock
                  </label>
                </div>
              </div>

              <!-- Apply Filters Button -->
              <div class="mt-4">
                <button class="btn w-100" style="background-color: #ff5b00; color: #ffffff;">Apply Filters</button>
              </div>
            </div>
          </div>

          <!-- Products Grid -->
          <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <div>
                <h4 class="mb-0">Smartphones (24)</h4>
              </div>
              <div class="d-flex align-items-center">
                <span class="me-2">Sort by:</span>
                <div class="dropdown sort-dropdown">
                  <button class="btn dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Featured
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                    <li><a class="dropdown-item active" href="#">Featured</a></li>
                    <li><a class="dropdown-item" href="#">Price: Low to High</a></li>
                    <li><a class="dropdown-item" href="#">Price: High to Low</a></li>
                    <li><a class="dropdown-item" href="#">Customer Rating</a></li>
                    <li><a class="dropdown-item" href="#">Newest</a></li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
              <!-- Product Card 1 -->
              <div class="col">
                <div class="product-card">
                  <div class="product-image">
                    <img src="/api/placeholder/300/300" alt="Smartphone 1">
                  </div>
                  <div class="p-3">
                    <h5 class="product-title">Premium Smartphone 12 Pro - 256GB - 5G Enabled</h5>
                    <div class="product-price">$999.99</div>
                    <div class="product-rating">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-half"></i>
                      <span class="text-dark ms-1">4.5 (120)</span>
                    </div>
                    <div class="text-success mb-3"><i class="bi bi-check-circle-fill"></i> In Stock</div>
                    <button class="btn add-to-cart">Add to Cart</button>
                  </div>
                </div>
              </div>

              <!-- Product Card 2 -->
              <div class="col">
                <div class="product-card">
                  <div class="product-image">
                    <img src="/api/placeholder/300/300" alt="Smartphone 2">
                  </div>
                  <div class="p-3">
                    <h5 class="product-title">Galaxy S22 Ultra - 512GB - Phantom Black</h5>
                    <div class="product-price">$1199.99</div>
                    <div class="product-rating">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star"></i>
                      <span class="text-dark ms-1">4.0 (85)</span>
                    </div>
                    <div class="text-success mb-3"><i class="bi bi-check-circle-fill"></i> In Stock</div>
                    <button class="btn add-to-cart">Add to Cart</button>
                  </div>
                </div>
              </div>

              <!-- Product Card 3 -->
              <div class="col">
                <div class="product-card">
                  <div class="product-image">
                    <img src="/api/placeholder/300/300" alt="Smartphone 3">
                  </div>
                  <div class="p-3">
                    <h5 class="product-title">Pixel 6 Pro - 128GB - Sorta Sunny</h5>
                    <div class="product-price">$899.99</div>
                    <div class="product-rating">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <span class="text-dark ms-1">5.0 (56)</span>
                    </div>
                    <div class="text-success mb-3"><i class="bi bi-check-circle-fill"></i> In Stock</div>
                    <button class="btn add-to-cart">Add to Cart</button>
                  </div>
                </div>
              </div>

              <!-- Product Card 4 -->
              <div class="col">
                <div class="product-card">
                  <div class="product-image">
                    <img src="/api/placeholder/300/300" alt="Smartphone 4">
                  </div>
                  <div class="p-3">
                    <h5 class="product-title">OnePlus 10 Pro - 256GB - Pine Green</h5>
                    <div class="product-price">$849.99</div>
                    <div class="product-rating">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-half"></i>
                      <i class="bi bi-star"></i>
                      <span class="text-dark ms-1">3.5 (42)</span>
                    </div>
                    <div class="text-success mb-3"><i class="bi bi-check-circle-fill"></i> In Stock</div>
                    <button class="btn add-to-cart">Add to Cart</button>
                  </div>
                </div>
              </div>

              <!-- Product Card 5 -->
              <div class="col">
                <div class="product-card">
                  <div class="product-image">
                    <img src="/api/placeholder/300/300" alt="Smartphone 5">
                  </div>
                  <div class="p-3">
                    <h5 class="product-title">Budget Smartphone A52 - 64GB - Blue</h5>
                    <div class="product-price">$349.99</div>
                    <div class="product-rating">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star"></i>
                      <i class="bi bi-star"></i>
                      <span class="text-dark ms-1">3.0 (98)</span>
                    </div>
                    <div class="text-success mb-3"><i class="bi bi-check-circle-fill"></i> In Stock</div>
                    <button class="btn add-to-cart">Add to Cart</button>
                  </div>
                </div>
              </div>

              <!-- Product Card 6 -->
              <div class="col">
                <div class="product-card">
                  <div class="product-image">
                    <img src="/api/placeholder/300/300" alt="Smartphone 6">
                  </div>
                  <div class="p-3">
                    <h5 class="product-title">Foldable Z Flip 4 - 128GB - Lavender</h5>
                    <div class="product-price">$999.99</div>
                    <div class="product-rating">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-half"></i>
                      <span class="text-dark ms-1">4.5 (28)</span>
                    </div>
                    <div class="text-danger mb-3"><i class="bi bi-x-circle-fill"></i> Out of Stock</div>
                    <button class="btn add-to-cart" disabled>Add to Cart</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation" class="mt-5">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="bi bi-chevron-left"></i></a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
@endsection