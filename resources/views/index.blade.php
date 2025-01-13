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
    <!-- @for ($i=1; $i <= 6; $i++)
      <div class="col-6 col-sm-4 col-md-2 mb-4">
        <div class="card border">
          <img class="card-img-top img-fluid" src="{{asset('img/offers/<?=$i?>.jpg')}}" alt="Card image cap">
        </div>
      </div>
    @endfor -->
    <div class="col-6 col-sm-4 col-md-2 mb-4">
      <div class="card border">
        <img class="card-img-top img-fluid" src="{{asset('img/offers/1.jpg')}}" alt="Card image cap">
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2 mb-4">
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
    </div>
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
<div class="container my-4">
<h3>
  Top Deals
  <br>
  <!-- <small class="text-body-secondary"><a href="#">All Offers</a></small> -->
</h3>
</div>
<div class="container my-2">
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
        <img class="card-img-top img-fluid" src="{{asset('img/top deals/13.jpg')}}" alt="Card image cap">
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2 mb-4">
      <div class="card border">
        <img class="card-img-top img-fluid" src="{{asset('img/top deals/16.jpg')}}" alt="Card image cap">
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2 mb-4">
      <div class="card border">
        <img class="card-img-top img-fluid" src="{{asset('img/top deals/17.jpg')}}" alt="Card image cap">
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2 mb-4">
      <div class="card border">
        <img class="card-img-top img-fluid" src="{{asset('img/top deals/18.jpg')}}" alt="Card image cap">
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2 mb-4">
      <div class="card border">
        <img class="card-img-top img-fluid" src="{{asset('img/top deals/15.jpg')}}" alt="Card image cap">
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2 mb-4">
      <div class="card border">
        <img class="card-img-top img-fluid" src="{{asset('img/top deals/14.jpg')}}" alt="Card image cap">
      </div>
    </div>
  </div>
</div>
<!-- Top Deals section ends -->
 <!--Add -->
 <div class="container py-5">
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
<div class="container my-4">
<h3>
  Pic Your Styles
  <br>
  <!-- <small class="text-body-secondary"><a href="#">All Offers</a></small> -->
</h3>
</div>
<div class="container my-2">
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
          <img class="card-img-top img-fluid" src="{{asset('img/top deals/C.webp')}}" alt="Card image cap">
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
<!-- Top Deals on TV & Appliances starts -->
<div class="container my-4 fashion-container">
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
@endsection