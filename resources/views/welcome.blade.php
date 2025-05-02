@extends('includes.inc')
@section('content')
  <!-- Category items section starts -->
  <div class="container-fluid p-0 px-0 category-container">
  <button id="scroll-left" class="scroll-btn">⬅</button>
  <div class="scroll-container" id="scroll-container">
  <div class="category-item"><img src="{{asset('img/categories/ICON-01.png')}}" alt="Women's">
  <p>Kids</p>
  </div>
  <div class="category-item"><img src="{{asset('img/categories/ICON-02.png')}}" alt="Men's">
  <p>Women's</p>
  </div>
  <div class="category-item"><img src="{{asset('img/categories/ICON-03.png')}}" alt="Kids">
  <p>Men's</p>
  </div>
  <div class="category-item"><img src="{{asset('img/categories/ICON-04.png')}}" alt="Newborn">
  <p>Newborn</p>
  </div>
  <div class="category-item"><img src="{{asset('img/categories/ICON-05.png')}}" alt="Groceries">
  <p>Groceries</p>
  </div>
  <div class="category-item"><img src="{{asset('img/categories/ICON-06.png')}}" alt="Beauty & Personal Care">
  <p>Beauty & Personal Care</p>
  </div>
  <div class="category-item"><img src="{{asset('img/categories/ICON-07.png')}}" alt="Footwear">
  <p>Watches</p>
  </div>
  <div class="category-item"><img src="{{asset('img/categories/ICON-08.png')}}" alt="Watches">
  <p>Appliances</p>
  </div>
  <div class="category-item"><img src="{{asset('img/categories/ICON-09.png')}}" alt="Accessories">
  <p>Electronics</p>
  </div>
  <div class="category-item"><img src="{{asset('img/categories/ICON-10.png')}}" alt="Electronics">
  <p>Groceries</p>
  </div>
  <div class="category-item"><img src="{{asset('img/categories/ICON-11.png')}}" alt="Appliances">
  <p>Accessories</p>
  </div>
  </div>
  <button id="scroll-right" class="scroll-btn">➡</button>
  </div>
  <!-- Category items section ends -->

  <!-- Main carousel section starts -->
  <div class="container carousel-container p-0 px-0 my-1">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <div class="carousel-item active">
  <img class="d-block w-100 img-fluid" src="{{asset('img/banners/BANNER-01.jpg')}}" alt="First slide">
  </div>
  <div class="carousel-item">
  <img class="d-block w-100 img-fluid" src="{{asset('img/banners/BANNER-02.jpg')}}" alt="Second slide">
  </div>
  <div class="carousel-item">
  <img class="d-block w-100 img-fluid" src="{{asset('img/banners/BANNER-03.jpg')}}" alt="Third slide">
  </div>
  <div class="carousel-item">
  <img class="d-block w-100 img-fluid" src="{{asset('img/banners/BANNER-04.jpg')}}" alt="Third slide">
  </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
  </a>
  </div>
  </div>
  <!-- Main carousel section ends -->

  <!-- Offers and discounts section starts -->
  <div class="promo-wrapper">
  <!-- Offers and discounts heading -->
  <div class="promo-header">
  <h2 class="promo-title">Avail Best Offers & Discounts</h2>
  <a href="#" class="promo-viewall">All Offers</a>
  </div>

  <!-- Offers and discounts grid using Bootstrap grid system with custom gutters -->
  <div class="row promo-row">
  <!-- Card 1 -->
  <div class="col-6 col-md-4 col-lg-2 promo-col">
  <div class="promo-card">
  <div class="promo-image-container">
  <img class="promo-image" src="{{ asset('./img/products/diary1.jpg') }}" alt="Dairy Products">
  </div>
  <ul class="promo-category">
  <li class="promo-tag">Dairy Products</li>
  </ul>
  <div class="promo-content">
  <p class="promo-text">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="promo-footer">
  <a href="#" class="promo-btn"><i class="fa-solid fa-plus mr-1"></i></i>ADD CART</a>
  </div>
  </div>
  </div>

  <!-- Card 2 -->
  <div class="col-6 col-md-4 col-lg-2 promo-col">
  <div class="promo-card">
  <div class="promo-image-container">
  <img class="promo-image" src="{{ asset('./img/products/bee.jpg') }}" alt="Beauty and Care">
  </div>
  <ul class="promo-category">
  <li class="promo-tag">Beauty and Care</li>
  </ul>
  <div class="promo-content">
  <p class="promo-text">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="promo-footer">
  <a href="#" class="promo-btn"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>

  <!-- Card 3 -->
  <div class="col-6 col-md-4 col-lg-2 promo-col">
  <div class="promo-card">
  <div class="promo-image-container">
  <img class="promo-image" src="{{ asset('./img/products/watch.jpg') }}" alt="Watches">
  </div>
  <ul class="promo-category">
  <li class="promo-tag">Watches</li>
  </ul>
  <div class="promo-content">
  <p class="promo-text">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="promo-footer">
  <a href="#" class="promo-btn"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>

  <!-- Card 4 -->
  <div class="col-6 col-md-4 col-lg-2 promo-col">
  <div class="promo-card">
  <div class="promo-image-container">
  <img class="promo-image" src="{{ asset('./img/products/mobace.jpg') }}" alt="Mobile Accessories">
  </div>
  <ul class="promo-category">
  <li class="promo-tag">Mobile Accessories</li>
  </ul>
  <div class="promo-content">
  <p class="promo-text">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="promo-footer">
  <a href="#" class="promo-btn"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>

  <!-- Card 5 -->
  <div class="col-6 col-md-4 col-lg-2 promo-col">
  <div class="promo-card">
  <div class="promo-image-container">
  <img class="promo-image" src="{{ asset('./img/products/foot.jpg') }}" alt="Footwear">
  </div>
  <ul class="promo-category">
  <li class="promo-tag">Footwear</li>
  </ul>
  <div class="promo-content">
  <p class="promo-text">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="promo-footer">
  <a href="#" class="promo-btn"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>

  <!-- Card 6 -->
  <div class="col-6 col-md-4 col-lg-2 promo-col">
  <div class="promo-card">
  <div class="promo-image-container">
  <img class="promo-image" src="{{ asset('./img/products/bag.jpg') }}" alt="Bags">
  </div>
  <ul class="promo-category">
  <li class="promo-tag">Bags</li>
  </ul>
  <div class="promo-content">
  <p class="promo-text">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="promo-footer">
  <a href="#" class="promo-btn"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>
  </div>
  </div>
  <!-- Offers and discounts section ends -->


  <!-- top fashion deals starts -->
  <div class="content-container">
  <div class="container-fluid fashion-container">
  <div class="row">
  <!-- Left Column: Offers or Categories -->
  <div class="col-12 col-md-4 mb-4 mb-md-0 left-offers">
  <div class="sidebar h-100">
  <h3>Top Deals on Apple Products</h3>
  <div class="row g-3">
  <!-- Row 1 -->
  <div class="col-6">
  <div class="fashion-item">
  <img src="{{asset('img/top deals/apple watch.jpg')}}" alt="Men's Jackets">
  </div>
  </div>
  <div class="col-6">
  <div class="fashion-item">
  <img src="{{asset('img/top deals/iphone.jpg')}}" alt="Men's Sweaters">
  </div>
  </div>
  <!-- Row 2 -->
  <div class="col-6">
  <div class="fashion-item">
  <img src="{{asset('img/top deals/ipad.jpg')}}" alt="Women's Jackets">
  </div>
  </div>
  <div class="col-6">
  <div class="fashion-item">
  <img src="{{asset('img/top deals/Airpods.jpg')}}" alt="Women's Sweaters">
  </div>
  </div>
  </div>
  </div>
  </div>
  <!-- Right Column: Main Banner -->
  <div class="col-12 col-md-8 right-offer">
  <div class="fashionadd-banner h-100">
  <img class="fashionadd-banner-img" src="{{asset('img/banners/banner.jpg')}}" alt="Fashion">
  <!-- <div class="fashionadd-banner-text">
  <h2>Fashion Items</h2>
  <p>Latest Collection, Best Brands</p>
  </div> -->
  </div>
  </div>
  </div>
  </div>
  </div>
  <!-- top fashion deals starts Ends -->


  <!-- Pic Your Styles section starts -->
  <div class="promo-wrapper">
  <!-- Offers and discounts heading -->
  <div class="promo-header">
  <h2 class="promo-title">Pic Your Styles</h2>
  </div>

  <!-- Offers and discounts grid using Bootstrap grid system with custom gutters -->
  <div class="row promo-row">
  <!-- Card 1 -->
  <div class="col-6 col-md-4 col-lg-2 promo-col">
  <div class="promo-card">
  <div class="promo-image-container">
  <img class="promo-image" src="{{ asset('./img/products/diary1.jpg') }}" alt="Dairy Products">
  </div>
  <ul class="promo-category">
  <li class="promo-tag">Dairy Products</li>
  </ul>
  <div class="promo-content">
  <p class="promo-text">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="promo-footer">
  <a href="#" class="promo-btn"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>

  <!-- Card 2 -->
  <div class="col-6 col-md-4 col-lg-2 promo-col">
  <div class="promo-card">
  <div class="promo-image-container">
  <img class="promo-image" src="{{ asset('./img/products/bee.jpg') }}" alt="Beauty and Care">
  </div>
  <ul class="promo-category">
  <li class="promo-tag">Beauty and Care</li>
  </ul>
  <div class="promo-content">
  <p class="promo-text">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="promo-footer">
  <a href="#" class="promo-btn"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>

  <!-- Card 3 -->
  <div class="col-6 col-md-4 col-lg-2 promo-col">
  <div class="promo-card">
  <div class="promo-image-container">
  <img class="promo-image" src="{{ asset('./img/products/watch.jpg') }}" alt="Watches">
  </div>
  <ul class="promo-category">
  <li class="promo-tag">Watches</li>
  </ul>
  <div class="promo-content">
  <p class="promo-text">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="promo-footer">
  <a href="#" class="promo-btn"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>

  <!-- Card 4 -->
  <div class="col-6 col-md-4 col-lg-2 promo-col">
  <div class="promo-card">
  <div class="promo-image-container">
  <img class="promo-image" src="{{ asset('./img/products/mobace.jpg') }}" alt="Mobile Accessories">
  </div>
  <ul class="promo-category">
  <li class="promo-tag">Mobile Accessories</li>
  </ul>
  <div class="promo-content">
  <p class="promo-text">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="promo-footer">
  <a href="#" class="promo-btn"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>

  <!-- Card 5 -->
  <div class="col-6 col-md-4 col-lg-2 promo-col">
  <div class="promo-card">
  <div class="promo-image-container">
  <img class="promo-image" src="{{ asset('./img/products/foot.jpg') }}" alt="Footwear">
  </div>
  <ul class="promo-category">
  <li class="promo-tag">Footwear</li>
  </ul>
  <div class="promo-content">
  <p class="promo-text">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="promo-footer">
  <a href="#" class="promo-btn"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>

  <!-- Card 6 -->
  <div class="col-6 col-md-4 col-lg-2 promo-col">
  <div class="promo-card">
  <div class="promo-image-container">
  <img class="promo-image" src="{{ asset('./img/products/bag.jpg') }}" alt="Bags">
  </div>
  <ul class="promo-category">
  <li class="promo-tag">Bags</li>
  </ul>
  <div class="promo-content">
  <p class="promo-text">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="promo-footer">
  <a href="#" class="promo-btn"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>
  </div>
  </div>
  <!-- Pic Your Styles section ends -->


  <!-- deal Starts -->
  <div class="deals-wrapper">
  <div class="deals-main-container">
  <div class="deals-row">
  <!-- Deal Column 1 -->
  <div class="deals-column">
  <div class="deals-block">
  <h2 class="deals-title">Best Offers</h2>
  <div class="deals-separator"></div>
  <div class="deals-grid">
  <div class="deals-item">
  <div class="deal-card">
  <img class="deal-image" src="{{asset('img/products/ele1.jpg')}}" alt="Offer Products">
  <div class="deal-details">
  <ul class="deal-tags">
  <li class="deal-tag">Dairy Products</li>
  </ul>
  <p class="deal-description">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="deal-action">
  <a href="#" class="deal-link"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>
  <div class="deals-item">
  <div class="deal-card">
  <img class="deal-image" src="{{asset('img/products/ele2.jpg')}}" alt="Offer Products">
  <div class="deal-details">
  <ul class="deal-tags">
  <li class="deal-tag">Dairy Products</li>
  </ul>
  <p class="deal-description">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="deal-action">
  <a href="#" class="deal-link"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>
  <div class="deals-item">
  <div class="deal-card">
  <img class="deal-image" src="{{asset('img/products/ele3.jpg')}}" alt="Offer Products">
  <div class="deal-details">
  <ul class="deal-tags">
  <li class="deal-tag">Dairy Products</li>
  </ul>
  <p class="deal-description">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="deal-action">
  <a href="#" class="deal-link"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>
  <div class="deals-item">
  <div class="deal-card">
  <img class="deal-image" src="{{asset('img/products/ele4.jpg')}}" alt="Offer Products">
  <div class="deal-details">
  <ul class="deal-tags">
  <li class="deal-tag">Dairy Products</li>
  </ul>
  <p class="deal-description">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="deal-action">
  <a href="#" class="deal-link"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>
  <!-- Repeat for other items -->
  </div>
  </div>
  </div>
  <div class="deals-column">
  <div class="deals-block">
  <h2 class="deals-title">Best Sellers</h2>
  <div class="deals-separator"></div>
  <div class="deals-grid">
  <div class="deals-item">
  <div class="deal-card">
  <img class="deal-image" src="{{asset('img/products/cas1.jpg')}}" alt="Offer Products">
  <div class="deal-details">
  <ul class="deal-tags">
  <li class="deal-tag">Casual Wears</li>
  </ul>
  <p class="deal-description">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="deal-action">
  <a href="#" class="deal-link"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>
  <div class="deals-item">
  <div class="deal-card">
  <img class="deal-image" src="{{asset('img/products/cas2.jpg')}}" alt="Offer Products">
  <div class="deal-details">
  <ul class="deal-tags">
  <li class="deal-tag">Casual Wears</li>
  </ul>
  <p class="deal-description">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="deal-action">
  <a href="#" class="deal-link"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>
  <div class="deals-item">
  <div class="deal-card">
  <img class="deal-image" src="{{asset('img/products/cas3.jpg')}}" alt="Offer Products">
  <div class="deal-details">
  <ul class="deal-tags">
  <li class="deal-tag">Casual Wears</li>
  </ul>
  <p class="deal-description">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="deal-action">
  <a href="#" class="deal-link"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>
  <div class="deals-item">
  <div class="deal-card">
  <img class="deal-image" src="{{asset('img/products/cas4.jpg')}}" alt="Offer Products">
  <div class="deal-details">
  <ul class="deal-tags">
  <li class="deal-tag">Casual Wears</li>
  </ul>
  <p class="deal-description">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="deal-action">
  <a href="#" class="deal-link"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>
  <!-- Repeat for other items -->
  </div>
  </div>
  </div>
  <div class="deals-column">
  <div class="deals-block">
  <h2 class="deals-title">New Arrivals</h2>
  <div class="deals-separator"></div>
  <div class="deals-grid">
  <div class="deals-item">
  <div class="deal-card">
  <img class="deal-image" src="{{asset('img/products/be1.jpg')}}" alt="Offer Products">
  <div class="deal-details">
  <ul class="deal-tags">
  <li class="deal-tag">Beauty Products</li>
  </ul>
  <p class="deal-description">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="deal-action">
  <a href="#" class="deal-link">
    
  
  </i>ADD CART</a>
  </div>
  </div>
  </div>
  <div class="deals-item">
  <div class="deal-card">
  <img class="deal-image" src="{{asset('img/products/be2.jpg')}}" alt="Offer Products">
  <div class="deal-details">
  <ul class="deal-tags">
  <li class="deal-tag">Dairy Products</li>
  </ul>
  <p class="deal-description">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="deal-action">
  <a href="#" class="deal-link"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>
  <div class="deals-item">
  <div class="deal-card">
  <img class="deal-image" src="{{asset('img/products/be3.jpg')}}" alt="Offer Products">
  <div class="deal-details">
  <ul class="deal-tags">
  <li class="deal-tag">Dairy Products</li>
  </ul>
  <p class="deal-description">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="deal-action">
  <a href="#" class="deal-link"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>
  <div class="deals-item">
  <div class="deal-card">
  <img class="deal-image" src="{{asset('img/products/be4.jpg')}}" alt="Offer Products">
  <div class="deal-details">
  <ul class="deal-tags">
  <li class="deal-tag">Dairy Products</li>
  </ul>
  <p class="deal-description">Buy 1 Get Another with 50% Off</p>
  </div>
  <div class="deal-action">
  <a href="#" class="deal-link"><i class="fa-solid fa-plus mr-1"></i>ADD CART</a>
  </div>
  </div>
  </div>
  <!-- Repeat for other items -->
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  <!-- deal Ends -->

  <!-- Top Deals on TV & Appliances starts -->
  <div class="content-container">
  <div class="container-fluid fashion-container my-2">
  <div class="row">
  <!-- Left Column: Offers or Categories -->
  <div class="col-12 col-md-4 mb-4 mb-md-0 left-offers">
  <div class="sidebar h-100">
  <h3>Top Deals on Apple Products</h3>
  <div class="row g-3">
  <!-- Row 1 -->
  <div class="col-6">
  <div class="fashion-item">
  <img src="{{asset('img/top deals/apple watch.jpg')}}" alt="Men's Jackets">
  </div>
  </div>
  <div class="col-6">
  <div class="fashion-item">
  <img src="{{asset('img/top deals/iphone.jpg')}}" alt="Men's Sweaters">
  </div>
  </div>
  <!-- Row 2 -->
  <div class="col-6">
  <div class="fashion-item">
  <img src="{{asset('img/top deals/ipad.jpg')}}" alt="Women's Jackets">
  </div>
  </div>
  <div class="col-6">
  <div class="fashion-item">
  <img src="{{asset('img/top deals/Airpods.jpg')}}" alt="Women's Sweaters">
  </div>
  </div>
  </div>
  </div>
  </div>
  <!-- Right Column: Main Banner -->
  <div class="col-12 col-md-8 right-offer">
  <div class="fashionadd-banner h-100">
  <img class="fashionadd-banner-img" src="{{asset('img/top deals/Airpods.jpg')}}" alt="Fashion">
  <!-- <div class="fashionadd-banner-text">
  <h2>Fashion Items</h2>
  <p>Latest Collection, Best Brands</p>
  </div> -->
  </div>
  </div>
  </div>
  </div>
  </div>
  <!-- Top Deals on TV & Appliances starts Ends -->
@endsection