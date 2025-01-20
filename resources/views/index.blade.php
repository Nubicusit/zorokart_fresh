@extends('includes.inc')
@section('content')
<!-- Category items section starts -->
<div class="container-fluid my-2 px-0">
  <button id="scroll-left" class="scroll-btn">⬅</button>
  <div class="scroll-container" id="scroll-container">
    <div class="category-item"><img src="{{asset('img/categories/B.png')}}" alt="Women's"><p>Women's</p></div>
    <div class="category-item"><img src="{{asset('img/categories/C.png')}}" alt="Men's"><p>Men's</p></div>
    <div class="category-item"><img src="{{asset('img/categories/A.png')}}" alt="Kids"><p>Kids</p></div>
    <div class="category-item"><img src="{{asset('img/categories/D.png')}}" alt="Newborn"><p>Newborn</p></div>
    <div class="category-item"><img src="{{asset('img/categories/I.png')}}" alt="Groceries"><p>Groceries</p></div>
    <div class="category-item"><img src="{{asset('img/categories/E.png')}}" alt="Beauty & Personal Care"><p>Beauty & Personal Care</p></div>
    <div class="category-item"><img src="{{asset('img/categories/K.png')}}" alt="Footwear"><p>Footwear</p></div>
    <div class="category-item"><img src="{{asset('img/categories/F.png')}}" alt="Watches"><p>Watches</p></div>
    <div class="category-item"><img src="{{asset('img/categories/J.png')}}" alt="Accessories"><p>Accessories</p></div>
    <div class="category-item"><img src="{{asset('img/categories/H.png')}}" alt="Electronics"><p>Electronics</p></div>
    <div class="category-item"><img src="{{asset('img/categories/G.png')}}" alt="Appliances"><p>Appliances</p></div>
  </div>
  <button id="scroll-right" class="scroll-btn">➡</button>
</div>
<!-- Category items section ends -->

<!-- Main carousel section starts -->
<div class="container-fluid px-0 my-1">
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

<!-- Offers and discounts heading starts -->
<div class="container-fluid my-4">
<h3>
  Avail Best Offers & Discounts
  <br>
  <small class="text-body-secondary"><a href="#">All Offers</a></small>
</h3>
<div class="container-fluid my-4 px-2">
  <span style="font-size: larger;font-weight: 600;">Avail Best Offers & Discounts</span>
  <span><a href="#" style="font-size: 15px !important;float:right;"><u>All Offers</u></a></span>
</div>
<!-- Offers and discounts heading ends -->

<!-- Offers and discounts section starts -->
<div class="container-fluid my-2">

<div class="container-fluid my-2" style="padding: 1.5rem !important;">

  <div class="row">
    <!-- @for ($i=1; $i <= 6; $i++)
      <div class="col-6 col-sm-4 col-md-2 mb-4">
        <div class="card border">
          <img class="card-img-top img-fluid" src="{{asset('img/offers/<?=$i?>.jpg')}}" alt="Card image cap">
        </div>
      </div>
    @endfor -->
    <div class="col-6 col-sm-4 col-md-2 mb-4">
      <div class="card">
        <img class="card-img-top img-fluid" src="{{asset('img/offers/1.jpg')}}" alt="Offer Products">
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Diary Products</li>
          </ul>
          <p class="card-title">Buy 1 Get Another with 50%  Off</p></div>
        <div class="card-body">
          <!-- <a href="#" class="card-link">Card link</a> -->
          <a href="#" class="card-link">View More</a>
        </div>
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2 mb-4">
      <div class="card">
        <img class="card-img-top img-fluid" src="{{asset('img/offers/2.jpg')}}" alt="Offer Products">
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Beauty and Personel care</li>
          </ul>
          <p class="card-title">Buy 1 Get Another with 50%  Off</p></div>
        <div class="card-body">
          <!-- <a href="#" class="card-link">Card link</a> -->
          <a href="#" class="card-link">View More</a>
        </div>
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2 mb-4">
      <div class="card">
        <img class="card-img-top img-fluid" src="{{asset('img/offers/3.jpg')}}" alt="Offer Products">
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Watches</li>
          </ul>
          <p class="card-title">Buy 1 Get Another with 50%  Off</p></div>
        <div class="card-body">
          <!-- <a href="#" class="card-link">Card link</a> -->
          <a href="#" class="card-link">View More</a>
        </div>
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2 mb-4">
      <div class="card">
        <img class="card-img-top img-fluid" src="{{asset('img/offers/4.jpg')}}" alt="Offer Products">
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Mobile Accessories</li>
          </ul>
          <p class="card-title">Buy 1 Get Another with 50%  Off</p></div>
        <div class="card-body">
          <!-- <a href="#" class="card-link">Card link</a> -->
          <a href="#" class="card-link">View More</a>
        </div>
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2 mb-4">
      <div class="card">
        <img class="card-img-top img-fluid" src="{{asset('img/offers/5.jpg')}}" alt="Offer Products">
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Foot wears</li>
          </ul>
          <p class="card-title">Buy 1 Get Another with 50%  Off</p></div>
        <div class="card-body">
          <!-- <a href="#" class="card-link">Card link</a> -->
          <a href="#" class="card-link">View More</a>
        </div>
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2 mb-4">
      <div class="card">
        <img class="card-img-top img-fluid" src="{{asset('img/offers/6.jpg')}}" alt="Offer Products">
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Bags</li>
          </ul>
          <p class="card-title">Buy 1 Get Another with 50%  Off</p></div>
        <div class="card-body">
          <!-- <a href="#" class="card-link">Card link</a> -->
          <a href="#" class="card-link">View More</a>
        </div>
      </div>
    </div>
    <!-- <div class="col-6 col-sm-4 col-md-2 mb-4">
      <div class="card border">
        <img class="card-img-top img-fluid" src="{{asset('img/offers/2.jpg')}}" alt="Card image cap">
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2 mb-4">
      <div class="card border">
        <img class="card-img-top img-fluid" src="{{asset('img/offers/3.jpg')}}" alt="Card image cap">
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2 mb-4">
      <div class="card border">
        <img class="card-img-top img-fluid" src="{{asset('img/offers/4.jpg')}}" alt="Card image cap">
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2 mb-4">
      <div class="card border">
        <img class="card-img-top img-fluid" src="{{asset('img/offers/5.jpg')}}" alt="Card image cap">
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2 mb-4">
      <div class="card border">
        <img class="card-img-top img-fluid" src="{{asset('img/offers/6.jpg')}}" alt="Card image cap">
      </div>
    </div> -->
  </div>
</div>

<!-- Offers and discounts section ends -->

<!-- top fashion deals starts -->
<!-- top fashion deals starts -->
<div class="container-fluid my-4 fashion-container">
  <div class="row">
    <!-- Left Column: Offers or Categories -->
    <div class="col-md-4 col-sm-12 mb-4">
      <div class="sidebar">
        <h3>Fashion Top Deals</h3>
        <div class="row justify-content-center">
          <!-- Row 1 -->
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="{{asset('img/top deals/1.webp')}}" alt="Men's Jackets" class="img-fluid">
            </div>
          </div>
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="{{asset('img/top deals/2.webp')}}" alt="Men's Sweaters" class="img-fluid">
            </div>
          </div>

          <!-- Row 2 -->
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="{{asset('img/top deals/3.jpg')}}" alt="Women's Jackets" class="img-fluid">
            </div>
          </div>
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="{{asset('img/top deals/4.jpg')}}" alt="Women's Sweaters" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Column: Main Banner -->
    <div class="col-md-8 col-sm-12">
      <div class="fashionadd-banner">
        <img class="fashionadd-banner-img img-fluid" src="{{asset('img/categories/fam.jpg')}}" alt="Fashion">
        <div class="fashionadd-banner-text">
          <h2>Fashion Items</h2>
          <p>Latest Collection, Best Brands</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Top Deals section starts -->
<div class="container-fluid my-4">

<div class="container-fluid my-2">

<h3>
  Top Deals
  <br>
  <!-- <small class="text-body-secondary"><a href="#">All Offers</a></small> -->
</h3>
</div>
<div class="container-fluid my-2">
  <div class="row">
    <!-- Carousel Section (70%) -->
    <div class="col-md-8">
      <!-- Controls Header -->
      <div class="orangeCarousel-controls mb-2 d-flex justify-content-end">
        <button class="orangeCarousel-prev me-2" type="button" data-bs-target="#orangeCarousel" data-bs-slide="prev" style="display: none;">
          <i class="fa fa-angle-left"></i>
        </button>
        <button class="orangeCarousel-next" type="button" data-bs-target="#orangeCarousel" data-bs-slide="next">
          <i class="fa fa-angle-right"></i>
        </button>
      </div>
      
      <div id="orangeCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <!-- First Slide -->
          <div class="carousel-item active">
            <div class="row">
              
              <div class="col-4">
                <div class="orangeCarousel-thumb">
                  <span class="orangeCarousel-wishlist"><i class="fa fa-heart-o"></i></span>
                  <div class="orangeCarousel-imgbox">
                    <img src="{{asset('img/top deals/13.jpg')}}" class="img-fluid" alt="Product">
                  </div>
                  <div class="orangeCarousel-content">
                    <h4>Product Name</h4>
                    <div class="orangeCarousel-rating">
                      <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                      </ul>
                    </div>
                    <p class="orangeCarousel-price"><strike>$400.00</strike> <b>$369.00</b></p>
                    <a href="#" class="orangeCarousel-btn">Add to Cart</a>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="orangeCarousel-thumb">
                  <span class="orangeCarousel-wishlist"><i class="fa fa-heart-o"></i></span>
                  <div class="orangeCarousel-imgbox">
                    <img src="{{asset('img/top deals/13.jpg')}}" class="img-fluid" alt="Product">
                  </div>
                  <div class="orangeCarousel-content">
                    <h4>Product Name</h4>
                    <div class="orangeCarousel-rating">
                      <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                      </ul>
                    </div>
                    <p class="orangeCarousel-price"><strike>$400.00</strike> <b>$369.00</b></p>
                    <a href="#" class="orangeCarousel-btn">Add to Cart</a>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="orangeCarousel-thumb">
                  <span class="orangeCarousel-wishlist"><i class="fa fa-heart-o"></i></span>
                  <div class="orangeCarousel-imgbox">
                    <img src="{{asset('img/top deals/13.jpg')}}" class="img-fluid" alt="Product">
                  </div>
                  <div class="orangeCarousel-content">
                    <h4>Product Name</h4>
                    <div class="orangeCarousel-rating">
                      <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                      </ul>
                    </div>
                    <p class="orangeCarousel-price"><strike>$400.00</strike> <b>$369.00</b></p>
                    <a href="#" class="orangeCarousel-btn">Add to Cart</a>
                  </div>
                </div>
              </div>
              <!-- Similar structure for other items -->
            </div>
          </div>
          <div class="carousel-item active">
            <div class="row">
              <div class="col-4">
                <div class="orangeCarousel-thumb">
                  <span class="orangeCarousel-wishlist"><i class="fa fa-heart-o"></i></span>
                  <div class="orangeCarousel-imgbox">
                    <img src="{{asset('img/top deals/13.jpg')}}" class="img-fluid" alt="Product">
                  </div>
                  <div class="orangeCarousel-content">
                    <h4>Product Name</h4>
                    <div class="orangeCarousel-rating">
                      <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                      </ul>
                    </div>
                    <p class="orangeCarousel-price"><strike>$400.00</strike> <b>$369.00</b></p>
                    <a href="#" class="orangeCarousel-btn">Add to Cart</a>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="orangeCarousel-thumb">
                  <span class="orangeCarousel-wishlist"><i class="fa fa-heart-o"></i></span>
                  <div class="orangeCarousel-imgbox">
                    <img src="{{asset('img/top deals/13.jpg')}}" class="img-fluid" alt="Product">
                  </div>
                  <div class="orangeCarousel-content">
                    <h4>Product Name</h4>
                    <div class="orangeCarousel-rating">
                      <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                      </ul>
                    </div>
                    <p class="orangeCarousel-price"><strike>$400.00</strike> <b>$369.00</b></p>
                    <a href="#" class="orangeCarousel-btn">Add to Cart</a>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="orangeCarousel-thumb">
                  <span class="orangeCarousel-wishlist"><i class="fa fa-heart-o"></i></span>
                  <div class="orangeCarousel-imgbox">
                    <img src="{{asset('img/top deals/13.jpg')}}" class="img-fluid" alt="Product">
                  </div>
                  <div class="orangeCarousel-content">
                    <h4>Product Name</h4>
                    <div class="orangeCarousel-rating">
                      <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                      </ul>
                    </div>
                    <p class="orangeCarousel-price"><strike>$400.00</strike> <b>$369.00</b></p>
                    <a href="#" class="orangeCarousel-btn">Add to Cart</a>
                  </div>
                </div>
              </div>
              <!-- Similar structure for other items -->
            </div>
          </div>
          <!-- Additional slides with same structure -->
        </div>
      </div>
    </div>
    
    <!-- Image Banner Section (30%) -->
    <div class="col-md-4">
      <div class="image-banner">
        <img src="{{asset('img/banners/banner2.jpg')}}" class="img-fluid rounded banner-img" alt="Banner">
      </div>
    </div>
  </div>
</div>


<!-- Top Deals section ends -->
 <!--Add -->
 <div class="container-fluid py-5">
        <div class="row">
            <!-- First Image -->
            <div class="col-md-6 col-sm-12 image-container">
                <img src="{{asset('img/offers/B.jpg')}}" alt="Image 1" class="img-fluid">
            </div>
            <!-- Second Image -->
            <div class="col-md-6 col-sm-12 image-container">
                <img src="{{asset('img/offers/C.jpg')}}" alt="Image 2" class="img-fluid">
            </div>
        </div>
    </div>
<!-- Pic your styles section starts -->
<div class="container-fluid my-4">
<h3>
  Pic Your Styles
  <br>
  <!-- <small class="text-body-secondary"><a href="#">All Offers</a></small> -->
</h3>
</div>
<div class="container-fluid my-2">
  <div class="row">
    <!-- @for ($i=1; $i <= 6; $i++)
      <div class="col-6 col-sm-4 col-md-2 mb-4">
        <div class="card border">
          <img class="card-img-top img-fluid" src="https://via.placeholder.com/100" alt="Card image cap">
        </div>
      </div>
    @endfor -->
    <div class="col-6 col-sm-4 col-md-2 mb-4">
        <div class="card border">
          <img class="card-img-top img-fluid" src="{{asset('img/top deals/A.jpg')}}" alt="Card image cap">
        </div>
      </div>
      <div class="col-6 col-sm-4 col-md-2 mb-4">
        <div class="card border">
          <img class="card-img-top img-fluid" src="{{asset('img/top deals/C.webp')}}" alt="Card imag
          e cap">
        </div>
      </div>
      <div class="col-6 col-sm-4 col-md-2 mb-4">
        <div class="card border">
          <img class="card-img-top img-fluid" src="{{asset('img/top deals/D.webp')}}" alt="Card image cap">
        </div>
      </div>
      <div class="col-6 col-sm-4 col-md-2 mb-4">
        <div class="card border">
          <img class="card-img-top img-fluid" src="{{asset('img/top deals/E.webp')}}" alt="Card image cap">
        </div>
      </div>
      <div class="col-6 col-sm-4 col-md-2 mb-4">
        <div class="card border">
          <img class="card-img-top img-fluid" src="{{asset('img/top deals/F.webp')}}" alt="Card image cap">
        </div>
      </div>
      <div class="col-6 col-sm-4 col-md-2 mb-4">
        <div class="card border">
          <img class="card-img-top img-fluid" src="{{asset('img/top deals/G.webp')}}" alt="Card image cap">
        </div>
      </div>
  </div>
</div>
<!-- Pic your styles section ends -->


<!-- 12 cards -->

<div class="container-fluid product-grid">
        <div class="container">
            <div class="row">
                <!-- Column 1 - New Arrivals -->
                <div class="col-md-4">
                    <div class="column-header">
                        <h2>New Arrivals</h2>
                        <p>Latest additions to our collection</p>
                        <div class="meta-info">
                            <span>4 products</span>
                            <span>Updated today</span>
                        </div>
                    </div>
                    <div class="partition">
                        <div class="row">
                            <div class="col-6">
                                <div class="product-card">
                                    <div class="product-image">
                                        <div class="category-badge">New</div>
                                        <img src="{{asset('img/top deals/13.jpg')}}" alt="Product 1">
                                        <div class="price-badge">$123</div>
                                        <div class="product-overlay">
                                            <span class="quick-view">Quick View</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Repeat for other products in Column 1 -->
                            <div class="col-6">
                                <div class="product-card">
                                    <div class="product-image">
                                        <div class="category-badge">New</div>
                                        <img src="{{asset('img/top deals/13.jpg')}}" alt="Product 2">
                                        <div class="price-badge">$239</div>
                                        <div class="product-overlay">
                                            <span class="quick-view">Quick View</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="product-card">
                                    <div class="product-image">
                                        <div class="category-badge">New</div>
                                        <img src="{{asset('img/top deals/13.jpg')}}" alt="Product 3">
                                        <div class="price-badge">$147</div>
                                        <div class="product-overlay">
                                            <span class="quick-view">Quick View</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="product-card">
                                    <div class="product-image">
                                        <div class="category-badge">New</div>
                                        <img src="{{asset('img/top deals/13.jpg')}}" alt="Product 4">
                                        <div class="price-badge">$83</div>
                                        <div class="product-overlay">
                                            <span class="quick-view">Quick View</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Column 2 - Best Sellers -->
                <div class="col-md-4">
                    <div class="column-header">
                        <h2>Best Sellers</h2>
                        <p>Our most popular products</p>
                        <div class="meta-info">
                            <span>4 products</span>
                            <span>Top rated</span>
                        </div>
                    </div>
                    <div class="partition">
                        <div class="row">
                            <div class="col-6">
                                <div class="product-card">
                                    <div class="product-image">
                                        <div class="category-badge">Popular</div>
                                        <img src="{{asset('img/top deals/13.jpg')}}" alt="Product 5">
                                        <div class="price-badge">$106</div>
                                        <div class="product-overlay">
                                            <span class="quick-view">Quick View</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Repeat for other products in Column 2 -->
                            <div class="col-6">
                                <div class="product-card">
                                    <div class="product-image">
                                        <div class="category-badge">Popular</div>
                                        <img src="{{asset('img/top deals/13.jpg')}}" alt="Product 6">
                                        <div class="price-badge">$58</div>
                                        <div class="product-overlay">
                                            <span class="quick-view">Quick View</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="product-card">
                                    <div class="product-image">
                                        <div class="category-badge">Popular</div>
                                        <img src="{{asset('img/top deals/13.jpg')}}" alt="Product 7">
                                        <div class="price-badge">$199</div>
                                        <div class="product-overlay">
                                            <span class="quick-view">Quick View</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="product-card">
                                    <div class="product-image">
                                        <div class="category-badge">Popular</div>
                                        <img src="{{asset('img/top deals/13.jpg')}}" alt="Product 8">
                                        <div class="price-badge">$76</div>
                                        <div class="product-overlay">
                                            <span class="quick-view">Quick View</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Column 3 - Special Offers -->
                <div class="col-md-4">
                    <div class="column-header">
                        <h2>Special Offers</h2>
                        <p>Limited time deals & discounts</p>
                        <div class="meta-info">
                            <span>4 products</span>
                            <span>Ends soon</span>
                        </div>
                    </div>
                    <div class="partition">
                        <div class="row">
                            <div class="col-6">
                                <div class="product-card">
                                    <div class="product-image">
                                        <div class="category-badge">Sale</div>
                                        <img src="{{asset('img/top deals/13.jpg')}}" alt="Product 9">
                                        <div class="price-badge">$84</div>
                                        <div class="product-overlay">
                                            <span class="quick-view">Quick View</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Repeat for other products in Column 3 -->
                            <div class="col-6">
                                <div class="product-card">
                                    <div class="product-image">
                                        <div class="category-badge">Sale</div>
                                        <img src="{{asset('img/top deals/13.jpg')}}" alt="Product 10">
                                        <div class="price-badge">$102</div>
                                        <div class="product-overlay">
                                            <span class="quick-view">Quick View</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="product-card">
                                    <div class="product-image">
                                        <div class="category-badge">Sale</div>
                                        <img src="{{asset('img/top deals/13.jpg')}}" alt="Product 11">
                                        <div class="price-badge">$63</div>
                                        <div class="product-overlay">
                                            <span class="quick-view">Quick View</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="product-card">
                                    <div class="product-image">
                                        <div class="category-badge">Sale</div>
                                        <img src="{{asset('img/top deals/13.jpg')}}" alt="Product 12">
                                        <div class="price-badge">$41</div>
                                        <div class="product-overlay">
                                            <span class="quick-view">Quick View</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 12 cards ends -->

<!-- Top Deals on TV & Appliances starts -->
<div class="container-fluid my-4 fashion-container">
  <div class="row">
    <!-- Left Column: Offers or Categories -->
    <div class="col-md-4 col-sm-12 mb-4">
      <div class="sidebar">
        <h3>Top Deals on Apple Products</h3>
        <div class="row justify-content-center">
          <!-- Row 1 -->
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="{{asset('img/top deals/apple watch.jpg')}}" alt="Men's Jackets" class="img-fluid">
            </div>
          </div>
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="{{asset('img/top deals/iphone.jpg')}}" alt="Men's Sweaters" class="img-fluid">
            </div>
          </div>

          <!-- Row 2 -->
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="{{asset('img/top deals/ipad.jpg')}}" alt="Women's Jackets" class="img-fluid">
            </div>
          </div>
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="{{asset('img/top deals/Airpods.jpg')}}" alt="Women's Sweaters" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>


    
    <!-- Right Column: Main Banner -->
    <div class="col-md-8 col-sm-12">
      <div class="fashionadd-banner">
        <img class="fashionadd-banner-img img-fluid" src="{{asset('img/top deals/Deals.jpg')}}" alt="Apple Products">
        <div class="fashionadd-banner-text">
          <!-- <h2>Fashion Items</h2>
          <p>Latest Collection, Best Brands</p> -->
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const carousel = document.getElementById('orangeCarousel');
  const prevButton = document.querySelector('.orangeCarousel-prev');
  const nextButton = document.querySelector('.orangeCarousel-next');
  let isFirstSlide = true;
  
  // Create Bootstrap carousel instance
  const carouselInstance = new bootstrap.Carousel(carousel, {
    interval: 3000,
    wrap: true
  });
  
  // Handle previous button visibility
  carousel.addEventListener('slide.bs.carousel', function(event) {
    if (isFirstSlide) {
      isFirstSlide = false;
      prevButton.style.display = 'block';
    }
  });
  
  // Handle mouse hover pause/play
  carousel.addEventListener('mouseenter', function() {
    carouselInstance.pause();
  });
  
  carousel.addEventListener('mouseleave', function() {
    carouselInstance.cycle();
  });
  
  // Add click handlers for custom controls
  prevButton.addEventListener('click', function() {
    carouselInstance.prev();
  });
  
  nextButton.addEventListener('click', function() {
    carouselInstance.next();
  });
});
</script>
@endsection