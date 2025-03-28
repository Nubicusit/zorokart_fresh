@extends('includes.inc')
@section('content')
    <style>
        :root {
            --primary-color: #ff5722;
            --secondary-color: #f5f5f5;
            --text-gray: #666;
            --border-color: #e0e0e0;
        }

        .cart-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1rem;
        }

        .cart-item {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .cart-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
        }

        .product-title {
            color: #333;
            font-size: 0.9rem;
            margin-bottom: 0.25rem;
        }

        .product-seller {
            color: var(--text-gray);
            font-size: 0.8rem;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin: 0.5rem 0;
        }

        .quantity-btn {
            border: 1px solid var(--border-color);
            background: white;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
        }

        .price {
            font-weight: bold;
            color: var(--primary-color);
        }

        .original-price {
            text-decoration: line-through;
            color: var(--text-gray);
            font-size: 0.9rem;
        }

        .discount {
            color: green;
            font-size: 0.8rem;
        }

        .summary-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 1rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            color: var(--text-gray);
        }

        .total-row {
            font-weight: bold;
            color: #333;
            font-size: 1.1rem;
            border-top: 1px solid var(--border-color);
            padding-top: 0.5rem;
            margin-top: 0.5rem;
        }

        .place-order-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            width: 100%;
            padding: 0.75rem;
            border-radius: 4px;
            font-weight: bold;
            margin-top: 1rem;
        }

        .savings-info {
            color: green;
            font-size: 0.9rem;
            text-align: center;
            margin-top: 1rem;
        }

        .quantity-btn:hover {
            color: #ff5b00;
        }

        .remove-btn {
                color: #b4b4b4;
                border: none;
                background: none;
            }

            .remove-btn:hover {
                color: #ff5b00;
            }
    </style>

    <div>
        <div class="cart-container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Cart Items -->
                    <div class="cart-item d-flex gap-3">
                        <img src="{{ asset('./img/products/aline.jfif') }}" alt="Women Print Kurta">
                        <div class="flex-grow-1 ml-4">
                            <div class="product-title">Biba Women Print-A-line Kurta</div>
                            <div class="product-seller">Seller: ROYAL ETHIC</div>
                            <div class="price">₹354 <span class="original-price">₹899</span></div>
                            <div class="discount">65% OFF</div>
                            <div class="quantity-controls">
                                <button class="quantity-btn">-</button>
                                <span>1</span>
                                <button class="quantity-btn">+</button>
                                <button class="remove-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="cart-item d-flex gap-3">
                        <img src="{{ asset('./img/products/fix.webp') }}" alt="Sunscreen">
                        <div class="flex-grow-1 ml-4">
                            <div class="product-title">Foderma Sunscreen - SPF 50+</div>
                            <div class="product-seller">Seller: FODERMA INDIA</div>
                            <div class="price">₹274 <span class="original-price">₹399</span></div>
                            <div class="discount">35% OFF</div>
                            <div class="quantity-controls">
                                <button class="quantity-btn">-</button>
                                <span>1</span>
                                <button class="quantity-btn">+</button>
                                <button class="remove-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="cart-item d-flex gap-3">
                        <img src="{{ asset('./img/products/fix.webp') }}" alt="Sunscreen">
                        <div class="flex-grow-1 ml-4">
                            <div class="product-title">Foderma Sunscreen - SPF 50+</div>
                            <div class="product-seller">Seller: FODERMA INDIA</div>
                            <div class="price">₹274 <span class="original-price">₹399</span></div>
                            <div class="discount">35% OFF</div>
                            <div class="quantity-controls">
                                <button class="quantity-btn">-</button>
                                <span>1</span>
                                <button class="quantity-btn">+</button>
                                <button class="remove-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="cart-item d-flex gap-3">
                        <img src="{{ asset('./img/products/fix.webp') }}" alt="Sunscreen">
                        <div class="flex-grow-1 ml-4">
                            <div class="product-title">Foderma Sunscreen - SPF 50+</div>
                            <div class="product-seller">Seller: FODERMA INDIA</div>
                            <div class="price">₹274 <span class="original-price">₹399</span></div>
                            <div class="discount">35% OFF</div>
                            <div class="quantity-controls">
                                <button class="quantity-btn">-</button>
                                <span>1</span>
                                <button class="quantity-btn">+</button>
                                <button class="remove-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="cart-item d-flex gap-3">
                        <img src="{{ asset('./img/products/fix.webp') }}" alt="Sunscreen">
                        <div class="flex-grow-1 ml-4">
                            <div class="product-title">Foderma Sunscreen - SPF 50+</div>
                            <div class="product-seller">Seller: FODERMA INDIA</div>
                            <div class="price">₹274 <span class="original-price">₹399</span></div>
                            <div class="discount">35% OFF</div>
                            <div class="quantity-controls">
                                <button class="quantity-btn">-</button>
                                <span>1</span>
                                <button class="quantity-btn">+</button>
                                <button class="remove-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="cart-item d-flex gap-3">
                        <img src="{{ asset('./img/products/fix.webp') }}" alt="Sunscreen">
                        <div class="flex-grow-1 ml-4">
                            <div class="product-title">Foderma Sunscreen - SPF 50+</div>
                            <div class="product-seller">Seller: FODERMA INDIA</div>
                            <div class="price">₹274 <span class="original-price">₹399</span></div>
                            <div class="discount">35% OFF</div>
                            <div class="quantity-controls">
                                <button class="quantity-btn">-</button>
                                <span>1</span>
                                <button class="quantity-btn">+</button>
                                <button class="remove-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>


                        </div>
                    </div>

                    <div class="cart-item d-flex gap-3">
                        <img src="{{ asset('./img/products/fix.webp') }}" alt="Sunscreen">
                        <div class="flex-grow-1 ml-4">
                            <div class="product-title">Foderma Sunscreen - SPF 50+</div>
                            <div class="product-seller">Seller: FODERMA INDIA</div>
                            <div class="price">₹274 <span class="original-price">₹399</span></div>
                            <div class="discount">35% OFF</div>
                            <div class="quantity-controls">
                                <button class="quantity-btn">-</button>
                                <span>1</span>
                                <button class="quantity-btn">+</button>
                                <button class="remove-btn">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Price Summary -->
                    <div class="summary-card">
                        <h5 class="mb-3">PRICE DETAILS</h5>
                        <div class="summary-row">
                            <span>Price (7 items)</span>
                            <span>₹6,450</span>
                        </div>
                        <div class="summary-row">
                            <span>Discount</span>
                            <span class="text-success">-₹4,429</span>
                        </div>
                        <div class="summary-row">
                            <span>Coupons for you</span>
                            <span class="text-success">-₹150</span>
                        </div>
                        <div class="summary-row">
                            <span>Platform Fee</span>
                            <span>₹3</span>
                        </div>
                        <div class="summary-row">
                            <span>Delivery Charges</span>
                            <span class="text-success">Free</span>
                        </div>
                        <div class="summary-row total-row">
                            <span>Total Amount</span>
                            <span>₹1,876</span>
                        </div>
                        <div class="savings-info">You will save ₹4,614 on this order</div>
                        <button class="place-order-btn">PLACE ORDER</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection