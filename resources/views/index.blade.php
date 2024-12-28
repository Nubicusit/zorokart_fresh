@extends('includes.inc')
@section('content')
<!-- Category items section starts -->
<div class="container-fluid my-2 px-0">
  <button id="scroll-left" class="scroll-btn">⬅</button>
  <div class="scroll-container" id="scroll-container">
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Women's"><p>Women's</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Men's"><p>Men's</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Kids"><p>Kids</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Newborn"><p>Newborn</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Groceries"><p>Groceries</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Beauty & Personal Care"><p>Beauty & Personal Care</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Footwear"><p>Footwear</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Watches"><p>Watches</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Accessories"><p>Accessories</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Electronics"><p>Electronics</p></div>
    <div class="category-item"><img src="https://via.placeholder.com/80" alt="Appliances"><p>Appliances</p></div>
  </div>
  <button id="scroll-right" class="scroll-btn">➡</button>
</div>
<!-- Category items section ends -->

<!-- Main carousel section starts -->
<div class="container-fluid px-0 my-1">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 img-fluid" src="{{asset('images/banners/2024112014501280px-Sunflower_from_Silesia2.jpg')}}" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 img-fluid" src="{{asset('images/banners/2024112014501280px-Sunflower_from_Silesia2.jpg')}}" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 img-fluid" src="{{asset('images/banners/202411201449isometric-ab-testing-comparison-concept-split-testing-web-page-vector-id1141235861-1.jpg')}}" alt="Third slide">
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
<div class="container my-4">
<h3>
  Avail Best Offers & Discounts
  <br>
  <small class="text-body-secondary"><a href="#">All Offers</a></small>
</h3>
</div>
<!-- Offers and discounts heading ends -->

<!-- Offers and discounts section starts -->
<div class="container my-2">
  <div class="row">
    @for ($i=1; $i <= 6; $i++)
      <div class="col-6 col-sm-4 col-md-2 mb-4">
        <div class="card border">
          <img class="card-img-top img-fluid" src="https://via.placeholder.com/100" alt="Card image cap">
        </div>
      </div>
    @endfor
  </div>
</div>

<!-- Offers and discounts section ends -->

<!-- top fashion deals starts -->
<!-- top fashion deals starts -->
<div class="container my-4 fashion-container">
  <div class="row">
    <!-- Left Column: Offers or Categories -->
    <div class="col-md-4 col-sm-12 mb-4">
      <div class="sidebar">
        <h3>Fashion Top Deals</h3>
        <div class="row justify-content-center">
          <!-- Row 1 -->
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="https://via.placeholder.com/150" alt="Men's Jackets" class="img-fluid">
            </div>
          </div>
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="https://via.placeholder.com/150" alt="Men's Sweaters" class="img-fluid">
            </div>
          </div>

          <!-- Row 2 -->
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="https://via.placeholder.com/150" alt="Women's Jackets" class="img-fluid">
            </div>
          </div>
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="https://via.placeholder.com/150" alt="Women's Sweaters" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Column: Main Banner -->
    <div class="col-md-8 col-sm-12">
      <div class="fashionadd-banner">
        <img class="fashionadd-banner-img img-fluid" src="https://via.placeholder.com/600x300" alt="Fashion">
        <div class="fashionadd-banner-text">
          <h2>Fashion Items</h2>
          <p>Latest Collection, Best Brands</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Top Deals section starts -->
<div class="container my-4">
<h3>
  Top Deals
  <br>
  <!-- <small class="text-body-secondary"><a href="#">All Offers</a></small> -->
</h3>
</div>
<div class="container my-2">
  <div class="row">
    @for ($i=1; $i <= 6; $i++)
      <div class="col-6 col-sm-4 col-md-2 mb-4">
        <div class="card border">
          <img class="card-img-top img-fluid" src="https://via.placeholder.com/100" alt="Card image cap">
        </div>
      </div>
    @endfor
  </div>
</div>
<!-- Top Deals section ends -->
 <!--Add -->
 <div class="container py-5">
        <div class="row">
            <!-- First Image -->
            <div class="col-md-6 col-sm-12 image-container">
                <img src="https://via.placeholder.com/860x350" alt="Image 1" class="img-fluid">
            </div>
            <!-- Second Image -->
            <div class="col-md-6 col-sm-12 image-container">
                <img src="https://via.placeholder.com/860x350" alt="Image 2" class="img-fluid">
            </div>
        </div>
    </div>
<!-- Pic your styles section starts -->
<div class="container my-4">
<h3>
  Pic Your Styles
  <br>
  <!-- <small class="text-body-secondary"><a href="#">All Offers</a></small> -->
</h3>
</div>
<div class="container my-2">
  <div class="row">
    @for ($i=1; $i <= 6; $i++)
      <div class="col-6 col-sm-4 col-md-2 mb-4">
        <div class="card border">
          <img class="card-img-top img-fluid" src="https://via.placeholder.com/100" alt="Card image cap">
        </div>
      </div>
    @endfor
  </div>
</div>
<!-- Pic your styles section ends -->
<!-- Top Deals on TV & Appliances starts -->
<div class="container my-4 fashion-container">
  <div class="row">
    <!-- Left Column: Offers or Categories -->
    <div class="col-md-4 col-sm-12 mb-4">
      <div class="sidebar">
        <h3>Top Deals on TV & Appliances</h3>
        <div class="row justify-content-center">
          <!-- Row 1 -->
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="https://via.placeholder.com/150" alt="Men's Jackets" class="img-fluid">
            </div>
          </div>
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="https://via.placeholder.com/150" alt="Men's Sweaters" class="img-fluid">
            </div>
          </div>

          <!-- Row 2 -->
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="https://via.placeholder.com/150" alt="Women's Jackets" class="img-fluid">
            </div>
          </div>
          <div class="col-6 mb-3 d-flex justify-content-center">
            <div class="fashion-item">
              <img src="https://via.placeholder.com/150" alt="Women's Sweaters" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Column: Main Banner -->
    <div class="col-md-8 col-sm-12">
      <div class="fashionadd-banner">
        <img class="fashionadd-banner-img img-fluid" src="https://via.placeholder.com/600x300" alt="Fashion">
        <div class="fashionadd-banner-text">
          <h2>Fashion Items</h2>
          <p>Latest Collection, Best Brands</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection