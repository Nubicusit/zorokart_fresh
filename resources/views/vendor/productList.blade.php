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

    <!-- Header Section -->
    <div class="header-section d-flex justify-content-between align-items-center">
        <h2 class="mb-0">Product List</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
            <i class="fas fa-plus me-2"></i>Add New Product
        </button>
    </div>

    <!-- Table Section -->
    <div class="card mt-4 container-fluid">
        <div class="card-body">
            <div class="table-responsive table-container" >
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col" >Sl</th>
                            <th class="text-center" scope="col" >Product Image</th>
                            <!-- <th class="text-center" scope="col" >Category Name</th>
                            <th class="text-center" scope="col" >Sub Category Name</th> -->
                            <th class="text-center" scope="col" >Product Name</th>
                            <th class="text-center" scope="col" >Product Description</th>
                            <th class="text-center" scope="col" >Price</th>
                            <th class="text-center" scope="col" >Offer Price</th>
                            <th class="text-center" scope="col" >Product Count</th>
                            <th class="text-center" scope="col" >Status</th>
                            <!-- <th class="text-center" scope="col" >Add Offers</th>
                            <th class="text-center" scope="col" >Add Images</th> -->
                            <th class="text-center" scope="col" >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $p => $product)
                        <tr>
                            <td>{{ $p + 1 }}</td>
                            <td><img src="{{ asset($product->product_img) }}" alt="Product Image" style="height: 100px; width: 100px;"></td>
                            <!-- <td>{{ $product->category->cat_name ?? 'N/A' }}</td>
                            <td>{{ $product->sub_category->sub_name ?? 'N/A' }}</td> -->
                            <td>{{ $product->prodct_name }}</td>
                            <td>{{ $product->prodct_desc }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->offer->off_price ?? 'N/A'}}</td>
                            <td>{{ $product->prodct_count }}</td>
                            <td>
                                <form method="POST" action="{{ route('vendor.updateProductStatus') }}" style="display:inline;">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" name="prodct_id" value="{{ $product->prodct_id }}">
                                    <input type="hidden" name="status" value="0">
                                    <label class="switch">
                                        <input type="checkbox" name="status" value="1" class="status-toggle" {{ $product->status == 1 ? 'checked' : '' }}
                                        onchange="this.form.submit()"><span class="slider round"></span>
                                    </label>
                                </form>
                            </td>
                            <!-- <td>
                            <button
                                class="btn btn-sm btn-primary addOffer" 
                                data-bs-toggle="modal"
                                data-bs-target="#addOffersModal" 
                                data-id="{{ $product->prodct_id }}"
                                data-name="{{ $product->prodct_name }}"
                                data-desc="{{ $product->prodct_desc }}"
                                data-status="{{ $product->status }}"
                                data-image="{{ asset($product->product_img) }}">
                                <i class="fa-solid fa-gift"></i>
                            </button>
                            </td> -->
                            <!-- <td>
                            <button
                                class="btn btn-sm btn-primary addImage" 
                                data-bs-toggle="modal"
                                data-bs-target="#addImageModal" 
                                data-id="{{ $product->prodct_id }}"
                                data-name="{{ $product->prodct_name }}"
                                data-desc="{{ $product->prodct_desc }}"
                                data-status="{{ $product->status }}"
                                data-image="{{ asset($product->product_img) }}">
                                <i class="fa-regular fa-image"></i>
                                </button>
                            </td> -->
                            <td>
                                <button
                                    class="btn btn-sm btn-primary updateProduct mb-2" 
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateProductModal" 
                                    data-category_id="{{ $product->cat_id }}"
                                    data-sub_cat_id="{{ $product->sub_cat_id }}"
                                    data-id="{{ $product->prodct_id }}"
                                    data-name="{{ $product->prodct_name }}"
                                    data-desc="{{ $product->prodct_desc }}"
                                    data-count="{{ $product->prodct_count }}"
                                    data-status="{{ $product->status }}"
                                    data-image="{{ asset($product->product_img) }}"
                                    data-price="{{ $product->price }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="" 
                                    class="btn btn-sm btn-danger deleteCategoryBtn" 
                                    data-id="{{ $product->prodct_id }}">
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

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm" action="{{ route('vendor.addProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <select id="categoryName" name="cat_id" class="form-control" required>
                                    <option value="">Select Category</option>
                                    @foreach ($category as $cat)
                                    <option value="{{ $cat->cat_id }}" name="cat_id">{{ $cat->cat_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="subCategory" class="form-label">Subcategory Name</label>
                                <select id="subCategory" name="sub_cat_id" class="form-control" required>
                                    <option value="">Select Subcategory</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" id="productName" name="product_name" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="productCount" class="form-label">Product Count</label>
                                <input type="number" id="productCount" name="product_count" class="form-control" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="productDescription" class="form-label">Product Description</label>
                                <textarea id="productDescription" name="product_description" class="form-control" rows="4" required></textarea>
                            </div>
                        </div>
                        <hr>
                        <!-- Row for Price, Offer Price, and Offer Percentage -->
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="Price" class="form-label">Price</label>
                                <input type="text" id="Price" name="product_price" class="form-control" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="offerPrice" class="form-label">Offer Price</label>
                                <input type="text" id="offerPrice" name="offer_price" class="form-control" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="offerPercentage" class="form-label">Offer Percentage</label>
                                <input type="text" id="offerPercentage" name="offer_percentage" class="form-control" required>
                            </div>
                        </div>
                        <hr>
                        <!-- Existing Product Images Table -->
                        <div class="mb-3">
                            <h6 class="text-align-center">Main Image</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Current Main Image</th>
                                        <th>Choosed Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="existingImagesTable">
                                    <tr>
                                        <td>
                                            <img src="" class="img-thumbnail" id="uploadedImagePreview" style="max-width: 100px;" name="choosed_image">
                                        </td>
                                        <td>
                                            <div style="display: flex; align-items: center; gap: 10px;">
                                                <!-- <button type="button" class="btn btn-danger btn-sm deleteImageBtn">Delete</button> -->
                                                <input type="file" id="fileInput" class="form-control" name="choosed_image" accept="image/*">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <!-- Add Images Option -->
                        <div class="mb-3">
                            <button type="button" id="addImagesButton" class="btn btn-secondary mb-3"><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Images</button>
                            <div id="addImagesSection" style="display: none;">
                                <label for="newProductImages" class="form-label">Upload Images</label>
                                <input type="file" class="form-control" id="newProductImages" name="new_product_images[]" accept="image/*" multiple>
                                <div class="mt-3">
                                    <h6>Preview Images</h6>
                                    <div id="newSelectedImagesPreview" class="d-flex flex-wrap gap-3">
                                        <!-- Previews will appear here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label">Gallery Images</label>
                            <div id="galleryImages" class="d-flex flex-wrap">
                                <p class="text-muted">No images available.</p>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Submit Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Offers modal -->
    <!-- <div class="modal fade" id="addOffersModal" tabindex="-1" aria-labelledby="addOffersModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOffersModalLabel">Add Offers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addCategoryForm" action="{{ route('vendor.addProductOffer') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label for="categorySelect" class="form-label">Category</label>
                            <select class="form-select" id="categorySelect" name="cat_id" required>
                                <option value="" selected disabled>Select Category</option>
                                @foreach ($category as $cat)
                                <option value="{{ $cat->cat_id }}" name="cat_id">{{ $cat->cat_name }}</option>
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
                            <div id="productList" class="list-group"></div>
                        </div>

                        <div class="mb-3">
                            <input type="hidden" id="selectedProductIds" name="prodct_id">
                        </div>

                        <div class="mb-3">
                            <label for="originalPrice" class="form-label">Original Price</label>
                            <input type="text" class="form-control" id="originalPrice" name="price" readonly>
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
    </div> -->

    <!-- Add Images modal -->
    <!-- <div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addImageModalLabel">Add Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div> -->

    <!-- Update products modal -->
    <div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="updateProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateProductModalLabel">Update Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="categoryname" class="form-label">Category Name</label>
                            <select id="categoryname" name="cat_id" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach ($category as $cat)
                                <option value="{{ $cat->cat_id }}">{{ $cat->cat_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="subcategorynames" class="form-label">Subcategory Name</label>
                            <select id="subcategorynames" name="sub_cat_id" class="form-control" required>
                                <option value="">Select Subcategory</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="productname" class="form-label">Product Name</label>
                            <input type="text" id="productname" name="prodct_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="productdescription" class="form-label">Product Description</label>
                            <textarea id="productdescription" name="prodct_desc" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="productcount" class="form-label">Product Count</label>
                            <input type="number" id="productcount" name="prodct_count" class="form-control" required>
                        </div>

                        <!-- Main Product Image -->
                        <div class="mb-3">
                            <label for="productimage" class="form-label">Product Image</label>
                            <input type="file" id="productimage" name="product_img" class="form-control" accept="image/*" onchange="previewMainImage(event)">
                            <div id="imagepreview" class="mt-3">
                                <img id="previewmainimage" src="#" alt="Image Preview" style="max-width: 200px; display: none;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" id="price" name="price" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="productstatus" class="form-label">Status</label>
                            <select class="form-control" id="productstatus" name="status" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        
        $('#categoryName').on('change', function() {
            var categoryName = $(this).val(); 

            if (categoryName) {
                
                $.ajax({
                    url: '/fetch-subcategories', 
                    type: 'GET',
                    data: { cat_id: categoryName },  
                    success: function(response) {
                        if (response.success) {
                            
                            var subCategoryInput = $('#subCategory');
                            subCategoryInput.empty(); 
                            subCategoryInput.append('<option value="">Select Subcategory</option>');
                            $.each(response.subcategories, function(index, sub_category) {
                                subCategoryInput.append(new Option(sub_category.sub_name, sub_category.sub_cat_id));
                            });
                        } else {
                            alert('No subcategories found for this category.');
                        }
                    },
                    error: function() {
                        alert('Error fetching subcategories.');
                    }
                });
            }
        });
    });
</script>

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

    // Update total price and selected products
    $('#productList').on('change', '.product-checkbox', function() {
        updateSelectedProducts();
    });

    function updateSelectedProducts() {
        var totalPrice = 0;
        var selectedProducts = [];

        $('.product-checkbox:checked').each(function() {
            totalPrice += parseFloat($(this).data('price'));
            selectedProducts.push($(this).val());
        });

        $('#originalPrice').val(totalPrice.toFixed(2));
        $('#selectedProductIds').val(selectedProducts.join(','));
    }

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
//Delete product
    $(document).ready(function () {
        $('.deleteCategoryBtn').on('click', function (e) {
            e.preventDefault(); 
            var productId = $(this).data('id'); 
            if (confirm('Are you sure you want to delete this product?')) {
                $.ajax({
                    url: '{{ route("vendor.deleteProduct", "") }}/' + productId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            alert(response.message);
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function (xhr) {
                        alert('An error occurred while deleting the product.');
                    }
                });
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Update Product
        $('.updateProduct').on('click', function() {
            var categoryId      = $(this).data('category_id');
            var subCategoryId   = $(this).data('sub_cat_id');
            var productId       = $(this).data('id');
            var productName     = $(this).data('name');
            var productDesc     = $(this).data('desc');
            var productCount    = $(this).data('count');
            var productStatus   = $(this).data('status');
            var productImage    = $(this).data('image');
            var productPrice    = $(this).data('price');
            // console.log('Selected Subcategory ID:', subCategoryId);
            $('#categoryname').val(categoryId);
            $('#subcategorynames').val(subCategoryId);
            $('#productname').val(productName);
            $('#productdescription').val(productDesc);
            $('#productcount').val(productCount);
            $('#productstatus').val(productStatus);
            $('#price').val(productPrice);
            $('#previewmainimage').attr('src', productImage).show();
// console.log(categoryId);
            // Fetch subcategories for the selected category
            if (categoryId) {
                $.ajax({
                    url: '/fetch-subcategories', 
                    type: 'GET',
                    data: { cat_id: categoryId },
                    success: function(response) {
                     
                        var subCategoryDropdown = $('#subcategorynames');
                    
                        if (response && response.success && Array.isArray(response.subcategories)) {
                            subCategoryDropdown.empty();
                            subCategoryDropdown.append('<option value="">Select Subcategory</option>');
                            // Iterate over the `subcategories` array
                            $.each(response.subcategories, function(key, value) {
                                if (value && value.sub_cat_id && value.sub_name) {
                                    // Append each subcategory as an option to the dropdown
                                    subCategoryDropdown.append('<option value="' + value.sub_cat_id + '">' + value.sub_name + '</option>');
                                }
                            });
                            if (subCategoryId) {
                                $('#subcategorynames').val(subCategoryId);
                            }
                        } else {
                            console.error('Invalid response format: "subcategories" array not found');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        console.error('Status:', status);
                        console.error('Response:', xhr.responseText);
                        alert('An error occurred while fetching subcategories.');
                    }
                });
            } else {
                $('#subCategory').empty().append('<option value="">Select Subcategory</option>');
            }

            // Set the form action to update the specific product
            $('form').attr('action', '/vendor/product-update/' + productId);
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
                    alert('Product updated successfully!');
                    $('#updateProductModal').modal('hide');
                    // Optionally, reload the page or update the table
                    location.reload();
                },
                error: function(xhr) {
                    // Handle the error response
                    alert('An error occurred while updating the product.');
                }
            });
        });
    });
</script>

@endsection
