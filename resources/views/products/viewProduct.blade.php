@extends('includes.inc')
@section('content')
    <style>
        /* Core container styles */
        .product-each-container {
            padding: 15px;
            max-width: 1600px;
            margin: 0 auto;
            overflow-x: hidden;
        }

        /* Product image and gallery styles */
        .product-container {
            position: relative;
            width: 100%;
            max-width: 400px;
            height: 400px;
            overflow: hidden;
            border: 2px solid #ddd;
            border-radius: 10px;
            cursor: crosshair;
            margin: 0 auto;
        }

        .each-product-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .thumbnail {
            cursor: pointer;
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .thumbnail img {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            object-fit: cover;
            transition: opacity 0.3s ease;
            border: 2px solid transparent;
        }

        .thumbnail img:hover {
            opacity: 0.7;
        }

        .thumbnail img.active {
            border-color: #ff5b00;
            opacity: 0.7;
        }

        /* Product info styles */
        .product-info {
            padding: 20px;
        }

        .company-name {
            color: #ff5b00;
            font-weight: bold;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1rem;
        }

        .product-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .product-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        /* Price styles */
        .price-container {
            margin-bottom: 2rem;
        }

        .price-tag {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 0.5rem;
        }

        .current-price {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
        }

        .discount-badge {
            background-color: #fff2e5;
            color: #ff5b00;
            padding: 4px 8px;
            border-radius: 6px;
            font-weight: bold;
        }

        .original-price {
            color: #b4b4b4;
            text-decoration: line-through;
            font-size: 1rem;
        }

        /* Action buttons styles */
        .actions-container {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .quantity-selector {
            background-color: #f7f8fd;
            border-radius: 8px;
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-width: 150px;
            flex: 0 0 auto;
        }

        .quantity-selector button {
            border: none;
            background: none;
            color: #ff5b00;
            font-weight: bold;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0 10px;
            transition: opacity 0.3s ease;
        }

        .quantity-selector button:hover {
            opacity: 0.7;
        }

        .quantity-selector span {
            font-weight: bold;
            min-width: 30px;
            text-align: center;
        }

        .add-to-cart {
            background-color: #ff5b00;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 1rem 2rem;
            font-weight: bold;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .add-to-cart:hover {
            background-color: #e65100;
        }

        /* Comments section styles */
        .comment-section {
            margin-top: 60px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .comment-count {
            color: #666;
            font-size: 0.9rem;
        }

        .comment-input {
            width: 100%;
            padding: 15px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            resize: none;
            font-size: 0.95rem;
            margin-bottom: 1rem;
        }

        .comment-input:focus {
            outline: none;
            border-color: #ff5b00;
            box-shadow: 0 0 0 0.2rem rgba(255, 91, 0, 0.25);
        }

        .rating {
            color: #ffd700;
            font-size: 1.2rem;
        }

        .submit-btn {
            background-color: #ff5b00;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #e65100;
        }

        .comment-item {
            padding: 20px;
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
        }

        .comment-user {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .comment-date {
            margin-left: auto;
            color: #888;
            font-size: 0.9rem;
        }

        .comment-actions {
            display: flex;
            gap: 20px;
            margin-top: 15px;
        }

        .action-btn {
            border: none;
            background: none;
            color: #666;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 0;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .action-btn:hover {
            color: #ff5b00;
        }

        /* Zoom functionality styles */
        .zoom-lens {
            position: absolute;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.3);
            border: 2px solid #fff;
            pointer-events: none;
            display: none;
        }

        .zoom-result {
            position: absolute;
            top: 50%;
            left: 100%;
            transform: translateY(-50%);
            width: 500px;
            height: 500px;
            overflow: hidden;
            border: 2px solid #ddd;
            background-color: #fff;
            display: none;
            z-index: 1000;
        }

        .zoom-result img {
            position: absolute;
            width: 800px;
            height: 800px;
            object-fit: cover;
        }

        /* Responsive styles */
        @media (max-width: 1200px) {
            .product-title {
                font-size: 2.2rem;
            }

            .zoom-result {
                width: 400px;
                height: 400px;
            }
        }

        @media (max-width: 992px) {
            .product-container {
                max-width: 350px;
                height: 350px;
            }

            .zoom-result {
                display: none !important;
            }
        }

        @media (max-width: 768px) {
            .product-title {
                font-size: 1.8rem;
                margin-top: 1.5rem;
            }

            .product-container {
                max-width: 100%;
                height: 300px;
            }

            .thumbnail img {
                width: 60px;
                height: 60px;
            }

            .current-price {
                font-size: 1.5rem;
            }

            .actions-container {
                flex-direction: column;
            }

            .quantity-selector {
                width: 100%;
                max-width: none;
            }

            .comment-section {
                padding: 15px;
                margin-top: 30px;
            }

            .comment-user {
                flex-wrap: wrap;
            }

            .comment-date {
                width: 100%;
                margin-top: 5px;
                margin-left: 55px;
            }
        }

        @media (max-width: 576px) {
            .product-each-container {
                padding: 10px;
            }

            .product-title {
                font-size: 1.5rem;
            }

            .thumbnail {
                gap: 10px;
            }

            .thumbnail img {
                width: 50px;
                height: 50px;
            }

            .comment-actions {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>

    <div class="container-fluid py-5 product-each-container">
        <div class="row">
            <!-- Product Images Section -->
            <div class="col-md-6">
                <div class="product-container" id="product-container">
                    <img src="{{asset('./img/products/shoe1.jpg')}}" alt="Fall Limited Edition Sneakers" class="each-product-img"
                        id="product-img">
                    <div class="zoom-lens" id="zoom-lens"></div>
                </div>
                <div class="zoom-result" id="zoom-result">
                    <img src="{{asset('./img/products/shoe1.jpg')}}" alt="Zoomed Product" id="zoomed-image">
                </div>
                <div class="thumbnail" id="thumbnail-container">
                    <img src="{{asset('./img/products/shoe1.jpg')}}" class="thumb active" onclick="changeImage(this)">
                    <img src="{{asset('./img/products/shoe2.jpg')}}" class="thumb" onclick="changeImage(this)">
                    <img src="{{asset('./img/products/shoe3.jpg')}}" class="thumb" onclick="changeImage(this)">
                    <img src="{{asset('./img/products/shoe4.jpg')}}" class="thumb" onclick="changeImage(this)">
                </div>
            </div>

            <!-- Product Info Section -->
            <div class="col-md-6">
                <div class="product-info">
                    <p class="company-name">Sneaker Company</p>
                    <h1 class="product-title">Fall Limited Edition Sneakers</h1>
                    <p class="product-description">
                        These low-profile sneakers are your perfect casual wear companion. Featuring a durable rubber outer
                        sole,
                        they'll withstand everything the weather can offer.
                    </p>

                    <div class="price-container">
                        <div class="price-tag">
                            <span class="current-price">$125.00</span>
                            <span class="discount-badge">50%</span>
                        </div>
                        <p class="original-price">$250.00</p>
                    </div>

                    <div class="actions-container">
                        <div class="quantity-selector">
                            <button class="minus" onclick="updateQuantity(-1)">-</button>
                            <span id="quantity">0</span>
                            <button class="plus" onclick="updateQuantity(1)">+</button>
                        </div>
                        <button class="add-to-cart">
                            <i class="fas fa-shopping-cart"></i>
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="comment-section">
            <div class="comment-header">
                <h3>Customer Reviews</h3>
                <span class="comment-count">24 Reviews</span>
            </div>

            <div class="comment-input-container">
                <textarea class="comment-input" rows="3" placeholder="Share your thoughts about this product..."></textarea>
                <div class="d-flex justify-content-between align-items-center">

                    <button class="submit-btn">Post Review</button>
                </div>
            </div>

            <div class="comment-list">
                <!-- Example Comment -->
                <div class="comment-item">
                    <div class="comment-user">
                        <div class="user-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="user-info">
                            <h6 class="mb-1">John Doe</h6>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <span class="comment-date">2 days ago</span>
                    </div>
                    <p class="mb-3">These sneakers are amazing! The comfort level is outstanding, and they look even better
                        in person. Definitely worth the investment.</p>
                    <div class="comment-actions">
                        <button class="action-btn">
                            <i class="far fa-thumbs-up"></i>
                            <span>Helpful (23)</span>
                        </button>
                        <button class="action-btn">
                            <i class="far fa-comment"></i>
                            <span>Reply</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>

    <script>

        // Image gallery and zoom functionality
        function changeImage(element) {
            const mainImage = document.getElementById('product-img');
            const zoomedImage = document.getElementById('zoomed-image');
            const thumbnails = document.querySelectorAll('.thumb');

            // Update main and zoomed images
            mainImage.src = element.src;
            zoomedImage.src = element.src;

            // Update thumbnail active states
            thumbnails.forEach(thumb => thumb.classList.remove('active'));
            element.classList.add('active');
        }

        // Zoom functionality
        const productContainer = document.getElementById("product-container");
        const zoomLens = document.getElementById("zoom-lens");
        const zoomResult = document.getElementById("zoom-result");
        const zoomedImage = document.getElementById("zoomed-image");

        // Initialize zoom functionality only on desktop
        function initZoom() {
            if (window.innerWidth > 992) {
                productContainer.addEventListener("mouseenter", showZoom);
                productContainer.addEventListener("mouseleave", hideZoom);
                productContainer.addEventListener("mousemove", moveZoom);
            } else {
                productContainer.removeEventListener("mouseenter", showZoom);
                productContainer.removeEventListener("mouseleave", hideZoom);
                productContainer.removeEventListener("mousemove", moveZoom);
            }
        }

        function showZoom() {
            zoomLens.style.display = "block";
            zoomResult.style.display = "block";
        }

        function hideZoom() {
            zoomLens.style.display = "none";
            zoomResult.style.display = "none";
        }

        function moveZoom(e) {
            const bounds = productContainer.getBoundingClientRect();
            const lensSize = 100;

            // Calculate cursor position relative to container
            let x = e.clientX - bounds.left - lensSize / 2;
            let y = e.clientY - bounds.top - lensSize / 2;

            // Prevent lens from going outside container
            x = Math.max(0, Math.min(x, bounds.width - lensSize));
            y = Math.max(0, Math.min(y, bounds.height - lensSize));

            // Position lens
            zoomLens.style.left = `${x}px`;
            zoomLens.style.top = `${y}px`;

            // Calculate zoom
            const zoomFactor = zoomedImage.width / bounds.width;
            zoomedImage.style.left = `-${x * zoomFactor}px`;
            zoomedImage.style.top = `-${y * zoomFactor}px`;
        }

        
       

        // Initialize zoom on page load and window resize
        window.addEventListener('load', initZoom);
        window.addEventListener('resize', initZoom);

        // Add keyframe animations to head
        const style = document.createElement('style');
        style.textContent = `
                        @keyframes slideIn {
                            from {
                                transform: translateX(100%);
                                opacity: 0;
                            }
                            to {
                                transform: translateX(0);
                                opacity: 1;
                            }
                        }

                        @keyframes slideOut {
                            from {
                                transform: translateX(0);
                                opacity: 1;
                            }
                            to {
                                transform: translateX(100%);
                                opacity: 0;
                            }
                        }
                    `;
        document.head.appendChild(style);
    </script>
@endsection