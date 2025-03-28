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
        <h2 class="mb-0">Add Products By Admin</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
            <i class="fas fa-plus me-2"></i>Add New Product
        </button>
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
                    <form action="{{ route('addproduct.insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <select id="categoryName" name="cat_id" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach ($category as $cat)
                                <option value="{{ $cat->cat_id }}" name="cat_id">{{ $cat->cat_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="subCategory" class="form-label">Subcategory Name</label>
                            <select id="subCategory" name="sub_cat_id" class="form-control" required>
                                <option value="">Select Subcategory</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" id="productName" name="prodct_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Product Description</label>
                            <textarea id="productDescription" name="prodct_desc" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="productCount" class="form-label">Product Count</label>
                            <input type="number" id="productCount" name="prodct_count" class="form-control" required>
                        </div>

                        <!-- Main Product Image -->
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Product Image</label>
                            <input type="file" id="productImage" name="product_img" class="form-control" accept="image/*" onchange="previewMainImage(event)">
                            <div id="imagePreview" class="mt-3">
                                <img id="previewMainImage" src="#" alt="Image Preview" style="max-width: 200px; display: none;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="Price" class="form-label">Price</label>
                            <input type="text" id="Price" name="price" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Table Section -->
    <div class="card mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="1%">Sl</th>
                            <th scope="col" width="10%">Product Image</th>
                            <th scope="col" width="10%">Caregory Name</th>
                            <th scope="col" width="10%">Sub Category Name</th>
                            <th scope="col" width="10%">Product Name</th>
                            <th scope="col" width="15%">Product Description</th>
                            <th scope="col" width="8%">Price</th>
                            <th scope="col" width="8%">Offer Price</th>
                            <th scope="col" width="8%">Product Count</th>
                            <th scope="col" width="10%">Status</th>
                            <th scope="col" width="5%">Add Offers</th>
                            <th scope="col" width="5%">Add Images</th>
                            <th scope="col" width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if ($products && $products->count() > 0)
                        @foreach($products as $p => $product)
                        <tr>
                            <td>{{ $p + 1 }}</td>
                            <td><img src="{{ asset($product->product_img) }}" alt="Product Image" style="height: 100px; width: 100px;"></td>
                            <td>{{ $product->category->cat_name ?? 'N/A' }}</td>
                            <td>{{ $product->sub_category->sub_name ?? 'N/A' }}</td>
                            <td>{{ $product->prodct_name }}</td>
                            <td>{{ $product->prodct_desc }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->offer->off_price ?? 'N/A'}}</td>
                            <td>{{ $product->prodct_count }}</td>
                            <td>
                                <form action="{{ route('addproduct.updatestatus') }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="prodct_id" value="{{ $product->prodct_id }}">
                                    <input type="hidden" name="status" value="0">
                                    <label class="switch">
                                    <input type="checkbox" name="status" value="1" class="status-toggle" {{ $product->status == 1 ? 'checked' : '' }}
                                    onchange="this.form.submit()"><span class="slider round"></span>
                                </form>
                            </td>
                            <td>
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
                            </td>
                            <td>
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
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary updateProduct" 
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateProductModal" 
                                    data-id="{{ $product->prodct_id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="{{ route('addproduct.delete', ['prodct_id' => $product->prodct_id]) }}" 
                                    class="btn btn-sm btn-danger deleteProductsBtn" 
                                    data-id="{{ $product->prodct_id }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <p>No products available.</p>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Offers modal -->
    <div class="modal fade" id="addOffersModal" tabindex="-1" aria-labelledby="addOffersModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOffersModalLabel">Add Offers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addCategoryForm" action="{{ route('addproduct.addoffer') }}" method="POST" enctype="multipart/form-data">
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
    </div>
    <!-- Add Images modal -->
    <div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addImageModalLabel">Add Images for <span id="modalProductName"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Image Upload Form -->
                    <form id="addImagesForm" action="" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="modalProductId" name="prodct_id">
                        
                        <div id="imageContainer">
                            <div class="mb-3 imageInput">
                                <label for="productImage" class="form-label">Select Image</label>
                                <input type="file" class="form-control" name="productImages[]" accept="image/*" onchange="previewImage(event)">
                                <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removeImageInput(this)">Delete Image</button>
                                <div id="imagePreviewContainer" class="mt-3">
                                    <img id="previewImage" src="#" alt="Image Preview" style="max-width: 200px; display: none;">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary mt-2" id="addMoreImagesBtn">+ Add More Images</button>
                        <div class="mb-3 mt-3">
                            <button type="submit" class="btn btn-primary">Upload Images</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Update products modal -->
    <div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="updateProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateProductModalLabel">Update Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                @if ($products && $products->count() > 0)
                    <form id="updateProductForm" action="{{ route('addproduct.update', ['prodct_id' => $product->prodct_id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="productId" name="prodct_id">
                        <input type="hidden" id="productStatus" name="product_status">
                        <input type="hidden" id="updateProductModal" name="prodct_id">
                        <div class="row">
                            <input type="hidden" class="form-control" id="u_categoryId" name="cat_id" readonly>
                            <input type="hidden" class="form-control" id="u_subcategoryId" name="sub_cat_id" readonly>
                            <div class="col-md-6 mb-3">
                                <label for="u_categoryName" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="u_categoryName" name="category_name" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="u_subcategoryName" class="form-label">Subcategory Name</label>
                                <input type="text" class="form-control" id="u_subcategoryName" name="subcategory_name" placeholder="Enter subcategory name" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="u_productName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="u_productName" name="product_name" placeholder="Enter product name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="u_productCount" class="form-label">Product Count</label>
                                <input type="text" class="form-control" id="u_productCount" name="u_productCount" placeholder="" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="u_productDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="u_productDescription" name="product_description" rows="3" placeholder="Enter product description"></textarea>
                            </div>
                        </div>
                        <hr>
                        <!-- Row for Price, Offer Price, and Offer Percentage -->
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="u_productPrice" class="form-label">Price</label>
                                <input type="number" class="form-control" id="u_productPrice" name="product_price" placeholder="Enter price" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="u_Status" class="form-label">Status</label>
                                <select class="form-control" id="u_status" name="status" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="u_offerPrice" class="form-label">Offer Price</label>
                                <input type="text" class="form-control" id="u_offerPrice" name="offer_price" placeholder="Enter offer price" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="u_offerPercentage" class="form-label">Offer Percentage</label>
                                <input type="text" class="form-control" id="u_offerPercentage" name="offer_percentage" placeholder="Enter offer percentage" required>
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
                                            <img src="" alt="Product Image" id="mainImagePreview" class="img-thumbnail" style="max-width: 100px;">
                                        </td>
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
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </form>
                @else
                <p>no products </p>
                @endif
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
            }0
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
                        $('#productList').append(
                            '<div class="list-group-item">' +
                            '<input type="checkbox" class="product-checkbox" name="prodct_id" value="' + product.prodct_id + '" data-price="' + price + '">' +
                            '<label>' + product.prodct_name + ' - ' + price.toFixed(2) + '</label>' +
                            '</div>'
                        );
                    } else {
                        console.error('Invalid price for product: ', product);
                    }
                });

                updateSelectedProducts();
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
    document.querySelectorAll('.addImage').forEach(button => {
        button.addEventListener('click', function () {

            const productId = this.dataset.id;
            const productName = this.dataset.name;
            const productImage = this.dataset.image;


            document.getElementById('modalProductName').innerText = productName;
            document.getElementById('modalProductId').value = productId;


            const previewImage = document.getElementById('previewImage');
            if (productImage) {
                previewImage.src = productImage;
                previewImage.style.display = 'block';
            } else {
                previewImage.style.display = 'none';
            }


            const form = document.getElementById('addImagesForm');
            form.action = `/addproduct/${productId}/uploadimages`; 
        });
    });


    document.getElementById("addMoreImagesBtn").addEventListener("click", function () {
        let imageContainer = document.getElementById("imageContainer");


        let newImageInput = document.createElement("div");
        newImageInput.classList.add("mb-3", "imageInput");
        newImageInput.innerHTML = `
            <label for="productImage" class="form-label">Select Image</label>
            <input type="file" class="form-control" name="productImages[]" accept="image/*" onchange="previewImage(event)">
            <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removeImageInput(this)">Delete Image</button>
            <div class="mt-3">
                <img src="#" alt="Image Preview" style="max-width: 200px; display: none;" class="imagePreview">
            </div>
        `;
        imageContainer.appendChild(newImageInput);
    });

    function previewImage(event) {
        const input = event.target;
        const file = input.files[0];
        const previewImage = input.parentNode.querySelector(".imagePreview");

        if (file && file.type.startsWith("image/")) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewImage.style.display = "block"; 
            };
            reader.readAsDataURL(file);
        } else {
            previewImage.style.display = "none";
        }
    }


    function removeImageInput(button) {
        const imageInputDiv = button.closest(".imageInput");
        imageInputDiv.remove();
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const deleteButtons = document.querySelectorAll('.deleteProductsBtn');
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
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Select all update buttons
    const updateProductButtons = document.querySelectorAll('.updateProduct');
    const updateProductForm = document.getElementById('updateProductForm');

    updateProductButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Extract product ID from the clicked button
            const productId = button.getAttribute('data-id');
            
            // Make AJAX request to fetch product data
            fetch(`/addproduct/get-product-data/${productId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Received product data:', data);

                        // Populate modal fields
                        document.getElementById('productId').value = data.product.id || 'No Category available';
                        document.getElementById('u_categoryId').value = data.product.cat_id || 'No Category available';
                        document.getElementById('u_categoryName').value = data.product.category || 'No Category available';
                        document.getElementById('u_productCount').value = data.product.count || 'No Category available';
                        document.getElementById('u_subcategoryId').value = data.product.sub_cat_id || 'No Category available';
                        document.getElementById('u_subcategoryName').value = data.product.subcategory || 'No Subcategory available';
                        document.getElementById('u_productPrice').value = data.product.price || 'No price available';
                        document.getElementById('u_productName').value = data.product.name || 'No product name';
                        document.getElementById('u_productDescription').value = data.product.description || 'No product description';

                        // Handle status dropdown selection
                        document.getElementById('u_status').value = data.product.status ? '1' : '0';

                        document.getElementById('u_offerPrice').value = data.product.off_price || 'No offer price available';
                        document.getElementById('u_offerPercentage').value = data.product.off_percentage || 'No offer percentage available';

                        // Handle main product image
                        document.getElementById('mainImagePreview').src = data.product.image_url || 'default_image.jpg';

                    } else {
                        console.error("Product data not found");
                    }
                })
                .catch(error => {
                    console.error("Error fetching product data: ", error);
                });

            // Fetch additional product images
            fetch(`/addproduct/get-product-images/${productId}`) 
                .then(response => response.json())
                .then(data => {
                    console.log('Received product images:', data);

                    if (data.success && Array.isArray(data.images)) {
                        const galleryContainer = document.getElementById('galleryImages');
                        galleryContainer.innerHTML = ''; // Clear previous images

                        data.images.forEach(imageObj => {
                            if (imageObj && imageObj.image_path) {
                                const img = document.createElement('img');
                                img.src = imageObj.image_path;
                                img.classList.add('img-thumbnail', 'm-1');
                                img.style.maxWidth = '100px';
                                galleryContainer.appendChild(img);
                            } else {
                                console.warn("Skipping invalid image object:", imageObj);
                            }
                        });
                    } else {
                        console.error("Product images not found or invalid response format.");
                    }
                })
                .catch(error => {
                    console.error("Error fetching product images: ", error);
                });
        });
    });

    // Add Images Button Toggle
    const addImagesButton = document.getElementById('addImagesButton');
    const addImagesSection = document.getElementById('addImagesSection');
    const newProductImagesInput = document.getElementById('newProductImages');
    const newSelectedImagesPreview = document.getElementById('newSelectedImagesPreview');

    addImagesButton.addEventListener('click', () => {
        addImagesSection.style.display = addImagesSection.style.display === 'none' ? 'block' : 'none';
    });

    // Handle new image selection and preview
    newProductImagesInput.addEventListener('change', function () {
        newSelectedImagesPreview.innerHTML = ''; // Clear existing previews
        Array.from(this.files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const previewContainer = document.createElement('div');
                previewContainer.classList.add('position-relative');

                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('img-thumbnail');
                img.style.maxWidth = '100px';

                const deleteBtn = document.createElement('button');
                deleteBtn.type = 'button';
                deleteBtn.classList.add('btn', 'btn-danger', 'btn-sm', 'position-absolute', 'top-0', 'end-0');
                deleteBtn.innerHTML = '&times;';

                // Remove image on delete button click
                deleteBtn.addEventListener('click', () => {
                    previewContainer.remove();
                    const dt = new DataTransfer();
                    const currentFiles = Array.from(newProductImagesInput.files);
                    currentFiles.splice(index, 1);
                    currentFiles.forEach(file => dt.items.add(file));
                    newProductImagesInput.files = dt.files;
                });

                previewContainer.appendChild(img);
                previewContainer.appendChild(deleteBtn);
                newSelectedImagesPreview.appendChild(previewContainer);
            };
            reader.readAsDataURL(file);
        });
    });

    // Handle main image preview
    document.getElementById('fileInput').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const previewElement = document.getElementById('uploadedImagePreview');
    
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewElement.src = e.target.result;  // Set the preview image
            };
            reader.readAsDataURL(file);
        } else {
            previewElement.src = '';  // Clear image preview
            previewElement.alt = 'No image selected'; // Set alt text to indicate no image is chosen
            alert('No image selected'); // Optionally show an alert message
        }
    });
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const originalPriceInput = document.getElementById('u_productPrice');
        const offerPriceInput = document.getElementById('u_offerPrice');
        const offerPercentageInput = document.getElementById('u_offerPercentage');

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
@endsection