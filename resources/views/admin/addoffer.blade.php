@extends('admin.inc.includes')
@section('content')
<div class="main-content">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Header Section -->
    <div class="header-section d-flex justify-content-between align-items-center">
        <h2 class="mb-0">Add Offers</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOfferModal">
            <i class="fas fa-plus me-2"></i>Add New Offers
        </button>
    </div>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Offers</li>
        </ol>
    </nav>
    <!-- Table Section -->
    <div class="card mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="5%">Sl</th>
                            <th scope="col" width="15%">Category Name</th>
                            <th scope="col" width="15%">Sub Category Name </th>
                            <th scope="col" width="20%">Product Name</th>
                            <th scope="col" width="10%">Product Id</th>
                            <th scope="col" width="15%">Offer Price</th>
                            <th scope="col" width="15%">Offer Percentage</th>
                            <th scope="col" width="15%">Status</th>
                            <th scope="col" width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($offers as $o => $offer)
                        <tr id="offers={{ $offer->off_id }}">
                            <td>{{$o + 1}}</td>
                            <td>{{$offer->category->cat_name ?? 'N/A'}}</td>
                            <td>{{$offer->subCategory->sub_name ?? 'N/A'}}</td>
                            <td>{{$offer->products->prodct_name ?? 'N/A'}}</td>
                            <td>{{$offer->products->prodct_id ?? 'N/A'}}</td>
                            <td>{{$offer->off_price}}</td>
                            <td>{{$offer->off_percentage}}</td>
                            <td>
                                <form action="{{ route('category.update-status') }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="off_id" value="{{ $offer->off_id }}">
                                    <input type="hidden" name="status" value="0">
                                    <label class="switch">
                                    <input type="checkbox" name="status" value="1" class="status-toggle" {{ $offer->status == 1 ? 'checked' : '' }}
                                    onchange="this.form.submit()"><span class="slider round"></span>
                                </form>
                            </td>
                            <td>
                                <button 
                                class="btn btn-sm btn-primary editOffersBtn" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editOffers" 
                                data-id="{{ $offer->off_id }}"
                                
                                
                                data-status="{{$offer->status }}">
                                <i class="fas fa-edit"></i>
                                </button>
                                <a href="{{ route('offers.delete', ['off_id' => $offer->off_id]) }}"
                                class="btn btn-sm btn-danger deleteSubCategoryBtn"
                                data-id="{{ $offer->off_id }}">
                                <i class="fas fa-trash"></i>
                                </a>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Offers Modal -->
    <div class="modal fade" id="addOfferModal" tabindex="-1" aria-labelledby="addOfferModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOfferModalLabel">Add New Offers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addCategoryForm" action="{{ route('addoffer.insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="categorySelect" class="form-label">Category</label>
                            <select class="form-select" id="categorySelect" name="cat_id" required>
                                <option value="" selected disabled>Select Category</option>
                                @foreach ($category as $cat)
                                <option value="{{ $cat->cat_id }}">{{ $cat->cat_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="subcategorySelect" class="form-label">Subcategory</label>
                            <select class="form-select" id="subcategorySelect" name="sub_cat_id" required>
                                <option value="" selected disabled>Select Subcategory</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="productList" class="form-label">Products</label>
                            <ul id="productList" class="list-group"></ul>
                        </div>

                        <div class="mb-3">
                            <label for="productId" class="form-label"></label>
                            <ul id="productId" class="list-group"></ul>
                        </div>

                        <div class="mb-3">
                            <label for="originalPrice" class="form-label">Original Price</label>
                            <input type="text" class="form-control" id="originalPrice" name="original_price" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="offerprice" class="form-label">Offer Price</label>
                            <input type="text" class="form-control" id="offerprice" name="off_price" required>
                        </div>
                        <div class="mb-3">
                            <label for="offerpercentage" class="form-label">Offer Percentage</label>
                            <input type="text" class="form-control" id="offerpercentage" name="off_percentage" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Offers Modal -->
    <div class="modal fade" id="editOffers" tabindex="-1" aria-labelledby="editOffersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editOffersLabel">Edit Offers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (isset($offer))
                <form id="editOffersForm" action="{{ route('offers.update', $offer->off_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="off_id" value="{{ $offer->off_id }}">
                    <div class="mb-3">
                        <label for="categorySelect" class="form-label">Category</label>
                        <input type="text" class="form-control" id="categorySelect" name="" value="{{ $offer->category->cat_name ?? '' }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="subcategorySelect" class="form-label">Subcategory</label>
                        <input type="text" class="form-control" id="subcategorySelect" name="" value="{{ $offer->subCategory->sub_name ?? '' }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="products" class="form-label">Products</label>
                        <input type="text" class="form-control" id="products" name="" value="{{ $offer->products->prodct_name ?? '' }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="originalPriceEdit" class="form-label">Original Price</label>
                        <input type="text" class="form-control" id="originalPriceEdit" name="original_price" value="{{ $offer->products->price ?? '' }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="offerpriceEdit" class="form-label">Offer Price</label>
                        <input type="text" class="form-control" id="offerpriceEdit" name="off_price" value="{{ $offer->off_price ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="offerpercentageEdit" class="form-label">Offer Percentage</label>
                        <input type="text" class="form-control" id="offerpercentageEdit" name="off_percentage" value="{{ $offer->off_percentage ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1" {{ $offer->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $offer->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                @else
                <p>No offer available to edit.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script>
    $('#categorySelect').change(function() {
        var catId = $(this).val();

        if (catId) {
            $.ajax({
                url: '/get-subcategories/' + catId,
                type: 'GET',
                success: function(subcategories) {
                    $('#subcategorySelect').empty().append('<option value="" selected disabled>Select Subcategory</option>');

                    subcategories.forEach(function(sub) {
                        $('#subcategorySelect').append('<option value="' + sub.sub_cat_id + '">' + sub.sub_name + '</option>');
                    });
                }
            });
        }
    });
    $('#subcategorySelect').change(function() {
    var subCatId = $(this).val();

    if (subCatId) {
        $.ajax({
            url: '/get-products/' + subCatId,
            type: 'GET',
            success: function(products) {
                $('#productList').empty();
                var totalPrice = 0;

                products.forEach(function(product) {
                    var price = parseFloat(product.price);
                    
                    if (!isNaN(price)) {

                        $('#productList').append('<li class="list-group-item">' + product.prodct_name + ' - ' + price.toFixed(2) + '</li>');
                        $('#productId').append('<input type="hidden" name="prodct_id" value="' + product.prodct_id + '">');
                        totalPrice += price;
                    } else {
                        console.error('Invalid price for product: ', product);
                    }
                });

                if (!isNaN(totalPrice)) {
                    $('#originalPrice').val(totalPrice.toFixed(2));
                } else {
                    $('#originalPrice').val('0.00');
                }
            }
        });
    }
});

</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const originalPriceInput = document.getElementById('originalPrice');
        const offerPriceInput = document.getElementById('offerprice');
        const offerPercentageInput = document.getElementById('offerpercentage');

        offerPriceInput.addEventListener('input', function () {
            const originalPrice = parseFloat(originalPriceInput.value) || 0;
            const offerPrice = parseFloat(offerPriceInput.value) || 0;

            if (originalPrice > 0 && offerPrice > 0) {
                const percentage = ((originalPrice - offerPrice) / originalPrice) * 100;
                offerPercentageInput.value = percentage.toFixed(2);
            } else {
                offerPercentageInput.value = '';
            }
        });


        offerPercentageInput.addEventListener('input', function () {
            const originalPrice = parseFloat(originalPriceInput.value) || 0;
            const percentage = parseFloat(offerPercentageInput.value) || 0;

            if (originalPrice > 0 && percentage > 0) {
                const offerPrice = originalPrice - (originalPrice * (percentage / 100));
                offerPriceInput.value = offerPrice.toFixed(2);
            } else {
                offerPriceInput.value = '';
            }
        });
    });
</script>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        const originalPriceInput = document.getElementById('originalPriceEdit');
        const offerPriceInput = document.getElementById('offerpriceEdit');
        const offerPercentageInput = document.getElementById('offerpercentageEdit');


        offerPriceInput.addEventListener('input', function () {
            const originalPrice = parseFloat(originalPriceInput.value) || 0;
            const offerPrice = parseFloat(offerPriceInput.value) || 0;

            if (originalPrice > 0) {
                const offerPercentage = ((originalPrice - offerPrice) / originalPrice) * 100;
                offerPercentageInput.value = offerPercentage.toFixed(2); 
            }
        });


        offerPercentageInput.addEventListener('input', function () {
            const originalPrice = parseFloat(originalPriceInput.value) || 0;
            const offerPercentage = parseFloat(offerPercentageInput.value) || 0;

            if (originalPrice > 0) {
                const offerPrice = originalPrice - (originalPrice * (offerPercentage / 100));
                offerPriceInput.value = offerPrice.toFixed(2);
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const deleteButtons = document.querySelectorAll('.deleteSubCategoryBtn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', event => {
                event.preventDefault(); 
                const deleteUrl = button.getAttribute('href');
                if (confirm('Are you sure you want to delete this item?')) {
                    window.location.href = deleteUrl; 
                }
            });
        });
    });
</script>

@endsection