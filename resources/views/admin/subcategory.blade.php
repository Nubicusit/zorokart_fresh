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
            <h2 class="mb-0">Sub Category Management</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubCategoryModal">
                <i class="fas fa-plus me-2"></i>Add New Sub Category
            </button>
        </div>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sub Category Management</li>
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
                                <th scope="col" width="20%">Sub Category</th>
                                <th scope="col" width="20%">Category</th>
                                <th scope="col" width="35%">Description</th>
                                <th scope="col" width="30%">Status</th>
                                <th scope="col" width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($sub_category as $s => $sub_category)
                            <tr id="sub-sategory={{ $sub_category->sub_cat_id  }}">
                                <td>{{$s + 1}}</td>
                                <td>{{$sub_category->sub_name}}</td>
                                <td>{{$sub_category->category->cat_name ?? 'N/A'}}</td>
                                <td>{{$sub_category->sub_desc}}</td>
                                <td>
                                    <form action="{{ route('category.updatesubCategoryStatus') }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PUT') <!-- PUT request for updating -->
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="sub_cat_id" value="{{ $sub_category->sub_cat_id }}">
                                        <input type="hidden" name="status" value="0">
                                        <label class="switch">
                                        <input type="checkbox" name="status" value="1" class="status-toggle" {{ $sub_category->status == 1 ? 'checked' : '' }}
                                        onchange="this.form.submit()"><span class="slider round"></span>
                                    </form>
                                </td>
                                <td>
                                <button 
                                        class="btn btn-sm btn-primary editSubCategoryBtn" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editSubCategoryModal" 
                                        data-id="{{ $sub_category->sub_cat_id }}" 
                                        data-name="{{ $sub_category->cat_name }}" 
                                        data-desc="{{ $sub_category->cat_desc }}" 
                                        data-status="{{ $sub_category->status }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="{{ route('subcategory.delete', ['sub_cat_id' => $sub_category->sub_cat_id]) }}" 
                                        class="btn btn-sm btn-danger deleteSubCategoryBtn" 
                                        data-id="{{ $sub_category->sub_cat_id }}">
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

        <!-- Add Sub Category Modal -->
        <div class="modal fade" id="addSubCategoryModal" tabindex="-1" aria-labelledby="addSubCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSubCategoryModalLabel">Add New Sub Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addSubCategoryForm" action="{{ route('subcategory.insert') }}" method="POST">
                        @csrf
                            <div class="mb-3">
                                <label for="categorySelect" class="form-label">Category</label>
                                <select class="form-select" id="categorySelect" name="cat_id" required>
                                    <option value="" selected disabled>Select Category</option>
                                    @foreach ($category as $c => $cat)
                                        <option value="{{ $cat->cat_id }}">{{ $cat->cat_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="subCategoryName" class="form-label">Sub Category Name</label>
                                <input type="text" class="form-control" id="subCategoryName" name="sub_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="subCategoryDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="subCategoryDescription" rows="3" name="sub_desc" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" form="addSubCategoryForm" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit SubCategory Modal -->
<div class="modal fade" id="editSubCategoryModal" tabindex="-1" aria-labelledby="editSubCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubCategoryModalLabel">Edit Sub Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editSubCategoryForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- For updating, use PUT method -->
                    <input type="hidden" id="editSubCategoryId" name="sub_cat_id">
                    <div class="mb-3">
                        <label for="editSubCategoryName" class="form-label">Sub Category Name</label>
                        <input type="text" class="form-control" id="editSubCategoryName" name="sub_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editSubCategoryDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editSubCategoryDescription" name="sub_desc" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editSubStatus" class="form-label">Status</label>
                        <select class="form-control" id="editSubStatus" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const editSubCategoryBtns = document.querySelectorAll('.editSubCategoryBtn'); // Fixed variable name
        const editSubCategoryForm = document.getElementById('editSubCategoryForm');

        editSubCategoryBtns.forEach(button => {
            button.addEventListener('click', () => {
                // Fetch data attributes from the clicked button
                const subcategoryId = button.getAttribute('data-id');
                const subcategoryName = button.getAttribute('data-name');
                const subcategoryDesc = button.getAttribute('data-desc');
                const subcategoryStatus = button.getAttribute('data-status');
                
                // Populate the modal fields
                document.getElementById('editSubCategoryId').value = subcategoryId;
                document.getElementById('editSubCategoryName').value = subcategoryName;
                document.getElementById('editSubCategoryDescription').value = subcategoryDesc;
                document.getElementById('editSubStatus').value = subcategoryStatus;

                // Dynamically set the form action URL with the subcategory ID
                editSubCategoryForm.action = `/subcategory/update/${subcategoryId}`;
            });
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