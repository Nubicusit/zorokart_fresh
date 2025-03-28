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
    <div class="header-section d-flex justify-content-between align-items-center">
        <h2 class="mb-0">Product List</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProdctsUser">
            <i class="fas fa-plus me-2"></i>Add Products for Users
        </button>
    </div>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=""><i class="fas fa-home"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product List</li>
        </ol>
    </nav>
    <div class="card mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="1%">Sl</th>
                            <th scope="col" width="15%">User Name</th>
                            <th scope="col" width="10%"> User Type</th>
                            <th scope="col" width="10%">Product Image</th>
                            <th scope="col" width="10%">Caregory Name</th>
                            <th scope="col" width="10%">Sub Category Name</th>
                            <th scope="col" width="10%">Product Name</th>
                            <th scope="col" width="15%">Product Description</th>
                            <th scope="col" width="8%">Price</th>
                            <th scope="col" width="8%">Offer Price</th>
                            <th scope="col" width="8%">Product Count</th>
                            <th scope="col" width="10%">Verify</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if ($product && $product->count() > 0)
                        @foreach($product as $p => $product)
                        <tr>
                            <td>{{ $p + 1 }}</td>
                            <td>{{ $product->display_name ?? 'N/A' }}</td>
                            <td>{{ $product->display_role ?? 'N/A' }}</td>
                            <td><img src="{{ asset($product->product_img) }}" alt="Product Image" style="height: 100px; width: 100px;"></td>
                            <td>{{ $product->category->cat_name ?? 'N/A' }}</td>
                            <td>{{ $product->sub_category->sub_name ?? 'N/A' }}</td>
                            <td>{{ $product->prodct_name }}</td>
                            <td>{{ $product->prodct_desc }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->offer->off_price ?? 'N/A'}}</td>
                            <td>{{ $product->prodct_count }}</td>
                            <td>
                                <form action="{{ route('viewproducts.updatestatus') }}" method="POST" style="display:inline;">
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
    <!-- Add Offers Modal -->
    <div class="modal fade" id="addProdctsUser" tabindex="-1" aria-labelledby="addProdctsUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProdctsUserModalLabel">Add New Products For Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addProdctsUser" action="{{ route('viewproducts.insert')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="users" class="form-label">Users</label>
                                <select class="form-control" id="user_id" name="id" required>
                                    <option value="" name="" selected disabled> Select User </option>
                                    @foreach($users as $u => $user)
                                    <option value="{{ $user->id }}" name="id" required>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <select class="form-control" id="categoryName" name="cat_id" required>
                                    <option value="0" name="" selected disabled> Select Category </option>
                                    @foreach($categories as $c => $category)
                                    <option value="{{ $category->cat_id }}" name="cat_id">{{ $category->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="subCategory" class="form-label">Subcategory Name</label>
                                <select id="subCategory" name="sub_cat_id" class="form-control" required>
                                    <option value="">Select Subcategory</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="productName" class="form-label">Product Name </label>
                                <input type="text" class="form-control" name="productName" id="productName" placeholder="Enter the product name" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="productPrice" class="form-label">Product Price</label>
                                <input type="number" class="form-control" name="productPrice" id="productPrice" placeholder="Enter the price" min="0" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="productCount" class="form-label">Product Count</label>
                                <input type="number" class="form-control" name="productCount" id="productCount" placeholder="Enter the price" min="0" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="productDescription" class="form-label">Product Description</label>
                                <textarea class="form-control" id="productDescription" name="productDescription" rows="3" placeholder="Enter product description"></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <h5 class="mb-0">Upload Product Image </h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Preview Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="position: relative; width: 150px; height: 120px;">
                                                <img id="imagePreview" src="https://placehold.co/150x150" style="width: 150px; height: 150px; object-fit: cover;">
                                                <button id="deleteImage" style="position: absolute; top: -5px; right: -5px; background: red; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer; font-size: 14px; display: none;">X</button>
                                            </td>
                                            <td>
                                                <input type="file" id="imageUpload" accept="image/*" class="form-control" name="mainImage">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 mnb-3">
                            <h5 class="mb-0">Add Product Images </h5>
                                <input type="file" id="imageUpload1" name="productImages[]  " multiple accept="image/*" class="form-control">
                                <div id="imagePreviewContainer1" class="mt-3 d-flex flex-wrap gap-2"></div>
                            </div>
                        </div>
                        <hr>
                        <div class="row align-items-center">
                            <div class="col-auto d-flex align-items-center">
                                <h5 class="mb-0">Apply Offers</h5>
                                <input type="checkbox" id="offerCheckbox" style="width: 20px; height: 20px; margin-left: 30px;">
                            </div>
                            <div id="offerFields" class="row mt-2" style="display: none;">
                                <div class="col-md-6">
                                    <label for="offerPrice" class="form-label">Offer Price</label>
                                    <input type="text" id="offerPrice" name="offerPrice" class="form-control" placeholder="Enter Offer Price">
                                </div>
                                <div class="col-md-6">
                                    <label for="offerPercentage" class="form-label">Offer Percentage</label>
                                    <input type="text" id="offerPercentage" name="offerPercentage" class="form-control" placeholder="Enter Offer Percentage">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary"> Add Product</button>
                        </div>
                    </form>
                    <div id="responseMessage"></div>
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
                    url: '/get-subcategories', 
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
    document.getElementById("offerCheckbox").addEventListener("change", function() {
        let offerFields = document.getElementById("offerFields");
        offerFields.style.display = this.checked ? "flex" : "none";
    });
    function calculateOfferValues() {
        let productPrice = parseFloat(document.getElementById("productPrice").value);
        let offerPrice = parseFloat(document.getElementById("offerPrice").value);
        let offerPercentage = parseFloat(document.getElementById("offerPercentage").value);

        if (!isNaN(productPrice)) {
            if (!isNaN(offerPrice)) {
                // Calculate Offer Percentage
                offerPercentage = ((productPrice - offerPrice) / productPrice) * 100;
                document.getElementById("offerPercentage").value = offerPercentage.toFixed(2);
            } else if (!isNaN(offerPercentage)) {
                // Calculate Offer Price
                offerPrice = productPrice - (productPrice * offerPercentage / 100);
                document.getElementById("offerPrice").value = offerPrice.toFixed(2);
            }
        }
    }

    document.getElementById("offerPrice").addEventListener("input", calculateOfferValues);
    document.getElementById("offerPercentage").addEventListener("input", calculateOfferValues);
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const originalPriceInput = document.getElementById('productPrice');
        const offerPriceInput = document.getElementById('offerPrice');
        const offerPercentageInput = document.getElementById('offerPercentage');

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
    document.getElementById("imageUpload").addEventListener("change", function(event) {
        let file = event.target.files[0];

        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("imagePreview").src = e.target.result;
                document.getElementById("deleteImage").style.display = "block"; 
            };
            reader.readAsDataURL(file);
        }
    });

    document.getElementById("deleteImage").addEventListener("click", function() {
        document.getElementById("imagePreview").src = "https://via.placeholder.com/100"; 
        document.getElementById("imageUpload").value = "";
        this.style.display = "none";
    });
</script>
<script>
    document.getElementById("imageUpload1").addEventListener("change", function(event) {
        let files = event.target.files;
        let previewContainer = document.getElementById("imagePreviewContainer1");
        previewContainer.innerHTML = ""; 

        if (files.length > 0) {
            Array.from(files).forEach((file, index) => {
                let reader = new FileReader();
                reader.onload = function(e) {

                    let imageWrapper = document.createElement("div");
                    imageWrapper.style.position = "relative";
                    imageWrapper.style.display = "inline-block";

                    let img = document.createElement("img");
                    img.src = e.target.result;
                    img.style.width = "100px";
                    img.style.height = "100px";
                    img.style.objectFit = "cover";
                    img.style.border = "1px solid #ddd";
                    img.style.borderRadius = "5px";
                    img.style.marginRight = "5px";

                    let deleteBtn = document.createElement("button");
                    deleteBtn.innerHTML = "X";
                    deleteBtn.style.position = "absolute";
                    deleteBtn.style.top = "5px";
                    deleteBtn.style.right = "5px";
                    deleteBtn.style.background = "red";
                    deleteBtn.style.color = "white";
                    deleteBtn.style.border = "none";
                    deleteBtn.style.borderRadius = "50%";
                    deleteBtn.style.width = "20px";
                    deleteBtn.style.height = "20px";
                    deleteBtn.style.cursor = "pointer";
                    deleteBtn.style.fontSize = "14px";
                    deleteBtn.addEventListener("click", function() {
                        imageWrapper.remove();
                    });

                    imageWrapper.appendChild(img);
                    imageWrapper.appendChild(deleteBtn);
                    previewContainer.appendChild(imageWrapper);
                };
                reader.readAsDataURL(file);
            });
        }
    });
</script>

@endsection