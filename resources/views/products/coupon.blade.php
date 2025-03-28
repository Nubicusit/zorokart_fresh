@extends('includes.inc')
@section('content')

    <style>
        .coupon-container {
            padding-right: 15px;
            padding-left: 15px;
            max-width: 1600px;
            margin: 0 auto;
        }

        .coupon-badge {
            background-color: #ff5b00;
            color: white;
            text-align: center;
            padding: 8px 16px;
            border-radius: 4px 0 0 4px;
        }

        .coupon-badge span {
            font-size: 14px;
            font-weight: bold;
        }

        /* Custom CSS for spacing and text */
        .coupon-content {
            padding-left: 16px;
        }

        .coupon-content h2 {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .coupon-content .coupon-title {
            font-size: 18px;
            font-weight: bold;
        }

        .coupon-content .coupon-save {
            color: #28a745;
            font-weight: 600;
            font-size: 14px;
        }

        .coupon-content .coupon-description {
            color: #6c757d;
            font-size: 14px;
        }

        .coupon-content .coupon-more {
            color: #ff5b00;
            font-weight: bold;
            font-size: 14px;
            margin-top: 8px;
        }

        /* Custom CSS for buttons */
        .coupon-apply-btn {
            color: #ff5b00;
            font-weight: bold;
            background: none;
            border: none;
            cursor: pointer;
        }

        .coupon-apply-btn:hover {
            text-decoration: underline;
        }

        /* Custom CSS for cards */
        .coupon-card {
            margin-bottom: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.2s;
        }

    </style>

    <div class="container coupon-container mt-4">
        <!-- Best Coupon Section -->
        <h2 class="text-center mb-4">Best Coupons</h2>
        <div class="row">
            <!-- Coupon 1 -->
            <div class="col-md-4">
                <div class="coupon-card bg-white rounded-lg shadow-sm p-4">
                    <div class="d-flex align-items-center">
                        <div class="coupon-badge">
                            <span>30% OFF</span>
                        </div>
                        <div class="flex-grow-1 coupon-content">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="coupon-title">JUMBO</span>
                                <button class="coupon-apply-btn">APPLY</button>
                            </div>
                            <p class="coupon-save">Save ₹125 on this order!</p>
                            <p class="coupon-description">Use code JUMBO & get 30% off on orders above ₹400. Maximum
                                discount ₹150.</p>
                            <p class="coupon-more">+ MORE</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Coupon 2 -->
            <div class="col-md-4">
                <div class="coupon-card bg-white rounded-lg shadow-sm p-4">
                    <div class="d-flex align-items-center">
                        <div class="coupon-badge">
                            <span>50% OFF</span>
                        </div>
                        <div class="flex-grow-1 coupon-content">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="coupon-title">HALFOFF</span>
                                <button class="coupon-apply-btn">APPLY</button>
                            </div>
                            <p class="coupon-save">Save ₹200 on this order!</p>
                            <p class="coupon-description">Use code HALFOFF & get 50% off on orders above ₹500. Maximum
                                discount ₹200.</p>
                            <p class="coupon-more">+ MORE</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Coupon 3 -->
            <div class="col-md-4">
                <div class="coupon-card bg-white rounded-lg shadow-sm p-4">
                    <div class="d-flex align-items-center">
                        <div class="coupon-badge">
                            <span>20% OFF</span>
                        </div>
                        <div class="flex-grow-1 coupon-content">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="coupon-title">SAVE20</span>
                                <button class="coupon-apply-btn">APPLY</button>
                            </div>
                            <p class="coupon-save">Save ₹80 on this order!</p>
                            <p class="coupon-description">Use code SAVE20 & get 20% off on orders above ₹300. Maximum
                                discount ₹100.</p>
                            <p class="coupon-more">+ MORE</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- More Offers Section -->
        <h2 class="text-center mt-5 mb-4">More Offers</h2>
        <div class="row">
            <!-- Coupon 4 -->
            <div class="col-md-4">
                <div class="coupon-card bg-white rounded-lg shadow-sm p-4">
                    <div class="d-flex align-items-center">
                        <div class="coupon-badge">
                            <span>60% OFF</span>
                        </div>
                        <div class="flex-grow-1 coupon-content">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="coupon-title">TRYNEW</span>
                                <button class="coupon-apply-btn">APPLY</button>
                            </div>
                            <p class="coupon-save">Save ₹120 on this order!</p>
                            <p class="coupon-description">Use code TRYNEW & get 60% off on orders above ₹149. Maximum
                                discount ₹120.</p>
                            <p class="coupon-more">+ MORE</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Coupon 5 -->
            <div class="col-md-4">
                <div class="coupon-card bg-white rounded-lg shadow-sm p-4">
                    <div class="d-flex align-items-center">
                        <div class="coupon-badge">
                            <span>40% OFF</span>
                        </div>
                        <div class="flex-grow-1 coupon-content">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="coupon-title">FORTYOFF</span>
                                <button class="coupon-apply-btn">APPLY</button>
                            </div>
                            <p class="coupon-save">Save ₹160 on this order!</p>
                            <p class="coupon-description">Use code FORTYOFF & get 40% off on orders above ₹400. Maximum
                                discount ₹200.</p>
                            <p class="coupon-more">+ MORE</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Coupon 6 -->
            <div class="col-md-4">
                <div class="coupon-card bg-white rounded-lg shadow-sm p-4">
                    <div class="d-flex align-items-center">
                        <div class="coupon-badge">
                            <span>25% OFF</span>
                        </div>
                        <div class="flex-grow-1 coupon-content">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="coupon-title">QUARTER</span>
                                <button class="coupon-apply-btn">APPLY</button>
                            </div>
                            <p class="coupon-save">Save ₹75 on this order!</p>
                            <p class="coupon-description">Use code QUARTER & get 25% off on orders above ₹300. Maximum
                                discount ₹100.</p>
                            <p class="coupon-more">+ MORE</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection