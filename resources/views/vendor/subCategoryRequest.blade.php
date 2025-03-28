@extends('vendor.inc.includes')
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
            <h2 class="mb-0">Request for Sub Category</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubCategoryRequestModal">
                <i class="fas fa-plus me-2"></i>Request New Sub Category
            </button>
        </div>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sub Category</li>
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
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($subcategories as $s => $subcategory)
                            <tr id="sub-sategory={{ $subcategory->sub_cat_id  }}">
                                <td>{{$s + 1}}</td>
                                <td>{{$subcategory->sub_name}}</td>
                                <td>{{$subcategory->category->cat_name}}</td>
                                <td>{{$subcategory->sub_desc}}</td>
                                <td> @php
                                        // Get the status value
                                        $status = $subcategory->status;
                                    @endphp

                                    @switch($status)
                                        @case(0)
                                            <span class="badge bg-warning">Pending</span>
                                            @break
                                        @case(1)
                                            <span class="badge bg-success">Approved</span>
                                            @break
                                        @default
                                            <span class="badge bg-light">Unknown</span>
                                    @endswitch
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add Sub Category Request Modal -->
        <div class="modal fade" id="addSubCategoryRequestModal" tabindex="-1" aria-labelledby="addSubCategoryRequestModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSubCategoryRequestModalLabel">Request New Sub Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addSubCategoryForm" action="{{ route('subCategoryRequest.store') }}" method="POST">
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
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" form="addSubCategoryForm" class="btn btn-primary">Request</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
        
@endsection