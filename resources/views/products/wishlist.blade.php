@extends('includes.inc')
@section('content')
    <style>
        .wishlist-container {
            padding: 15px;
            max-width: 1600px;
            margin: 0 auto;
        }

        .product-card-wish {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
        }

        
        .product-image-wish {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }

        .product-title-wish {
            font-size: 1.1rem;
            font-weight: 600;
            color: #343a40;
            margin-bottom: 8px;
        }

        .product-stock {
            font-size: 0.9rem;
            font-weight: 600;
        }

        .product-stock.in-stock {
            color: #28a745;
        }

        .product-stock.out-of-stock {
            color: #dc3545;
        }

        .product-rating-wish {
            color: #ffc107;
            font-weight: 600;
        }

        .product-rating-wish .fa-star {
            color: #ffc107;
        }

        .product-rating-wish .review-count {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .product-price-wish {
            font-size: 1.2rem;
            font-weight: 600;
            color: #343a40;
        }

        .product-price-wish .original-price-wish {
            text-decoration: line-through;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .product-price-wish .discount {
            color: #28a745;
            font-size: 0.9rem;
        }

        .btn-add-to-cart,
        .btn-explore-similar {
            background-color: #ff5b00;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background-color 0.2s;
            width: 100%;
            margin-top: 10px;
        }

        .btn-add-to-cart:hover,
        .btn-explore-similar:hover {
            background-color: #e05200;
        }
    </style>

    <div class="container wishlist-container">
        <!-- Product List -->
        <div class="row">
            <!-- Item 1 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="product-card-wish p-3">
                    <div class="d-flex align-items-center">
                        <img src="https://storage.googleapis.com/a1aa/image/n7LTZloAY7RFiuFdUGP9YiNQNwaZTojk8a54ts3kuEI.jpg"
                            alt="JBL FLIP 3" class="product-image-wish">
                        <div class="ml-3 flex-grow-1">
                            <div class="product-stock in-stock">In Stock</div>
                            <div class="product-title-wish">JBL FLIP 3 Portable Bluetooth Speaker</div>
                            <div class="d-flex align-items-center mt-2">
                                <span class="product-rating-wish">4.0</span>
                                <i class="fas fa-star ml-1"></i>
                                <span class="review-count ml-2">(21)</span>
                            </div>
                            <div class="product-price-wish mt-2">
                                ₹9,975
                                <span class="original-price-wish">₹11,990</span>
                                <span class="discount">16% off</span>
                            </div>
                            <button class="btn-add-to-cart">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="product-card-wish p-3">
                    <div class="d-flex align-items-center">
                        <img src="https://storage.googleapis.com/a1aa/image/eiDyC_UJeNS7Q5jnpflWVtkPeV4PhbXYNBXEdDCAkdc.jpg"
                            alt="Chevron Screen Guard" class="product-image-wish">
                        <div class="ml-3 flex-grow-1">
                            <div class="product-stock out-of-stock">Out of Stock</div>
                            <div class="product-title-wish">Chevron Screen Guard for iPhone 6</div>
                            <div class="d-flex align-items-center mt-2">
                                <span class="product-rating-wish">4.5</span>
                                <i class="fas fa-star ml-1"></i>
                                <span class="review-count ml-2">(11)</span>
                            </div>
                            <div class="product-price-wish mt-2">
                                ₹399
                                <span class="original-price-wish">₹459</span>
                                <span class="discount">11% off</span>
                            </div>
                            <button class="btn-explore-similar">EXPLORE SIMILAR</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="product-card-wish p-3">
                    <div class="d-flex align-items-center">
                        <img src="https://storage.googleapis.com/a1aa/image/n7LTZloAY7RFiuFdUGP9YiNQNwaZTojk8a54ts3kuEI.jpg"
                            alt="JBL FLIP 3" class="product-image-wish">
                        <div class="ml-3 flex-grow-1">
                            <div class="product-stock in-stock">In Stock</div>
                            <div class="product-title-wish">JBL FLIP 3 Portable Bluetooth Speaker</div>
                            <div class="d-flex align-items-center mt-2">
                                <span class="product-rating-wish">4.0</span>
                                <i class="fas fa-star ml-1"></i>
                                <span class="review-count ml-2">(21)</span>
                            </div>
                            <div class="product-price-wish mt-2">
                                ₹9,975
                                <span class="original-price-wish">₹11,990</span>
                                <span class="discount">16% off</span>
                            </div>
                            <button class="btn-add-to-cart">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="product-card-wish p-3">
                    <div class="d-flex align-items-center">
                        <img src="https://storage.googleapis.com/a1aa/image/n7LTZloAY7RFiuFdUGP9YiNQNwaZTojk8a54ts3kuEI.jpg"
                            alt="JBL FLIP 3" class="product-image-wish">
                        <div class="ml-3 flex-grow-1">
                            <div class="product-stock in-stock">In Stock</div>
                            <div class="product-title-wish">JBL FLIP 3 Portable Bluetooth Speaker</div>
                            <div class="d-flex align-items-center mt-2">
                                <span class="product-rating-wish">4.0</span>
                                <i class="fas fa-star ml-1"></i>
                                <span class="review-count ml-2">(21)</span>
                            </div>
                            <div class="product-price-wish mt-2">
                                ₹9,975
                                <span class="original-price-wish">₹11,990</span>
                                <span class="discount">16% off</span>
                            </div>
                            <button class="btn-add-to-cart">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="product-card-wish p-3">
                    <div class="d-flex align-items-center">
                        <img src="https://storage.googleapis.com/a1aa/image/n7LTZloAY7RFiuFdUGP9YiNQNwaZTojk8a54ts3kuEI.jpg"
                            alt="JBL FLIP 3" class="product-image-wish">
                        <div class="ml-3 flex-grow-1">
                            <div class="product-stock in-stock">In Stock</div>
                            <div class="product-title-wish">JBL FLIP 3 Portable Bluetooth Speaker</div>
                            <div class="d-flex align-items-center mt-2">
                                <span class="product-rating-wish">4.0</span>
                                <i class="fas fa-star ml-1"></i>
                                <span class="review-count ml-2">(21)</span>
                            </div>
                            <div class="product-price-wish mt-2">
                                ₹9,975
                                <span class="original-price-wish">₹11,990</span>
                                <span class="discount">16% off</span>
                            </div>
                            <button class="btn-add-to-cart">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="product-card-wish p-3">
                    <div class="d-flex align-items-center">
                        <img src="https://storage.googleapis.com/a1aa/image/n7LTZloAY7RFiuFdUGP9YiNQNwaZTojk8a54ts3kuEI.jpg"
                            alt="JBL FLIP 3" class="product-image-wish">
                        <div class="ml-3 flex-grow-1">
                            <div class="product-stock in-stock">In Stock</div>
                            <div class="product-title-wish">JBL FLIP 3 Portable Bluetooth Speaker</div>
                            <div class="d-flex align-items-center mt-2">
                                <span class="product-rating-wish">4.0</span>
                                <i class="fas fa-star ml-1"></i>
                                <span class="review-count ml-2">(21)</span>
                            </div>
                            <div class="product-price-wish mt-2">
                                ₹9,975
                                <span class="original-price-wish">₹11,990</span>
                                <span class="discount">16% off</span>
                            </div>
                            <button class="btn-add-to-cart">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection