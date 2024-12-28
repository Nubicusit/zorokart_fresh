@extends('includes.inc')
@section('content')
<!-- Product view starts -->
<div class="container my-4 fashion-container">
  <div class="row">
    <!-- Left Column: Main Banner -->
    <div class="col">
      <div class="more-images">
        @for ($i=1; $i <= 6; $i++)
          <div class="card border">
            <img class="card-img-top img-fluid more-images-each" src="https://via.placeholder.com/100" alt="More Images">
          </div>
        @endfor
      </div>
    </div>
    <div class="col-md-4 col-sm-12">
      <div class="fashionadd-banner">
        <img class="fashionadd-banner-img img-fluid" src="https://via.placeholder.com/400x500" alt="Fashion">
        <div class="fashionadd-banner-text">
          <h2>Fashion Items</h2>
          <p>Latest Collection, Best Brands</p>
        </div>
      </div>
    </div>
    <!-- Right Column: Offers or Categories -->
    <div class="col-md-7 col-sm-12 mb-4">
        <div class="sidebar">
            <h3>Product Name</h3>
            <p>Price</p>
            <div>
                <h5>Offers available</h5>
                <div class="row justify-content-center">
                    <!-- Row 1 -->
                    <div class="col-4 mb-3 d-flex justify-content-center">
                        <div class="offer-item">
                          <strong>No Cost EMI </strong><br/>Upto ₹202.22 EMI interest savings on Amazon Pay ICICI Bank Credit CardsUpto ₹202.22 EMI interest savings on Amazon Pay ICICI
                        </div>
                    </div>
                    <div class="col-4 mb-3 d-flex justify-content-center">
                        <div class="offer-item">
                          <strong>No Cost EMI </strong><br/>Upto ₹202.22 EMI interest savings on Amazon Pay ICICI Bank Credit CardsUpto ₹202.22 EMI interest savings on Amazon Pay ICICI
                        </div>
                    </div>
                    <div class="col-4 mb-3 d-flex justify-content-center">
                        <div class="offer-item">
                          <strong>No Cost EMI </strong><br/>Upto ₹202.22 EMI interest savings on Amazon Pay ICICI Bank Credit CardsUpto ₹202.22 EMI interest savings on Amazon Pay ICICI
                        </div>
                    </div>
                </div>
            </div>
            <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
            </div>
        </div>
        
        <div style="margin-top: 75px;">
            <button type="button" class="btn btn-primary mybutton">Buy Now</button>
            <button type="button" class="btn btn-primary mybutton">Add to Cart</button>
        </div>
    </div>
  </div>
</div>
<!-- Product view ends -->
<!-- Similar products section starts -->
<div class="container my-4">
<h3>
  Related Products
  <br>
  <small class="text-body-secondary"><a href="#">All Similar Items</a></small>
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

<!-- Similar products section ends -->
@endsection