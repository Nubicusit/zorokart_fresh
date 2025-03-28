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
            <h2 class="mb-0">Category Management</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                <i class="fas fa-plus me-2"></i>Add New Category
            </button>
        </div>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </nav>

        <!-- Table Section -->
        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" width="10%">Sl No</th>
                                <th scope="col" width="25%">Image</th>
                                <th scope="col" width="25%">Category</th>
                                <th scope="col" width="20%">Description</th>
                                <th scope="col" width="30%">Status</th>
                                <th scope="col" width="25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $c => $category)
                            <tr id="category-{{ $category->cat_id }}">
                                <td>{{$c + 1}}</td>
                                <td><img src="{{ asset($category->cat_img) }}" alt="Category image" style="height: 100px; width: 100px;"></td>
                                <td>{{$category->cat_name}}</td>
                                <td>{{$category->cat_desc}}</td>
                                <td>
                                    <form action="{{ route('category.updateStatus') }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PUT') <!-- PUT request for updating -->
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="cat_id" value="{{ $category->cat_id }}">
                                        <input type="hidden" name="status" value="0">
                                        <label class="switch">
                                        <input type="checkbox" name="status" value="1" class="status-toggle" {{ $category->status == 1 ? 'checked' : '' }}
                                        onchange="this.form.submit()"><span class="slider round"></span>
                                    </form>
                                </td>
                                <td>
                                    <!-- <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a> -->
                                    <button 
                                        class="btn btn-sm btn-primary editCategoryBtn" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editCategoryModal" 
                                        data-id="{{ $category->cat_id }}" 
                                        data-name="{{ $category->cat_name }}" 
                                        data-desc="{{ $category->cat_desc }}" 
                                        data-status="{{ $category->status }}" 
                                        data-image="{{ asset($category->cat_img) }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="{{ route('category.delete', ['cat_id' => $category->cat_id]) }}" 
                                        class="btn btn-sm btn-danger deleteCategoryBtn" 
                                        data-id="{{ $category->cat_id }}">
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

        <!-- Edit Category -->
        <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editCategoryForm" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- For updating, use PUT method -->
                            <input type="hidden" id="editCategoryId" name="cat_id">
                            <div class="mb-3">
                                <label for="editCategoryName" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="editCategoryName" name="cat_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="editCategoryDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="editCategoryDescription" name="cat_desc" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="editStatus" class="form-label">Status</label>
                                <select class="form-control" id="editStatus" name="status" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="editCategoryImage" class="form-label">Category Image</label>
                                <input type="file" class="form-control" id="editCategoryImage" name="image" accept="image/*">
                                <div class="mt-2">
                                    <img id="currentCategoryImage" src="" alt="Current Image" style="height: 100px; width: 100px;">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Category Modal -->
        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addCategoryForm" action="{{ route('category.insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="categoryName" name="cat_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="categoryDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="categoryDescription" name="cat_desc" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="categoryImage" class="form-label">Category Image</label>
                                <input type="file" class="form-control" id="categoryImage" name="image" accept="image/*" required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editCategoryBtns = document.querySelectorAll('.editCategoryBtn');
            const editCategoryForm = document.getElementById('editCategoryForm');

            editCategoryBtns.forEach(button => {
                button.addEventListener('click', () => {
                    // Fetch data attributes from the clicked button
                    const categoryId = button.getAttribute('data-id');
                    const categoryName = button.getAttribute('data-name');
                    const categoryDesc = button.getAttribute('data-desc');
                    const categoryStatus = button.getAttribute('data-status');
                    const categoryImage = button.getAttribute('data-image');

                    console.log({
                        categoryId,
                        categoryName,
                        categoryDesc,
                        categoryStatus,
                        categoryImage,
                    });

                    // Populate the modal fields
                    document.getElementById('editCategoryId').value = categoryId;
                    document.getElementById('editCategoryName').value = categoryName;
                    document.getElementById('editCategoryDescription').value = categoryDesc;
                    document.getElementById('editStatus').value = categoryStatus;
                    document.getElementById('currentCategoryImage').src = categoryImage;

                    // Update the form's action URL dynamically
                    editCategoryForm.action = `/category/update/${categoryId}`;
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const deleteButtons = document.querySelectorAll('.deleteCategoryBtn');

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