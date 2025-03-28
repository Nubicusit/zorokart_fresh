@extends('vendor.inc.includes')
@section('content')
<div class="main-content">

    <!-- Alert Section -->
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
    <!-- Alert Section End-->

    <!-- Header Section -->
    <div class="header-section d-flex justify-content-between align-items-center">
        <h2 class="mb-0">Offer List</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOfferModal">
            <i class="fas fa-plus me-2"></i>Add New Offer
        </button>
    </div>
    <!-- Header Section End-->

    <!-- Table Section -->
    <div class="card mt-4 container-fluid">
        <div class="card-body">
            <div class="table-responsive table-container" >
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Sl</th>
                        <th>Offer Code</th>
                        <th>Offer Name</th>
                        <th>Offer Description</th>
                        <th>Discount Type</th>
                        <th>Discount Value</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Minimum Purchase Amount</th>
                        <th>Maximum Discount Value</th>
                        <th>Applicable To</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($offers as $o => $offer)
                    <tr>
                    <td>{{ $o + 1 }}</td>
                    <td><p class="fw-bold mb-1">{{ $offer->offer_code }}</p></td>
                    <td>{{ $offer->offer_name }}</td>
                    <td>{{ $offer->offer_description ?? 'N/A'}}</td>
                    <td>{{ $offer->discount_type}}</td>
                    <td>{{ $offer->discount_value }}</td>
                    <td>{{ $offer->start_date }}</td>
                    <td>{{ $offer->end_date }}</td>
                    <td>
                        @php
                            // Get the status value
                            $status = $offer->status;
                        @endphp

                        @switch($status)
                            @case(1)
                                <span class="badge bg-success">Active</span>
                                @break
                            @case(2)
                                <span class="badge bg-danger">Expired</span>
                                @break
                            @case(3)
                                <span class="badge bg-warning">Pending</span>
                                @break
                            @case(4)
                                <span class="badge bg-secondary">Disabled</span>
                                @break
                            @case(5)
                                <span class="badge bg-dark">Deleted</span>
                                @break
                            @default
                                <span class="badge bg-light">Unknown</span>
                        @endswitch
                    </td>
                    <td>{{ $offer->min_purchase_amount }}</td>
                    <td>{{ $offer->max_discount_value }}</td>
                    <td>{{ $offer->applicable_to }}</td>
                    <td>{{ $offer->created_at }}</td>
                    <td>{{ $offer->updated_at }}</td>
                    <td><button
                            class="btn btn-sm btn-primary updateOffer mb-2" 
                            data-bs-toggle      = "modal"
                            data-bs-target      = "#updateOfferModal" 
                            data-offer_id       = "{{ $offer->offer_id  }}"
                            data-offer_code     = "{{ $offer->offer_code }}"
                            data-offer_name     = "{{ $offer->offer_name }}"
                            data-offer_description      = "{{ $offer->offer_description }}"
                            data-discount_type  = "{{ $offer->discount_type }}"
                            data-discount_value = "{{ $offer->discount_value }}"
                            data-start_date     = "{{ $offer->start_date }}"
                            data-end_date       = "{{ asset($offer->end_date) }}"
                            data-min_purchase_amount    = "{{ $offer->min_purchase_amount }}"
                            data-max_discount_value     = "{{ $offer->max_discount_value }}"
                            data-applicable_to  = "{{ $offer->applicable_to }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <a href="" 
                            class="btn btn-sm btn-danger deleteOfferBtn" 
                            data-id="{{ $offer->offer_id }}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
               
            </div>
        </div>
    </div>
    <!-- Table Section End -->

    <!-- Add Offer Modal -->
    <div class="modal fade" id="addOfferModal" tabindex="-1" aria-labelledby="addOfferModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOfferModalLabel">Add New Offer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addOfferForm" action="{{ route('vendor.addOffer') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="offerCode" class="form-label">Offer Code</label>
                                <input type="text" id="offerCode" name="offer_code" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="offerName" class="form-label">Offer Name</label>
                                <input type="text" id="offerName" name="offer_name" class="form-control" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="offerDescription" class="form-label">Offer Description</label>
                                <textarea id="offerDescription" name="offer_description" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="discountType" class="form-label">Discount Type</label>
                                <select id="discountType" name="discount_type" class="form-control" required>
                                    <option value="">-Select-</option>
                                    <option value="percentage">Percentage</option>
                                    <option value="flat_amount">Flat Amount</option>
                                    <option value="category_discount">Category Discount</option>
                                    <option value="buy1_get1">Buy 1 Get 1 Free</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="discountValue" class="form-label">Discount Value</label>
                                <div class="input-group">
                                    <span class="input-group-text d-none" id="flatPrefix">Rs.</span>
                                    <input type="text" id="discountValue" name="discount_value" class="form-control" required>
                                    <span class="input-group-text d-none" id="percentageSuffix">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="startDate" class="form-label">Start Date</label>
                                <input type="date" id="startDate" name="start_date" class="form-control" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="endDate" class="form-label">End Date</label>
                                <input type="date" id="endDate" name="end_date" class="form-control" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="minPurchaseAmount" class="form-label">Min Purchase Price</label>
                                <input type="number" id="minPurchaseAmount" name="min_purchase_amount" class="form-control" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="maxDiscountAmount" class="form-label">Max Discount Price</label>
                                <input type="number" id="maxDiscountAmount" name="max_discount_amount" class="form-control" required>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="applicableTo" class="form-label">Applicable To</label>
                                <select class="form-control" id="applicableTo" name="applicable_to" required>
                                    <option value="1">All Customers</option>
                                    <option value="2">Prime Users</option>
                                    <option value="3">New Users</option>
                                </select>
                            </div>
                            <!-- Submit Button -->
                            <div class="col-md-12 mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Add Offer</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Offer Modal End-->

    <!-- Update Offer modal -->
    <div class="modal fade" id="updateOfferModal" tabindex="-1" aria-labelledby="updateOfferModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateOfferModalLabel">Update Offer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="#" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="offerCodeEdit" class="form-label">Offer Code</label>
                                <input type="text" id="offerCodeEdit" name="offer_code" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="offerNameEdit" class="form-label">Offer Name</label>
                                <input type="text" id="offerNameEdit" name="offer_name" class="form-control" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="offerDescriptionEdit" class="form-label">Offer Description</label>
                                <textarea id="offerDescriptionEdit" name="offer_description" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="discountTypeEdit" class="form-label">Discount Type</label>
                                <select id="discountTypeEdit" name="discount_type" class="form-control" required>
                                    <option value="">-Select-</option>
                                    <option value="percentage">Percentage</option>
                                    <option value="flat_amount">Flat Amount</option>
                                    <option value="category_discount">Category Discount</option>
                                    <option value="buy1_get1">Buy 1 Get 1 Free</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="discountValueEdit" class="form-label">Discount Value</label>
                                <div class="input-group">
                                    <span class="input-group-text d-none" id="flatPrefix">Rs.</span>
                                    <input type="text" id="discountValueEdit" name="discount_value" class="form-control" required>
                                    <span class="input-group-text d-none" id="percentageSuffix">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="startDateEdit" class="form-label">Start Date</label>
                                <input type="date" id="startDateEdit" name="start_date" class="form-control" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="endDateEdit" class="form-label">End Date</label>
                                <input type="date" id="endDateEdit" name="end_date" class="form-control" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="minPurchaseAmountEdit" class="form-label">Min Purchase Price</label>
                                <input type="number" id="minPurchaseAmountEdit" name="min_purchase_amount" class="form-control" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="maxDiscountAmountEdit" class="form-label">Max Discount Price</label>
                                <input type="number" id="maxDiscountAmountEdit" name="max_discount_amount" class="form-control" required>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="applicableToEdit" class="form-label">Applicable To</label>
                                <select class="form-control" id="applicableToEdit" name="applicable_to" required>
                                    <option value="1">All Customers</option>
                                    <option value="2">Prime Users</option>
                                    <option value="3">New Users</option>
                                </select>
                            </div>
                            <!-- Submit Button -->
                            <div class="col-md-12 mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Update Offer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Update Offer modal End -->

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const discountType = document.getElementById('discountType');
    const discountValue = document.getElementById('discountValue');
    const flatPrefix = document.getElementById('flatPrefix');
    const percentageSuffix = document.getElementById('percentageSuffix');

    function updateDiscountFields() {
        // Reset all fields
        discountValue.readOnly = false;
        flatPrefix.classList.add('d-none');
        percentageSuffix.classList.add('d-none');
        
        switch(discountType.value) {
            case 'buy1_get1':
                discountValue.value = '50';
                discountValue.readOnly = true;
                percentageSuffix.classList.remove('d-none');
                break;
                
            case 'flat_amount':
                flatPrefix.classList.remove('d-none');
                break;
                
            case 'percentage':
            case 'category_discount':
                percentageSuffix.classList.remove('d-none');
                break;
        }
    }

    // Initial update on page load
    updateDiscountFields();
    
    // Update when selection changes
    discountType.addEventListener('change', updateDiscountFields);
});
</script>

<script>
    $(document).ready(function () {
        $('.deleteOfferBtn').on('click', function (e) {
            e.preventDefault(); 
            var offerId = $(this).data('id'); 
            console.log("Check" + offerId);
            if (confirm('Are you sure you want to delete this offer?')) {
                $.ajax({
                    url: '{{ route("vendor.deleteOffer", ":id") }}'.replace(':id', offerId),
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.success) {
                            alert(response.message);
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function (xhr) {
                        alert('An error occurred while deleting the offer.');
                    }
                });
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Update Offer
        $('.updateOffer').on('click', function() {
           
            var offerId             = $(this).data('offer_id');
            var offerCode           = $(this).data('offer_code');
            var offerName           = $(this).data('offer_name');
            var offerDescription    = $(this).data('offer_description');
            var discountType        = $(this).data('discount_type');
            var discountValue       = $(this).data('discount_value');
            var startDate           = $(this).data('start_date');
            var endDate             = $(this).data('end_date');
            var minPurchase_amount  = $(this).data('min_purchase_amount');
            var maxDiscount_value   = $(this).data('max_discount_value');
            var applicableTo        = $(this).data('applicable_to');

            console.log(startDate);
            console.log(endDate);

            $('#offerCodeEdit').val(offerCode);
            $('#offerNameEdit').val(offerName);
            $('#offerDescriptionEdit').val(offerDescription);
            $('#discountTypeEdit').val(discountType);
            $('#discountValueEdit').val(discountValue);
            $('#startDateEdit').val(startDate);
            $('#endDateEdit').val(endDate);
            $('#minPurchaseAmountEdit').val(minPurchase_amount);
            $('#maxDiscountAmountEdit').val(maxDiscount_value);
            $('#applicableToEdit').val(applicableTo);

            // Set the form action to update the specific product
            $('form').attr('action', '/vendor/update-offer/' + offerId);
        });

        // Handle form submission
        $('form').on('submit', function(e) {
            e.preventDefault(); 

            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert('Offer updated successfully!');
                    $('#updateOfferModal').modal('hide');
                    // Optionally, reload the page or update the table
                    location.reload();
                },
                error: function(xhr) {
                    // Handle the error response
                    alert('An error occurred while updating the offer.');
                }
            });
        });
    });
</script>

@endsection