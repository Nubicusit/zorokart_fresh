@extends('includes.inc')
@section('content')
<!-- Top Deals section starts -->
<div class="container my-4">
<h3>
  Products
  <br>
  <!-- <small class="text-body-secondary"><a href="#">All Offers</a></small> -->
</h3>
</div>
<div class="container my-2">
  <div class="row">
    @for ($i=1; $i <= 24; $i++)
      <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
        <div class="card border rounded-3">
          <img class="card-img-top img-fluid" src="https://via.placeholder.com/100" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Product Name</h5>
            <div class="d-flex justify-content-between">
              <!-- Buy Now Button with Icon -->
              <button class="btn">
                <i class="bi bi-cart-fill" style="color:#ff5B00; font-size: 2rem;"></i>
              </button>
              <!-- Add to Cart Button with Icon -->
              <button class="btn">
                <i class="bi bi-heart" style="color:#ff5B00; font-size: 2rem;"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    @endfor
  </div>
</div>

</div>
<!-- Top Deals section ends -->
@endsection